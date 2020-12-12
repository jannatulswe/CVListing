<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_criterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('job_detail_id');
            $table->unsignedInteger('criteria_id');
            $table->integer('evaluation_point');
            $table->text('criteria_type');
            $table->foreign('job_detail_id')->references('id')->on('jobdetails');
            $table->foreign('criteria_id')->references('id')->on('criterias');
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
        Schema::dropIfExists('jobs_criterias');
    }
}
