<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWildlifeIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widlife_incidences', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->date('date_commited');
            $table->integer('elephant')->default('0');
            $table->integer('rhino')->default('0');
            $table->integer('giraffe')->default('0');
            $table->integer('injured')->default('0');
            $table->integer('fetal')->default('0');
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('widlife_incidences');
    }
}
