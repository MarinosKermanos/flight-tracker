<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}