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

		$this->call('GenderTableSeeder');
		$this->call('LanguagesTableSeeder');
		$this->call('LocationsTableSeeder');
		// $this->call('UsersTableSeeder');
		$this->call('ProfilesTableSeeder');
		$this->call('ProfileLanguageSpokenTableSeeder');
		$this->call('ProfileLanguageToLearnTableSeeder');
	}

}
