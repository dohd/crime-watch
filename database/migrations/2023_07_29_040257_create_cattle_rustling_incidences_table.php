<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCattleRustlingIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cattle_rustling_incidences', function (Blueprint $table) {
            $table->id();
            $table->integer('cr_killed')->default('0');
            $table->integer('cr_injured')->default('0');
            $table->integer('cr_arrested')->default('0');
            $table->integer('cs_cattle')->default('0');
            $table->integer('cs_goats')->default('0');
            $table->integer('cs_sheep')->default('0');
            $table->integer('cs_camel')->default('0');
            $table->integer('cs_others')->default('0');
            $table->integer('cr_cattle')->default('0');
            $table->integer('cr_goats')->default('0');
            $table->integer('cr_sheep')->default('0');
            $table->integer('cr_camel')->default('0');
            $table->integer('cr_others')->default('0');
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
        Schema::dropIfExists('cattle_rustling_incidences');
    }
}
