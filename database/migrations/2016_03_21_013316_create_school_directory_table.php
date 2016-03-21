<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolDirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_directory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_type_id')->unsigned();
            $table->string('name', 128);
            $table->string('address', 256);
            $table->string('map_address', 256);
            $table->string('phone', 16);
            $table->string('email' ,128);
            $table->string('website', 128);
            $table->string('logo', 256);
            $table->string('images', 256);
            $table->integer('city_id')->unsigned();
            $table->text('description');
            $table->text('data');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->softDeletes();
        });
        
        Schema::table('school_directory', function (Blueprint $table) {
            $table->foreign('school_type_id')
                ->references('id')
                ->on('school_type')
                ->onDelete('cascade');

            $table->foreign('city_id')
                ->references('id')
                ->on('city')
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
       Schema::drop('school_directory');
    }
}
