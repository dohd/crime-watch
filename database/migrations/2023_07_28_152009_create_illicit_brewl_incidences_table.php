<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIllicitBrewlIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illicit_brewl_incidences', function (Blueprint $table) {
            $table->id();
            $table->string('type_illicitbrew');
            $table->integer('im_arrested')->default('0');
            $table->integer('im_taken_to_court')->default('0');
            $table->integer('im_destroyed')->default('0');
            $table->string('id_arrested')->default('0');
            $table->integer('id_taken_to_court')->default('0');
            $table->integer('id_destroyed')->default('0');
            $table->integer('ir_arrested')->default('0');
            $table->integer('ic_taken_to_court')->default('0');
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
        Schema::dropIfExists('illicit_brewl_incidences');
    }
}
