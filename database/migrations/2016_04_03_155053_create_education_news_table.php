<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_category_id')->unsigned();
            $table->string('slug', 256);
            $table->string('title', 256);
            $table->text('content');
            $table->string('image_content', 256);
            $table->string('image_cover' , 256);
            $table->integer('date')->unsigned();
            $table->integer('author')->unsigned();
            $table->string('ipaddress', 32);
            $table->boolean('status');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->softDeletes();
        });
        
        Schema::table('education_news', function (Blueprint $table) {
            $table->foreign('news_category_id')
                ->references('id')
                ->on('school_type')
                ->onDelete('cascade');

            $table->foreign('author')
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
        //
    }
}
