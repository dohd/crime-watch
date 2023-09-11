<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrafficReportByRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic_report_by_rules', function (Blueprint $table) {
            $table->id();
            $table->integer('report_value')->default('0');
            $table->bigInteger('traffic_incidence_id')->unsigned();
            $table->bigInteger('traffic_enforcement_action_id')->unsigned();
            $table->bigInteger('region_id')->unsigned();
            $table->foreign('traffic_incidence_id')->references('id')->on('traffic_incidences')->onDelete('cascade');
            $table->foreign('traffic_enforcement_action_id')->references('id')->on('traffic_enforcement_actions')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
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
        Schema::dropIfExists('traffic_report_by_rules');
    }
}
