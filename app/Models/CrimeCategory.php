<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeCategory extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'name', 
        'uuid'
      
    ];

    public function incidences()
    {
        return $this->hasMany(IncidentFile::class);
    }
}
