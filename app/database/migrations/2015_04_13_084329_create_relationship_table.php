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
			$table->integer('profile_one_id');
			$table->integer('profile_two_id')->index('profile_two_id_fk_idx');
			$table->integer('status')->index('status_id_fk_idx');
			$table->integer('action_user_id')->index('action_user_id_fk_idx');
			$table->primary(['profile_one_id','profile_two_id']);
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
