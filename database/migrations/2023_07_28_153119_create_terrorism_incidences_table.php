<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrorismIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrorism_incidences', function (Blueprint $table) {
            $table->id();
            $table->string('place_of_incidence');
            $table->string('mode_of_attack');
            $table->integer('tk_officer')->default('0');
            $table->integer('tk_reservist')->default('0');
            $table->integer('tk_civilian')->default('0');
            $table->integer('tk_suspect')->default('0');
            $table->integer('ti_officer')->default('0');
            $table->integer('ti_reservist')->default('0');
            $table->integer('ti_civilian')->default('0');
            $table->integer('ti_suspect')->default('0');
            $table->integer('tkd_officer')->default('0');
            $table->integer('tkd_reservist')->default('0');
            $table->integer('tkd_civilian')->default('0');
            $table->integer('tkd_suspect')->default('0');
            $table->integer('ta_officer')->default('0');
            $table->integer('ta_reservist')->default('0');
            $table->integer('ta_civilian')->default('0');
            $table->integer('ta_suspect')->default('0');
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
        Schema::dropIfExists('terrorism_incidences');
    }
}
