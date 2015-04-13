<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiscussionMethodProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('discussion_method_profile', function(Blueprint $table)
		{
			$table->foreign('id', 'id_discussion_method_fk')->references('id')->on('discussion_method')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('profileId', 'id_profile_discussion_method_fk')->references('id')->on('profiles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('discussion_method_profile', function(Blueprint $table)
		{
			$table->dropForeign('id_discussion_method_fk');
			$table->dropForeign('id_profile_discussion_method_fk');
		});
	}

}
