<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contraband extends Model
{
    use HasFactory;

    public function contrabandIncidences()
    {
        return $this->hasOne(ContrabandIncidence::class);
    }
 
}
