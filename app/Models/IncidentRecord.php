<?php

namespace App\Models;

use App\Models\Division;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class IncidentRecord extends Model
{
    use HasFactory, UUID;

    protected $table = "incident_records";

    protected $fillable = [
        'uuid',
        'report_type',
        'incident_no',
        'incident_ref',
        'charge_no',
        'incident_title',
        'date_commited',
        'date_reported',
        'time_commited',
        'time_reported',
        'case_position',
        'date_captured',
        'motive',
        'description',
        'description_copy',
        'addincident',
        'gangfirearm',
        'special_check',
        'crime_source_id',
        'has_copy',
        'incident_file_id',
        'station_id',
        'region_id',
        'county_id',
        'division_id',
        'c_no_of_arrest',
        'is_dcir',
    ];


    /**
     * Relationships
     */
    public function policeofficers()
    {
        return $this->hasMany(ArrestOfPoliceOfficerIncidence::class);
    }
    public function contrabands()
    {
        return $this->hasMany(ContrabandIncidence::class);
    }
    public function aliens()
    {
        return $this->hasMany(AlienIncidence::class);
    }
    public function firearms()
    {
        return $this->hasMany(FirearmAndAmmino::class);
    }
    public function ammunitions()
    {
        return $this->hasMany(FirearmAmmino::class);
    }
    public function incidentFile()
    {
        return $this->belongsTo(IncidentFile::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function idivision()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function school()
    {
        return $this->hasOne(SchoolIncidence::class);
    }
    public function gambling()
    {
        return $this->hasOne(GamblingIncidence::class);
    }
    public function arrestOfForeigners()
    {
        return $this->hasOne(ArrestOfForeignerIncidence::class);
    }
    public function boarder()
    {
        return $this->hasOne(BoardermIncidence::class);
    }
    public function cattleRustling()
    {
        return $this->hasOne(CattleRustlingIncidence::class);
    }
    public function criminalGang()
    {
        return $this->hasOne(CriminalGangIncidence::class);
    }

    public function ethicalClashes()
    {
        return $this->hasOne(EthnicClashesIncidence::class);
    }
    public function illicitBrew()
    {
        return $this->hasOne(IllicitBrewlIncidence::class);
    }
    public function illicitBrews()
    {
        return $this->hasMany(IllicitBrewlIncidence::class);
    }
    public function mobInjustice()
    {
        return $this->hasOne(MobInjusticeIncidence::class);
    }
    public function moneyMatter()
    {
        return $this->hasOne(MoneyMatterIncidence::class);
    }
    public function stockTheft()
    {
        return $this->hasOne(StockTheftIncidence::class);
    }
    public function incidentContinue()
    {
        return $this->hasOne(IncidentContinue::class);
    }
    public function gangFirearm()
    {
        return $this->hasOne(GangFirearm::class);
    }
    public function terrorism()
    {
        return $this->hasOne(TerrorismIncidence::class);
    }
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function crimesource()
    {
        return $this->belongsTo(CrimeSource::class, 'crime_source_id');
    }
    public function wildlife()
    {
        return $this->hasOne(WildlifeIncidence::class);
    }
    public function firearm_magazine_explosive()
    {
        return $this->hasOne(FirearmMagazineExplosive::class);
    }
    public function kidnappings()
    {
        return $this->hasMany(KidnappingIncidence::class);
    }
}
