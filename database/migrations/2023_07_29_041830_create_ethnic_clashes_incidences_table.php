<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEthnicClashesIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ethnic_clashes_incidences', function (Blueprint $table) {
            $table->id();
            $table->string('tribes_involved');
            $table->integer('e_killed')->default('0');
            $table->integer('e_injured')->default('0');
            $table->integer('e_arrested')->default('0');
            $table->string('e_reason');
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
        Schema::dropIfExists('ethnic_clashes_incidences');
    }
}
