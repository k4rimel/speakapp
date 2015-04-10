<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		$faker = Faker::create();
		$faker->seed(2122);
		foreach(range(1, 20) as $index)
		{
			User::create([
				'username' => $faker->email(),
				'password' => Hash::make($faker->name . $faker->year),
			]);
		}
	}

}