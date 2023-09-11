<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTheftIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_theft_incidences', function (Blueprint $table) {
            $table->id();
            $table->integer('stp_killed')->default('0');
            $table->integer('stp_injured')->default('0');
            $table->integer('stp_arrested')->default('0');
            $table->integer('stp_cattle')->default('0');
            $table->integer('stp_goats')->default('0');
            $table->integer('stp_sheep')->default('0');
            $table->integer('stp_camel')->default('0');
            $table->integer('stp_others')->default('0');
            $table->integer('str_cattle')->default('0');
            $table->integer('str_goats')->default('0');
            $table->integer('str_sheep')->default('0');
            $table->integer('str_camel')->default('0');
            $table->integer('str_others')->default('0');
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
        Schema::dropIfExists('stock_theft_incidences');
    }
}
