<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('GenderTableSeeder');
		// $this->call('LanguageTableSeeder');
		// $this->call('LocationTableSeeder');
		$this->call('ProfileTableSeeder');
		// $this->call('ProfileLanguageSpokenTableSeeder');
	}

}
