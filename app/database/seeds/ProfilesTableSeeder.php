<?php

use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('profiles')->delete();
		$faker = Faker::create('fr_FR');
		$faker->seed(1234);
		$gendersIds = Gender::lists('id');
		$locationsIds = Location::lists('id');
		$usersIds = User::lists('id');
		$date = $faker->dateTime();

		foreach(range(1, 20) as $index)
		{
			$user = User::create([
				'username' => $faker->email(),
				'password' => Hash::make('test'),
			]);

			$profile = Profile::create([
				'birthday' => $date->format('Y-m-d'),
				'firstname' => $faker->firstName(),
				'lastname' => $faker->lastName(),
				'interests' => $faker->sentence(), 
				'description' => $faker->paragraph(rand(1,3)),
				'picture_url' => $faker->imageUrl(640, 480),
				'picture_small_url' => $faker->imageUrl(320, 240),
				'picture_big_url' => $faker->imageUrl(800, 600),
				'hometown_location_id' => $faker->randomElement($locationsIds),
				'current_location_id' => $faker->randomElement($locationsIds),
				'gender_id' => $faker->randomElement($gendersIds),
				'user_id' => $user->id
			]);
		}
	}

}