<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContrabandIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contraband_incidences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contraband_id')->unsigned();
            $table->bigInteger('incident_record_id')->unsigned();
            $table->foreign('contraband_id')->references('id')->on('contrabands')->onDelete('cascade');
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
        Schema::dropIfExists('contraband_incidences');
    }
}
