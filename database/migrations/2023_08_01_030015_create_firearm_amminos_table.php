<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirearmAmminosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firearm_amminos', function (Blueprint $table) {
            $table->id();
            $table->integer('surrendered')->default('0');
            $table->integer('recovered')->default('0');
            $table->bigInteger('county_id')->unsigned();
            $table->bigInteger('ammunition_id')->unsigned();
            $table->bigInteger('firearm_incidence_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('ammunition_id')->references('id')->on('ammunitions')->onDelete('cascade');
            $table->foreign('firearm_incidence_id')->references('id')->on('firearm_incidences')->onDelete('cascade');
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
        Schema::dropIfExists('firearm_amminos');
    }
}
