<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_directories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_type_id')->unsigned();
            $table->string('npsn', 8);
            $table->string('slug', 32);
            $table->string('name', 128);
            $table->string('address', 256);
            $table->integer('city_id')->unsigned();
            $table->string('postal', 8);
            $table->string('map_address', 256);
            $table->string('phone', 16);
            $table->string('fax', 16);
            $table->string('email' ,128);
            $table->string('website', 128);
            $table->string('logo', 256);
            $table->string('image', 256);
            $table->text('description');
            $table->text('data');
			$table->smallInteger('status');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->softDeletes();
        });
        
        Schema::table('school_directories', function (Blueprint $table) {
			$table->unique('npsn');
            $table->foreign('school_type_id')
                ->references('id')
                ->on('school_types')
                ->onDelete('cascade');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
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
       Schema::drop('school_directories');
    }
}
