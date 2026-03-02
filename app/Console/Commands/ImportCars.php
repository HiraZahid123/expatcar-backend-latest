<?php

namespace App\Console\Commands;

use App\Models\CarModel;
use App\Models\Make;
use App\Models\Variant;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ImportCars extends Command
{
    protected $signature = 'import:cars {file}';
    protected $description = 'Import car data from a CSV file';

    public function handle()
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error("File not found: {$file}");
            return 1;
        }

        $this->info("Importing car data from {$file}...");

        $handle = fopen($file, 'r');
        $header = fgetcsv($handle); // Skip header

        $count = 0;
        $batchSize = 1000;
        $activeMakes = [];
        $activeModels = [];

        while (($row = fgetcsv($handle)) !== false) {
            // Mapping: Year,Make,Model,Variant,Body,Engine,Transmission,Description,GCC_Specs
            if (count($row) < 7) continue;

            [$year, $makeName, $modelName, $variantName, $body, $engine, $trans] = $row;
            $gcc = $row[8] ?? 'No';

            // 1. Get or Create Make
            $makeKey = Str::slug($makeName);
            if (!isset($activeMakes[$makeKey])) {
                $make = Make::firstOrCreate(
                    ['slug' => $makeKey],
                    ['name' => strtoupper($makeName), 'is_active' => true]
                );
                $activeMakes[$makeKey] = $make->id;
            }
            $makeId = $activeMakes[$makeKey];

            // 2. Get or Create Model
            $modelSlug = Str::slug($modelName);
            $modelKey = $makeId . '-' . $modelSlug;
            if (!isset($activeModels[$modelKey])) {
                $model = CarModel::firstOrCreate(
                    ['make_id' => $makeId, 'slug' => $modelSlug],
                    ['name' => $modelName, 'is_active' => true]
                );
                $activeModels[$modelKey] = $model->id;
            }
            $modelId = $activeModels[$modelKey];

            // 3. Create Variant (More granular uniqueness)
            // Use updateOrCreate with multiple attributes to distinguish between engine/trans variations
            Variant::updateOrCreate(
                [
                    'model_id' => $modelId,
                    'year' => (int)$year,
                    'name' => $variantName,
                    'body_type' => $body,
                    'engine' => $engine,
                    'transmission' => $trans,
                ],
                [
                    'gcc_specs' => Str::lower($gcc) === 'yes',
                    'is_active' => true,
                ]
            );

            $count++;
            if ($count % $batchSize === 0) {
                $this->info("Processed {$count} rows...");
            }
        }

        fclose($handle);
        $this->info("Successfully imported {$count} car variants.");
        return 0;
    }
}
