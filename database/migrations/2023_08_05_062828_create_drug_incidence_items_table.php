<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugIncidenceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_incidence_items', function (Blueprint $table) {
            $table->id();
            $table->string('sex');
            $table->string('age');
            $table->string('nationality');
            $table->string('case_position');
            $table->decimal('qty',16,4)->default('0.00');
            $table->bigInteger('drug_type_id')->unsigned();
            $table->bigInteger('drug_packaging_id')->unsigned();
            $table->bigInteger('incident_file_id')->unsigned();
            $table->bigInteger('county_id')->unsigned();
            $table->bigInteger('drug_incidence_id')->unsigned();
            $table->foreign('drug_incidence_id')->references('id')->on('drug_incidences')->onDelete('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('incident_file_id')->references('id')->on('incident_files')->onDelete('cascade');
            $table->foreign('drug_packaging_id')->references('id')->on('drug_packagings')->onDelete('cascade');
            $table->foreign('drug_type_id')->references('id')->on('drug_types')->onDelete('cascade');
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
        Schema::dropIfExists('drug_incidence_items');
    }
}
