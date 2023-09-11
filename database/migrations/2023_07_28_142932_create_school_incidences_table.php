<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_incidences', function (Blueprint $table) {
            $table->id();
            $table->string('s_school_name');
            $table->bigInteger('nature_of_school_unrest_id')->unsigned();
            $table->string('s_reason');
            $table->integer('s_cases_reported')->default('0');
            $table->integer('s_student_injured')->default('0');
            $table->integer('s_student_dead')->default('0');
            $table->string('s_student_non_injured')->default('0');
            $table->integer('s_student_non_dead')->default('0');
            $table->integer('s_student_arrested')->default('0');
            $table->integer('s_student_prosecuted')->default('0');
            $table->integer('s_other_arrest')->default('0');
            $table->integer('s_other_prosecuted')->default('0');
            $table->string('s_sp_destroyed');
            $table->decimal('s_sp_value',8,2)->default('0.00');
            $table->bigInteger('incident_record_id')->unsigned();
            $table->foreign('nature_of_school_unrest_id')->references('id')->on('nature_of_school_unrests')->onDelete('cascade');
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
        Schema::dropIfExists('school_incidences');
    }
}
