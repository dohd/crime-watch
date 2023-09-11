<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardermIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarderm_incidences', function (Blueprint $table) {
            $table->id();
            $table->integer('s_camel')->default('0');
            $table->integer('s_cattle')->default('0');
            $table->integer('s_goats')->default('0');
            $table->integer('r_camel')->default('0');
            $table->integer('r_cattle')->default('0');
            $table->integer('r_goats')->default('0');
            $table->integer('o_killed')->default('0');
            $table->integer('c_killed')->default('0');
            $table->integer('o_injured')->default('0');
            $table->integer('c_injured')->default('0');
            $table->integer('r_killed')->default('0');
            $table->integer('r_arrested')->default('0');
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
        Schema::dropIfExists('boarderm_incidences');
    }
}
