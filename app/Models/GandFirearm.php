<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GandFirearm extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid',
        'total_no_of_gang', 
        'no_armed',
        'rifle',
        'pistol', 
        'toy_pistol',
        'home_made',
        'other_weapons', 
        'incident_record_id',
        
      
    ];
}
