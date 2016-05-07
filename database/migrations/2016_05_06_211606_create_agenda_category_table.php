<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->softDeletes();
        });
        
        Schema::table('agenda_category', function (Blueprint $table) {
            
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
        Schema::drop('agenda_category');
    }
}
