<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirearmMagazineExplosive extends Model
{
    use HasFactory;

    protected $table = 'firearm_magazine_explosives';

    protected $fillable = [
        'magazine',
        'explosive',
        'county_id',
        'firearm_incidence_id',
        'incident_record_id'
    ];
}
