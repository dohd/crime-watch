<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgbvReportByAccusedAndVictimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgbv_report_by_accused_and_victims', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default('0')->comment('Accused=1,Victims=2');
            $table->integer('m_offence')->default('0');
            $table->integer('f_offence')->default('0');
            $table->bigInteger('age_grouping_id')->unsigned();
            $table->bigInteger('incident_file_id')->unsigned();
            $table->bigInteger('sgbv_incidence_id')->unsigned();
            $table->foreign('age_grouping_id')->references('id')->on('age_groupings')->onDelete('cascade');
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
        Schema::dropIfExists('sgbv_report_by_accused_and_victims');
    }
}
