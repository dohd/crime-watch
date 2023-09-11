<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirearmAndAmmino extends Model
{
    use HasFactory;
    protected $fillable = [
        'surrendered',
        'recovered',
        'county_id',
        'firearm_id',
        'firearm_incidence_id', 
    ];
}
