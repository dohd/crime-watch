<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardermIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        's_camel', 
        's_cattle',
        's_goats',
        'r_camel', 
        'r_cattle',
        'r_goats',
        'o_killed', 
        'c_killed',
        'o_injured',
        'c_injured',
        'r_killed',
        'r_arrested',
        'incident_record_id'
        
      
    ];
}
