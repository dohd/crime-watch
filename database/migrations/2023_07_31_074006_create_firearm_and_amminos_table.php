<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirearmAndAmminosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firearm_and_amminos', function (Blueprint $table) {
            $table->id();
            $table->integer('surrendered')->default('0');
            $table->integer('recovered')->default('0');
            $table->bigInteger('county_id')->unsigned();
            $table->bigInteger('firearm_id')->unsigned();
            $table->bigInteger('firearm_incidence_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('firearm_id')->references('id')->on('firearms')->onDelete('cascade');
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
        Schema::dropIfExists('firearm_and_amminos');
    }
}
