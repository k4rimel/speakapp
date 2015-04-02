<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProfileLanguageToLearnTableSeeder extends Seeder {

	public function run()
	{
		DB::table('profile_language_to_learn')->delete();
		$faker = Faker::create();

		$profileIds = Profile::lists('idProfile');
		$languageIds = Language::lists('idLanguage');

		$faker->seed(1718);

		foreach(range(1, 20) as $index)
		{
			$profileLanguageToLearn = ProfileLanguageToLearn::create([
				'profileId' => $faker->randomElement($profileIds),
				'languageId' =>  $faker->randomElement($languageIds)
			]);
		}
	}

}