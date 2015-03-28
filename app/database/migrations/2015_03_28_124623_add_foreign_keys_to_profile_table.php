<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profile', function(Blueprint $table)
		{
			$table->foreign('hometownLocation', 'hometownLocation_fk')->references('idLocation')->on('location')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('currentLocation', 'currentLocation_fk')->references('idLocation')->on('location')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('profileGender', 'profile_gender_fk')->references('idGender')->on('gender')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profile', function(Blueprint $table)
		{
			$table->dropForeign('hometownLocation_fk');
			$table->dropForeign('currentLocation_fk');
			$table->dropForeign('profile_gender_fk');
		});
	}

}
