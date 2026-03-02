<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $fillable = ['name', 'slug', 'logo_url', 'is_active'];

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }
}
