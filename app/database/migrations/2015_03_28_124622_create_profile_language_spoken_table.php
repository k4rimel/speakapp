<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileLanguageSpokenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_language_spoken', function(Blueprint $table)
		{
			$table->integer('profileId');
			$table->integer('languageId')->index('id_language_fk_idx');
			$table->primary(['profileId','languageId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_language_spoken');
	}

}
