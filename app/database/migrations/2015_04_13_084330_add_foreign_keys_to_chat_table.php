<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chat', function(Blueprint $table)
		{
			$table->foreign('profile_id', 'id_profile_chat_fk')->references('id')->on('profiles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chat', function(Blueprint $table)
		{
			$table->dropForeign('id_profile_chat_fk');
		});
	}

}
