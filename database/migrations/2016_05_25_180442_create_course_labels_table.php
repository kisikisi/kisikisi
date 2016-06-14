<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('label_id')->unsigned();

        });

        Schema::table('course_labels', function (Blueprint $table) {
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->foreign('label_id')
                ->references('id')
                ->on('labels')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_labels');
    }
}
