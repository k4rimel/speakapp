<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profiles', function(Blueprint $table)
		{
			$table->foreign('currentLocation', 'currentLocation_fk')->references('id')->on('locations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('hometownLocation', 'hometownLocation_fk')->references('id')->on('locations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('profileGender', 'profile_gender_fk')->references('id')->on('gender')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id', 'user_id_fk')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profiles', function(Blueprint $table)
		{
			$table->dropForeign('currentLocation_fk');
			$table->dropForeign('hometownLocation_fk');
			$table->dropForeign('profile_gender_fk');
			$table->dropForeign('user_id_fk');
		});
	}

}
