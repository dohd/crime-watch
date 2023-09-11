<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_files', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->tinyInteger('is_dcir')->default(0)->comment('DCIR=1,DOR=0');
            $table->tinyInteger('is_sgbv')->default(0)->comment('SGBV=1,Others=0');
            $table->tinyInteger('is_drug')->default(0)->comment('Drug=1,Others=0');
            $table->tinyInteger('is_regional')->default(0)->comment('Regional=1,Others=0');
            $table->bigInteger('crime_category_id')->unsigned();
            $table->foreign('crime_category_id')->references('id')->on('crime_categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_files');
    }
}
