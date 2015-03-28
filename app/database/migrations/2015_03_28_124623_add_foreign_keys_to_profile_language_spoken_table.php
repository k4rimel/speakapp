<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfileLanguageSpokenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profile_language_spoken', function(Blueprint $table)
		{
			$table->foreign('profileId', 'id_profile_language_to_learn_fk')->references('idProfile')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('languageId', 'id_language_language_to_learn_fk')->references('idLanguage')->on('language')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profile_language_spoken', function(Blueprint $table)
		{
			$table->dropForeign('id_profile_language_to_learn_fk');
			$table->dropForeign('id_language_language_to_learn_fk');
		});
	}

}
