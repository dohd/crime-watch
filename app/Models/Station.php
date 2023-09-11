<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'region_id',
        'county_id',
        'division_id',
        'code',
        'name', 
        'uuid'
      
    ];
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
