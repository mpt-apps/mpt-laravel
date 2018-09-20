<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_area_id');
            $table->string('name');
            $table->string('place');
            $table->string('category');
            $table->text('description');
            $table->date('started_at');
            $table->date('finished_at');
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
        Schema::dropIfExists('job_positions');
    }
}
