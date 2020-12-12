<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('examination_id');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('monitored_by');
            $table->integer('total_marks');
            $table->timestamps();
            $table->foreign('candidate_id')->on('candidates')->references('id');
            $table->foreign('monitored_by')->on('employers')->references('id');
            $table->foreign('examination_id')->on('examinations')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_evaluations');
    }
}
