<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrestOfPoliceOfficerIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'p_type', 
        'p_fc_no',
        'p_rank',
        'p_officer_name', 
        'p_circumstance',
        
      
    ];
}
