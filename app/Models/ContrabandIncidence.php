<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContrabandIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'contraband_id', 
        'incident_record_id',  
        'contraband_value'
    ];
}
