<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficIncidence extends Model
{
    use HasFactory,UUID;
    protected $fillable = [
        'uuid',
        'date_commited',
        'user_id'

    ];

    public function reportByCategory()
    {
        return $this->hasMany(TrafficReportByCategory::class);
    }
    public function reportByRegion()
    {
        return $this->hasMany(TrafficReportByRegion::class);
    }
    public function reportByRules()
    {
        return $this->hasMany(TrafficReportByRule::class);
    }
    public function reportByFines()
    {
        return $this->hasMany(TrafficReportByFine::class);
    }
}
