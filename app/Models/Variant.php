<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Variant extends Model
{
    use Searchable;

    protected $fillable = [
        'model_id',
        'year',
        'name',
        'body_type',
        'engine',
        'transmission',
        'gcc_specs',
        'is_active'
    ];

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'year' => (int) $this->year,
            'make' => $this->model->make->name,
            'model' => $this->model->name,
            'body_type' => $this->body_type,
            'engine' => $this->engine,
            'transmission' => $this->transmission,
        ];
    }
}
