<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScholarshipLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scholarship_id')->unsigned();
            $table->integer('label_id')->unsigned();

        });

        Schema::table('scholarship_labels', function (Blueprint $table) {
            $table->foreign('scholarship_id')
                ->references('id')
                ->on('scholarships')
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
        //
    }
}
