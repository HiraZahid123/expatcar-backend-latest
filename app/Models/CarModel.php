<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['make_id', 'name', 'slug', 'is_active'];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'model_id');
    }
}
