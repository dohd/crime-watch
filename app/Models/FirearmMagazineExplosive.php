<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirearmMagazineExplosive extends Model
{
    use HasFactory;
    protected $fillable = [
        'magazine',
        'explosive',
        'county_id',
        'firearm_incidence_id'

    ];
}
