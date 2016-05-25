<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 256);
            $table->string('title', 256);
            $table->integer('author_id')->unsigned();

			$table->text('description');
			$table->integer('duration');
			$table->smallInteger('difficulty');
			$table->string('image_cover', 256);
            $table->string('embed', 256);

			$table->boolean('status');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->softDeletes();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('modified_by')
                ->references('id')
                ->on('users')
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
        Schema::drop("courses");
    }
}
