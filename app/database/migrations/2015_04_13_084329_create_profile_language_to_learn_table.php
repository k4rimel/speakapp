<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileLanguageToLearnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_language_to_learn', function(Blueprint $table)
		{
			$table->integer('profile_id')->index('id_profile_language_to_learn_fk');
			$table->integer('language_id')->index('id_language_fk_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_language_to_learn');
	}

}
