<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalGangIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_gang_incidences', function (Blueprint $table) {
            $table->id();
            $table->string('c_gang_name');
            $table->integer('cr_no_of_arrest');
            $table->string('c_gang_incidences');
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
        Schema::dropIfExists('criminal_gang_incidences');
    }
}
