<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidlifeStatistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'statistic_value',
        'widlife_incidence_id', 
        'region_id',
        'incident_file_id',
       
  
       
      
    ];

}
