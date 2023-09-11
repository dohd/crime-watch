<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CattleRustlingIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'cr_killed', 
        'cr_injured',
        'cr_arrested',
        'cs_cattle', 
        'cs_goats',
        'cs_sheep',
        'cs_camel', 
        'cs_others',
        'cr_cattle',
        'cr_goats',
        'cr_sheep',
        'cr_camel',
        'cr_others',
        'incident_record_id'
        
      
    ];
}
