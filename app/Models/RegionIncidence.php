<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionIncidence extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid',
        'date_commited',
        'region_id',
        'county_id',
        'division_id',
        'user_id'

    ];

    public function regionStatistics()
    {
        return $this->hasMany(RegionStatistic::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    
}
