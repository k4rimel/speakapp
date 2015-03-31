<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfileLanguageSpokenTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$profileIds = Profile::lists('id');
		$languageIds = Language::lists('id');

		$faker->seed(5678);

		foreach(range(1, 20) as $index)
		{
			ProfileLanguageSpoken::create([
				'profileId' => $faker->randomElement($profileIds),
				'languageId' =>  $faker->randomElement($languageIds)
			]);
		}
	}

}