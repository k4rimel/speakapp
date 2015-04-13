<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('birthday')->nullable();
			$table->string('firstname', 45)->nullable();
			$table->string('lastname', 45)->nullable();
			$table->string('email', 45)->nullable();
			$table->string('password');
			$table->text('interests', 65535)->nullable();
			$table->text('description')->nullable();
			$table->string('picture_url')->nullable();
			$table->string('picture_small_url')->nullable();
			$table->string('picture_big_url')->nullable();
			$table->integer('hometown_location_id')->nullable()->index('hometownLocation_idx');
			$table->integer('current_location_id')->nullable()->index('currentLocation_idx');
			$table->integer('gender_id')->nullable()->index('profile_gender_fk_idx');
			$table->integer('user_id')->nullable()->index('profile_gender_fk_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
