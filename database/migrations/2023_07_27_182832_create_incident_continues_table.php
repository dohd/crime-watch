<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentContinuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_continues', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('place')->nullable();
            $table->string('mode_of_operandi')->nullable();
            $table->string('as_name')->nullable();
            $table->string('as_value')->nullable();
            $table->string('ar_name')->nullable();
            $table->string('ar_value')->nullable();
            $table->string('ad_name')->nullable();
            $table->string('ad_value')->nullable();
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
        Schema::dropIfExists('incident_continues');
    }
}
