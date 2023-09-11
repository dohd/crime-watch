<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidlifeStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widlife_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('statistic_value')->default('0');
            $table->bigInteger('widlife_incidence_id')->unsigned();
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('incident_file_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('incident_file_id')->references('id')->on('incident_files')->onDelete('cascade');
            $table->foreign('widlife_incidence_id')->references('id')->on('widlife_incidences')->onDelete('cascade');
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
        Schema::dropIfExists('widlife_statistics');
    }
}
