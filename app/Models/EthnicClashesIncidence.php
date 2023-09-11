<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EthnicClashesIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'tribes_involved',
        'e_killed', 
        'e_injured',
        'e_arrested',
        'e_reason', 
        'incident_record_id',
        
      
    ];
}
