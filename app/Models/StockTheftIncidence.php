<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTheftIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'stp_killed',
        'stp_injured',
        'stp_arrested',
        'stp_cattle',
        'stp_goats', 
        'stp_sheep',
        'stp_camel',
        'stp_others',
        'str_cattle',
        'str_goats',
        'str_sheep',
        'str_camel',
        'str_others',
        'incident_record_id'
      
    ];
    
}
