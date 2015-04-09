<?php

use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('profile')->delete();
		$faker = Faker::create('fr_FR');
		$faker->seed(1234);
		$gendersIds = Gender::lists('id');
		$locationsIds = Location::lists('id');
		$usersIds = User::lists('id');
		$date = $faker->dateTime();
		foreach(range(1, 20) as $index)
		{
			$profile = Profile::create([
				'birthday' => $date->format('Y-m-d'),
				'firstname' => $faker->firstName(),
				'lastname' => $faker->lastName(),
				'interests' => $faker->sentence(), 
				'description' => $faker->paragraph(rand(1,3)),
				'hometownLocation' => $faker->randomElement($locationsIds),
				'currentLocation' => $faker->randomElement($locationsIds),
				'pictureURL' => $faker->imageUrl(640, 480),
				'pictureSmallURL' => $faker->imageUrl(320, 240),
				'pictureBigURL' => $faker->imageUrl(800, 600),
				'profileGender' => $faker->randomElement($gendersIds),
				'email' => $faker->email(),
			]);
		}
	}

}