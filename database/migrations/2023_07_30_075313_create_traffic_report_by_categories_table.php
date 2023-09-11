<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrafficReportByCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic_report_by_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('c_report_value')->default('0');
            $table->bigInteger('traffic_incidence_id')->unsigned();
            $table->bigInteger('traffic_type_id')->unsigned();
            $table->bigInteger('traffi_category_id')->unsigned();
            $table->foreign('traffic_incidence_id')->references('id')->on('traffic_incidences')->onDelete('cascade');
            $table->foreign('traffic_type_id')->references('id')->on('traffic_types')->onDelete('cascade');
            $table->foreign('traffi_category_id')->references('id')->on('traffi_categories')->onDelete('cascade');
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
        Schema::dropIfExists('traffic_report_by_categories');
    }
}
