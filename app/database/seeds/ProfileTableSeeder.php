<?php

use Faker\Factory as Faker;

class ProfileTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create('fr_FR');

		$faker->seed(1234);

		$genderIds = Gender::lists('id');

		foreach(range(1, 20) as $index)
		{
			Profile::create(['birthday' => $faker->date('Y-m-d', 'now'), 'firstname' => $faker->firstName, 'lastname' => $faker->lastName,
							'interests' => $faker->sentence, 'description' => $faker->text, 
							'hometownLocation' => $faker->city, 'currentLocation' => $faker->city,
							'pictureURL' => $faker->imageUrl(640, 480),'pictureSmallURL' => $faker->imageUrl(320, 240),
							'pictureBigURL' => $faker->imageUrl(800, 600),'profileGender' => $faker->randomElement($genderIds)
			]);
		}
	}

}