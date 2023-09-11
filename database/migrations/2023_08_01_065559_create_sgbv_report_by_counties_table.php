<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgbvReportByCountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgbv_report_by_counties', function (Blueprint $table) {
            $table->id();
            $table->integer('offence')->default('0');
            $table->bigInteger('county_id')->unsigned();
            $table->bigInteger('incident_file_id')->unsigned();
            $table->bigInteger('sgbv_incidence_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('incident_file_id')->references('id')->on('incident_files')->onDelete('cascade');
            $table->foreign('sgbv_incidence_id')->references('id')->on('sgbv_incidences')->onDelete('cascade');
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
        Schema::dropIfExists('sgbv_report_by_counties');
    }
}
