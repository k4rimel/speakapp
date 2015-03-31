<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GenderTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$faker->seed(1213);
		Gender::create([
			'male','female'
		]);
	}

}