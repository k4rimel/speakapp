<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location', function(Blueprint $table)
		{
			$table->integer('idLocation')->primary();
			$table->string('city', 45)->nullable();
			$table->string('country', 45)->nullable();
			$table->string('state', 45)->nullable();
			$table->string('street', 45)->nullable();
			$table->integer('zipcode')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location');
	}

}
