<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat', function(Blueprint $table)
		{
			$table->integer('idchat')->primary();
			$table->integer('profileId')->index('id_profile_fk_idx');
			$table->text('message', 65535);
			$table->timestamp('sentOn')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chat');
	}

}
