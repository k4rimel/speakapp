<?php

use Faker\Factory as Faker;

class ProfileTableSeeder extends Seeder {

	public function run()
	{
		DB::table('profile')->delete();
		$faker = Faker::create('fr_FR');
		$faker->seed(1234);
		$genderIds = Gender::lists('idGender');
		$locationIds = Location::lists('idLocation');
		$date = $faker->dateTime();
		foreach(range(1, 20) as $index)
		{
			$profile = Profile::create([
										'birthday' => $date->format('Y-m-d'),
										'firstname' => $faker->firstName(),
										'lastname' => $faker->lastName(),
										'interests' => $faker->sentence(), 
										'description' => $faker->paragraph(rand(1,3)),
										'hometownLocation' => $faker->randomElement($locationIds),
										'currentLocation' => $faker->randomElement($locationIds),
										'pictureURL' => $faker->imageUrl(640, 480),
										'pictureSmallURL' => $faker->imageUrl(320, 240),
										'pictureBigURL' => $faker->imageUrl(800, 600),
										'profileGender' => $faker->randomElement($genderIds),
										'email' => $faker->email(),
			]);
		}
	}

}