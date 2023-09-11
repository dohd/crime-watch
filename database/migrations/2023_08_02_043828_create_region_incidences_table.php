<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_incidences', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->date('date_commited');
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('county_id')->unsigned();
            $table->bigInteger('division_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('region_incidences');
    }
}
