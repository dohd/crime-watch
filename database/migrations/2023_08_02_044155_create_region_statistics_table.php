<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('statistic_value')->default(0);
            $table->bigInteger('region_incidence_id')->unsigned();
            $table->bigInteger('incident_file_id')->unsigned();
            $table->bigInteger('station_id')->unsigned();
            $table->foreign('region_incidence_id')->references('id')->on('region_incidences')->onDelete('cascade');
            $table->foreign('incident_file_id')->references('id')->on('incident_files')->onDelete('cascade');
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
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
        Schema::dropIfExists('region_statistics');
    }
}
