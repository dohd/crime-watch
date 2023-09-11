<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyMatterIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_matter_incidences', function (Blueprint $table) {
            $table->id();
            $table->double('amount',8,2)->default('0.00');
            $table->string('currency');
            $table->integer('m_no_of_arrest');
            $table->string('circumstances');
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
        Schema::dropIfExists('money_matter_incidences');
    }
}
