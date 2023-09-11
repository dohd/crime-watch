<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerrorismIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'place_of_incidence',
        'mode_of_attack',
        'tk_officer',
        'tk_reservist',
        'tk_civilian', 
        'tk_suspect',
        'ti_officer',
        'ti_reservist',
        'ti_civilian',
        'ti_suspect',
        'tkd_officer',
        'tkd_reservist',
        'tkd_civilian',
        'tkd_suspect',
        'ta_officer',
        'ta_reservist',
        'ta_civilian',
        'ta_suspect',
        'incident_record_id'
      
    ];
}
