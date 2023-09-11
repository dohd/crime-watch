<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_records', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('report_type');
            $table->string('incident_no');
            $table->string('incident_ref');
            $table->string('charge_no')->nullable();
            $table->string('incident_title')->nullable();
            $table->date('date_commited')->nullable();
            $table->date('date_reported')->nullable();
            $table->time('time_commited')->nullable();
            $table->time('time_reported')->nullable();
            $table->date('date_captured');
            $table->string('case_position')->nullable();
            $table->string('motive')->nullable();
            $table->text('description');
            $table->text('description_copy')->nullable();
            $table->string('addincident')->nullable();
            $table->string('gangfirearm')->nullable();
            $table->string('special_check')->nullable();
            $table->integer('c_no_of_arrest')->default('0');
            $table->bigInteger('crime_source_id')->unsigned();
            $table->tinyInteger('has_copy')->default(0)->comment('YES=1,NO=0');
            $table->tinyInteger('is_dcir')->default(0)->comment('DOR=0,DCIR=1');
            $table->foreign('crime_source_id')->references('id')->on('crime_sources')->onDelete('cascade');
            $table->bigInteger('incident_file_id')->unsigned();
            $table->foreign('incident_file_id')->references('id')->on('incident_files')->onDelete('cascade');
            $table->bigInteger('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->bigInteger('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->bigInteger('county_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->bigInteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_records');
    }
}
