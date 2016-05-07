<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agenda_category_id')->unsigned();
            $table->string('slug', 256);
            $table->string('title', 256);
            $table->integer('city_id')->unsigned();
            $table->string('location', 256);
            $table->integer('start_datetime');
            $table->integer('end_datetime');
            $table->string('image_cover' , 256);
            $table->string('image_content', 256);
            $table->string('map_address', 256);
            $table->text('content');
            $table->string('embed', 256);
            $table->boolean('status');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->softDeletes();
        });
        
        Schema::table('education_agenda', function (Blueprint $table) {
            $table->foreign('agenda_category_id')
                ->references('id')
                ->on('agenda_category')
                ->onDelete('cascade');
            
            $table->foreign('city_id')
                ->references('id')
                ->on('city')
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
        Schema::drop('education_agenda');
    }
}
