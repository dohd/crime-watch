<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WildlifeStatistic extends Model
{
    use HasFactory;
    
    protected $table = 'wildlife_statistics';

    protected $fillable = [
        'statistic_value',
        'wildlife_incidence_id', 
        'region_id',
        'incident_file_id',
    ];
}
