<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 32);
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->integer('born');
            $table->enum('gender', ['M','F']);
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('address');
            $table->string('image_profile', 256);
            $table->string('image_cover' , 256);
            $table->string('quote', 64);
            $table->text('bio');

            $table->string('phone', 16);
            $table->string('email', 64);
            $table->string('website', 64);
            $table->string('facebook', 64);
            $table->string('google', 64);
            $table->string('twitter', 64);
            $table->string('instagram', 64);
            $table->string('linkedin', 64);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('user_profiles', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('user_profiles');
    }
}
