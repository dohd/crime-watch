<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGangFirearmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gand_firearms', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('total_no_of_gang')->nullable();
            $table->string('no_armed')->nullable();
            $table->string('rifle')->nullable();
            $table->string('pistol')->nullable();
            $table->string('toy_pistol')->nullable();
            $table->string('home_made')->nullable();
            $table->string('other_weapons')->nullable();
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
        Schema::dropIfExists('gand_firearms');
    }
}
