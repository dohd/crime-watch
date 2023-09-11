<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobInjusticeIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'suspect', 
        'age',
        'mob_fetal',
        'status', 
        'incident_record_id',
        
      
    ];
}
