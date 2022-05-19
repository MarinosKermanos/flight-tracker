<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function flight()
    {
        return $this->hasMany(Flight::class);
    }

    public function airplanes()
    {
        return $this->belongsToMany(Airplane::class);
    }
}
