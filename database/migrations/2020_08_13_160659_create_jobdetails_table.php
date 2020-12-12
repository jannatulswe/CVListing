<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title');
            $table->string('company_name');
            $table->tinyInteger('vacancy'); //how many sits are available for the job
            $table->text('job_responsibilities');
            $table->text('employee_status');
            $table->string('educational_requirement');
            $table->string('experience_requirement');
            $table->string('additional_requirement')->nullable();
            $table->string('job_location'); //office address
            $table->double('salary');
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('category_id'); //creating a column in job details table
            $table->timestamps();
            $table->foreign('category_id')->on('categories')->references('id'); // referencing with category table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobdetails');
    }
}
