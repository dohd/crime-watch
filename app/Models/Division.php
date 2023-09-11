<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'county_id',
        'name', 
        'uuid'
      
    ];

    
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function divincidences()
    {
        return $this->hasMany(IncidentRecord::class);
    }
}
