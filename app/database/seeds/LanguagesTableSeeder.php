<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LanguagesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('languages')->delete();
		$language = Language::create(array('code' => 'af', 'name' => 'Afrikaans'));
		$language = Language::create(array('code' => 'am', 'name' => 'Amharic'));
		$language = Language::create(array('code' => 'ar', 'name' => 'Arabic'));
		$language = Language::create(array('code' => 'be', 'name' => 'Byelorussian'));
		$language = Language::create(array('code' => 'bg', 'name' => 'Bulgarian'));
		$language = Language::create(array('code' => 'bs', 'name' => 'Bosnian'));
		$language = Language::create(array('code' => 'ca', 'name' => 'Catalan'));
		$language = Language::create(array('code' => 'cs', 'name' => 'Czech'));
		$language = Language::create(array('code' => 'cy', 'name' => 'Welsh'));
		$language = Language::create(array('code' => 'da', 'name' => 'Danish'));
		$language = Language::create(array('code' => 'de', 'name' => 'German'));
		$language = Language::create(array('code' => 'el', 'name' => 'Greek'));
		$language = Language::create(array('code' => 'en', 'name' => 'English'));
		$language = Language::create(array('code' => 'eo', 'name' => 'Esperanto'));
		$language = Language::create(array('code' => 'es', 'name' => 'Spanish'));
		$language = Language::create(array('code' => 'et', 'name' => 'Estonian'));
		$language = Language::create(array('code' => 'eu', 'name' => 'Basque'));
		$language = Language::create(array('code' => 'fa', 'name' => 'Persian'));
		$language = Language::create(array('code' => 'fi', 'name' => 'Finnish'));
		$language = Language::create(array('code' => 'fr', 'name' => 'French'));
		$language = Language::create(array('code' => 'fy', 'name' => 'Frisian'));
		$language = Language::create(array('code' => 'ga', 'name' => 'Irish Gaelic'));
		$language = Language::create(array('code' => 'gd', 'name' => 'Scottish Gaelic'));
		$language = Language::create(array('code' => 'he', 'name' => 'Hebrew'));
		$language = Language::create(array('code' => 'hi', 'name' => 'Hindi'));
		$language = Language::create(array('code' => 'hr', 'name' => 'Croatian'));
		$language = Language::create(array('code' => 'hu', 'name' => 'Hungarian'));
		$language = Language::create(array('code' => 'hy', 'name' => 'Armenian'));
		$language = Language::create(array('code' => 'id', 'name' => 'Indonesian'));
		$language = Language::create(array('code' => 'is', 'name' => 'Icelandic'));
		$language = Language::create(array('code' => 'it', 'name' => 'Italian'));
		$language = Language::create(array('code' => 'ja', 'name' => 'Japanese'));
		$language = Language::create(array('code' => 'ka', 'name' => 'Georgian'));
		$language = Language::create(array('code' => 'ko', 'name' => 'Korean'));
		$language = Language::create(array('code' => 'la', 'name' => 'Latin'));
		$language = Language::create(array('code' => 'lt', 'name' => 'Lithuanian'));
		$language = Language::create(array('code' => 'lv', 'name' => 'Latvian'));
		$language = Language::create(array('code' => 'mr', 'name' => 'Marathi'));
		$language = Language::create(array('code' => 'ms', 'name' => 'Malay'));
		$language = Language::create(array('code' => 'ne', 'name' => 'Nepali'));
		$language = Language::create(array('code' => 'nl', 'name' => 'Dutch'));
		$language = Language::create(array('code' => 'no', 'name' => 'Norwegian'));
		$language = Language::create(array('code' => 'pl', 'name' => 'Polish'));
		$language = Language::create(array('code' => 'pt', 'name' => 'Portuguese'));
		$language = Language::create(array('code' => 'qu', 'name' => 'Quechua'));
		$language = Language::create(array('code' => 'rm', 'name' => 'Rhaeto'));
		$language = Language::create(array('code' => 'ro', 'name' => 'Romanian'));
		$language = Language::create(array('code' => 'ru', 'name' => 'Russian'));
		$language = Language::create(array('code' => 'sa', 'name' => 'Sanskrit'));
		$language = Language::create(array('code' => 'sco', 'name' => 'Scots'));
		$language = Language::create(array('code' => 'sk', 'name' => 'Slovak'));
		$language = Language::create(array('code' => 'sl', 'name' => 'Slovenian'));
		$language = Language::create(array('code' => 'sq', 'name' => 'Albanian'));
		$language = Language::create(array('code' => 'sr', 'name' => 'Serbian'));
		$language = Language::create(array('code' => 'sv', 'name' => 'Swedish'));
		$language = Language::create(array('code' => 'sw', 'name' => 'Swahili'));
		$language = Language::create(array('code' => 'ta', 'name' => 'Tamil'));
		$language = Language::create(array('code' => 'th', 'name' => 'Thai'));
		$language = Language::create(array('code' => 'tl', 'name' => 'Tagalog'));
		$language = Language::create(array('code' => 'tr', 'name' => 'Turkish'));
		$language = Language::create(array('code' => 'uk', 'name' => 'Ukrainian'));
		$language = Language::create(array('code' => 'vi', 'name' => 'Vietnamese'));
		$language = Language::create(array('code' => 'yi', 'name' => 'Yiddish'));
	}

}