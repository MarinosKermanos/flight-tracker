<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function airplane()
    {
        return $this->belongsTo(Airplane::class);
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function meal(){
        return $this->hasOne(Meal::class);
    }
}
