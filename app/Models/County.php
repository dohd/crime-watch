<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'region_id',
        'code',
        'name', 
        'uuid'
      
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function incidences()
    {
        return $this->hasMany(IncidentRecord::class);
    }
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
