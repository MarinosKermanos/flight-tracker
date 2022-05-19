<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function flight()
    {
        return $this->hasMany(Flight::class);
    }

    public function airports()
    {
        return $this->belongsToMany(Airport::class,'airplane_airport','airplane_id','airport_id');
    }

}
