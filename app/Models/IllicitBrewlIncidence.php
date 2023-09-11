<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IllicitBrewlIncidence extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_illicitbrew', 
        'im_arrested',
        'im_taken_to_court',
        'im_destroyed', 
        'id_arrested',
        'id_taken_to_court',
        'id_destroyed', 
        'ir_arrested',
        'ic_taken_to_court',
        'incident_record_id'
        
      
    ];
}
