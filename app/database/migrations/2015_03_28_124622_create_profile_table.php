<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile', function(Blueprint $table)
		{
			$table->integer('idProfile')->primary();
			$table->dateTime('brithday')->nullable();
			$table->string('fristname', 45)->nullable();
			$table->string('lastname', 45)->nullable();
			$table->text('interests', 65535)->nullable();
			$table->text('description')->nullable();
			$table->integer('hometownLocation')->nullable()->index('hometownLocation_idx');
			$table->integer('currentLocation')->nullable()->index('currentLocation_idx');
			$table->string('pictureURL')->nullable();
			$table->string('pictureSmallURL')->nullable();
			$table->string('pictureBigURL')->nullable();
			$table->integer('profileGender')->nullable()->index('profile_gender_fk_idx');
			$table->rememberToken();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile');
	}

}
