<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('scholarship_degree_id')->unsigned();
            $table->string('slug', 256);
            $table->string('title', 256);
            $table->string('instance', 128);
            $table->integer('deadline');

			$table->text('content');
			$table->text('requirement');
			$table->text('registration');
            $table->string('image_content', 256);
            $table->string('image_cover' , 256);
            $table->string('link' , 256);

			$table->boolean('status');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->softDeletes();
        });

        Schema::table('scholarships', function (Blueprint $table) {
            /*$table->foreign('scholarship_degree_id')
                ->references('id')
                ->on('scholarship_degrees')
                ->onDelete('cascade');*/

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
        Schema::drop('scholarships');
    }
}
