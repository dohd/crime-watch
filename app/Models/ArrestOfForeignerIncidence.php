<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrestOfForeignerIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_place', 
        'f_no_of_arrest',
        'f_nationality',
        'incident_record_id',
      
    ];
}
