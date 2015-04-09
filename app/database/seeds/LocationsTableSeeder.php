<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Faker\Provider\en_US\Address as FakerAdress;

class LocationsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('location')->delete();
		$faker = Faker::create('fr_FR');
	 	$faker->addProvider(new FakerAdress($faker));
		$faker->seed(1415);
		foreach(range(1, 20) as $index)
		{
			$location = Location::create([
				'city' => $faker->city(),
				'country' => $faker->country(),
				'state' => $faker->state(),
				'street' => $faker->streetName(),
				'zipcode' => $faker->postCode()
			]);
		}
	}

}