<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationship', function(Blueprint $table)
		{
			$table->integer('profileOneId');
			$table->integer('profileTwoId')->index('profile_two_id_fk_idx');
			$table->integer('status')->index('status_id_fk_idx');
			$table->integer('actionUserId')->index('action_user_id_fk_idx');
			$table->primary(['profileOneId','profileTwoId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relationship');
	}

}
