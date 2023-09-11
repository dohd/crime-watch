<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalGangIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'c_gang_name', 
        'cr_no_of_arrest',
        'c_gang_incidences',
        'incident_record_id',
       
      
    ];
   
}
