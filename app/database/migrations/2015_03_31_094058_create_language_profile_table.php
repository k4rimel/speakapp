<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguageProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('language_profile', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('language_id')->unsigned()->index();
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('NO ACTION');
			$table->integer('profile_id')->unsigned()->index();
			$table->foreign('profile_id')->references('id')->on('profiles')->onDelete('NO ACTION');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('language_profile');
	}

}
