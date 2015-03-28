<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('relationship', function(Blueprint $table)
		{
			$table->foreign('profileOneId', 'profile_one_id_fk')->references('idProfile')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('profileTwoId', 'profile_two_id_fk')->references('idProfile')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('actionUserId', 'action_user_id_fk')->references('idProfile')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('status', 'status_id_fk')->references('code')->on('status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('relationship', function(Blueprint $table)
		{
			$table->dropForeign('profile_one_id_fk');
			$table->dropForeign('profile_two_id_fk');
			$table->dropForeign('action_user_id_fk');
			$table->dropForeign('status_id_fk');
		});
	}

}
