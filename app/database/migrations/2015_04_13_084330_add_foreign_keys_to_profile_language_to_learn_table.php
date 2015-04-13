<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfileLanguageToLearnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profile_language_to_learn', function(Blueprint $table)
		{
			$table->foreign('language_id', 'id_language_language_to_learn_fk')->references('id')->on('languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('profile_id', 'id_profile_language_to_learn_fk')->references('id')->on('profiles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profile_language_to_learn', function(Blueprint $table)
		{
			$table->dropForeign('id_language_language_to_learn_fk');
			$table->dropForeign('id_profile_language_to_learn_fk');
		});
	}

}
