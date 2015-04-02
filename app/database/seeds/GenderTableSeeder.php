<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GenderTableSeeder extends Seeder {

	public function run()
	{
		DB::table('gender')->delete();

		Gender::create(array('name' => 'male'));
		Gender::create(array('name' => 'female'));
	}

}