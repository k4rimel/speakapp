<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscussionMethodProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discussion_method_profile', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('profileId')->index('id_profile_fk_idx');
			$table->primary(['id','profileId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('discussion_method_profile');
	}

}
