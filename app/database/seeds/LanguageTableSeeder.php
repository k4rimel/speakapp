<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LanguageTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$faker->seed(9101);

		Language::create([
			'code' => 'af', 'name' => 'Afrikaans'
			'code' => 'am', 'name' => 'Amharic'
			'code' => 'ar', 'name' => 'Arabic'
			'code' => 'be', 'name' => 'Byelorussian'
			'code' => 'bg', 'name' => 'Bulgarian'
			'code' => 'bs', 'name' => 'Bosnian'
			'code' => 'ca', 'name' => 'Catalan'
			'code' => 'cs', 'name' => 'Czech'
			'code' => 'cy', 'name' => 'Welsh'
			'code' => 'da', 'name' => 'Danish'
			'code' => 'de', 'name' => 'German'
			'code' => 'el', 'name' => 'Greek'
			'code' => 'en', 'name' => 'English'
			'code' => 'eo', 'name' => 'Esperanto'
			'code' => 'es', 'name' => 'Spanish'
			'code' => 'et', 'name' => 'Estonian'
			'code' => 'eu', 'name' => 'Basque'
			'code' => 'fa', 'name' => 'Persian'
			'code' => 'fi', 'name' => 'Finnish'
			'code' => 'fr', 'name' => 'French'
			'code' => 'fy', 'name' => 'Frisian'
			'code' => 'ga', 'name' => 'Irish Gaelic'
			'code' => 'gd', 'name' => 'Scottish Gaelic'
			'code' => 'he', 'name' => 'Hebrew'
			'code' => 'hi', 'name' => 'Hindi'
			'code' => 'hr', 'name' => 'Croatian'
			'code' => 'hu', 'name' => 'Hungarian'
			'code' => 'hy', 'name' => 'Armenian'
			'code' => 'id', 'name' => 'Indonesian'
			'code' => 'is', 'name' => 'Icelandic'
			'code' => 'it', 'name' => 'Italian'
			'code' => 'ja', 'name' => 'Japanese'
			'code' => 'ka', 'name' => 'Georgian'
			'code' => 'ko', 'name' => 'Korean'
			'code' => 'la', 'name' => 'Latin'
			'code' => 'lt', 'name' => 'Lithuanian'
			'code' => 'lv', 'name' => 'Latvian'
			'code' => 'mr', 'name' => 'Marathi'
			'code' => 'ms', 'name' => 'Malay'
			'code' => 'ne', 'name' => 'Nepali'
			'code' => 'nl', 'name' => 'Dutch'
			'code' => 'no', 'name' => 'Norwegian'
			'code' => 'pl', 'name' => 'Polish'
			'code' => 'pt', 'name' => 'Portuguese'
			'code' => 'qu', 'name' => 'Quechua'
			'code' => 'rm', 'name' => 'Rhaeto', 'name' => 'Romance'
			'code' => 'ro', 'name' => 'Romanian'
			'code' => 'ru', 'name' => 'Russian'
			'code' => 'sa', 'name' => 'Sanskrit'
			'code' => 'sco', 'name' => 'Scots'
			'code' => 'sk', 'name' => 'Slovak'
			'code' => 'sl', 'name' => 'Slovenian'
			'code' => 'sq', 'name' => 'Albanian'
			'code' => 'sr', 'name' => 'Serbian'
			'code' => 'sv', 'name' => 'Swedish'
			'code' => 'sw', 'name' => 'Swahili'
			'code' => 'ta', 'name' => 'Tamil'
			'code' => 'th', 'name' => 'Thai'
			'code' => 'tl', 'name' => 'Tagalog'
			'code' => 'tr', 'name' => 'Turkish'
			'code' => 'uk', 'name' => 'Ukrainian'
			'code' => 'vi', 'name' => 'Vietnamese'
			'code' => 'yi', 'name' => 'Yiddish'
		]);
	}

}