<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamblingIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambling_incidences', function (Blueprint $table) {
            $table->id();
            $table->integer('m_arrest_no')->nullable();
            $table->integer('m_no')->nullable();
            $table->integer('c_arrest_no')->nullable();
            $table->integer('c_no')->nullable();
            $table->integer('p_arrest_no')->nullable();
            $table->integer('p_no')->nullable();
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
        Schema::dropIfExists('gambling_incidences');
    }
}
