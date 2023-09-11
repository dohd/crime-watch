<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentContinue extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid',
        'place', 
        'mode_of_operandi',
        'as_name',
        'as_value', 
        'ar_name',
        'ar_value',
        'ad_name', 
        'ad_value',
        'incident_record_id',
        
      
    ];
}
