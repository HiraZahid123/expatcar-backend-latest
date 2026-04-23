<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'name'      => 'Dubai',
                'slug'      => 'dubai',
                'location'  => 'Dubai',
                'address'   => 'Dubai, United Arab Emirates',
                'phone'     => '+971561774555',
                'latitude'  => 25.20480,
                'longitude' => 55.27080,
                'is_active' => true,
            ],
            [
                'name'      => 'Dubai — Al Quoz',
                'slug'      => 'dubai-al-quoz',
                'location'  => 'Al Quoz, Dubai',
                'address'   => 'Al Quoz Industrial Area 1, Dubai, UAE',
                'phone'     => '+971561774555',
                'latitude'  => 25.14800,
                'longitude' => 55.22190,
                'is_active' => true,
            ],
            [
                'name'      => 'Sharjah',
                'slug'      => 'sharjah',
                'location'  => 'Industrial Area, Sharjah',
                'address'   => 'Industrial Area 1, Sharjah, UAE',
                'phone'     => '+971561774555',
                'latitude'  => 25.34630,
                'longitude' => 55.42090,
                'is_active' => true,
            ],
            [
                'name'      => 'Abu Dhabi',
                'slug'      => 'abu-dhabi',
                'location'  => 'Abu Dhabi',
                'address'   => 'Abu Dhabi, United Arab Emirates',
                'phone'     => '+971561774555',
                'latitude'  => 24.45390,
                'longitude' => 54.37730,
                'is_active' => true,
            ],
            [
                'name'      => 'Ajman',
                'slug'      => 'ajman',
                'location'  => 'Ajman',
                'address'   => 'Ajman, United Arab Emirates',
                'phone'     => '+971561774555',
                'latitude'  => 25.40522,
                'longitude' => 55.51390,
                'is_active' => true,
            ],
            [
                'name'      => 'Ras Al Khaimah',
                'slug'      => 'ras-al-khaimah',
                'location'  => 'Ras Al Khaimah',
                'address'   => 'Ras Al Khaimah, United Arab Emirates',
                'phone'     => '+971561774555',
                'latitude'  => 25.79030,
                'longitude' => 55.97360,
                'is_active' => true,
            ],
            [
                'name'      => 'Fujairah',
                'slug'      => 'fujairah',
                'location'  => 'Fujairah',
                'address'   => 'Fujairah, United Arab Emirates',
                'phone'     => '+971561774555',
                'latitude'  => 25.12880,
                'longitude' => 56.32650,
                'is_active' => true,
            ],
            [
                'name'      => 'Umm Al Quwain',
                'slug'      => 'umm-al-quwain',
                'location'  => 'Umm Al Quwain',
                'address'   => 'Umm Al Quwain, United Arab Emirates',
                'phone'     => '+971561774555',
                'latitude'  => 25.56473,
                'longitude' => 55.55517,
                'is_active' => true,
            ],
            [
                'name'      => 'Al Ain',
                'slug'      => 'al-ain',
                'location'  => 'Al Ain',
                'address'   => 'Al Ain, Abu Dhabi, United Arab Emirates',
                'phone'     => '+971561774555',
                'latitude'  => 24.20750,
                'longitude' => 55.74520,
                'is_active' => true,
            ],
        ];

        foreach ($branches as $data) {
            Branch::updateOrCreate(['slug' => $data['slug']], $data);
        }

        $this->command->info('Seeded ' . count($branches) . ' UAE branches.');
    }
}
