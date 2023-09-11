<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrestOfPoliceOfficerIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrest_of_police_officer_incidences', function (Blueprint $table) {
            $table->id();
            $table->string('p_type');
            $table->string('p_fc_no');
            $table->string('p_rank');
            $table->string('p_officer_name');
            $table->string('p_circumstance');
            $table->bigInteger('incident_record_id')->unsigned();
            $table->foreign('incident_record_id')->references('id')->on('incident_records')->onDelete('cascade');
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
        Schema::dropIfExists('arrest_of_police_officer_incidences');
    }
}
