<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceBase extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'is_base',
        'station_id',
        'name', 
        'uuid'
      
    ];
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
