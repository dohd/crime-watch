<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WildlifeIncidence extends Model
{
    use HasFactory, UUID;

    protected $table = 'wildlife_incidences';

    protected $fillable = [
        'uuid',
        'date_commited',
        'elephant',
        'rhino',
        'giraffe',
        'other',
        'injured',
        'fatal',
        'incident_record_id',
        'user_id',
    ];

    /**
     * Relationships
     */
    public function wildlifeStastics()
    {
        return $this->hasMany(WildlifeStatistic::class);
    }
}
