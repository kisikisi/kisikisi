<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSchoolDirectoryModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_directories', function (Blueprint $table) {
			$table->string('npsn', 8);
			$table->string('postal_code', 6);
			$table->string('faximile', 16);
			$table->smallInteger('status');
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
