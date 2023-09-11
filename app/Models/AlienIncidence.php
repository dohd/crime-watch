<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlienIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'alien_nationality', 
        'alien_no_of_arrest',
        'incident_record_id',
      
    ];
}
