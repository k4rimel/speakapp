<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfileLanguageToLearnTableSeeder extends Seeder {

	public function run()
	{
		DB::table('profile_language_to_learn')->delete();
		$faker = Faker::create();

		$profileIds = Profile::lists('id');
		$languageIds = Language::lists('id');

		$faker->seed(1718);

		foreach(range(1, 20) as $index)
		{
			$profileLanguageToLearn = ProfileLanguageToLearn::create([
				'profile_id' => $faker->randomElement($profileIds),
				'language_id' =>  $faker->randomElement($languageIds)
			]);
		}
	}

}