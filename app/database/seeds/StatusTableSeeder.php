<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StatusTableSeeder extends Seeder {

	public function run()
	{
		DB::table('status')->delete();
		$faker = Faker::create();

		Status::create(['code' => '0', 'name' => 'Pending']);
		Status::create(['code' => '1', 'name' => 'Accepted']);
		Status::create(['code' => '2', 'name' => 'Declined']);
		Status::create(['code' => '3', 'name' => 'Blocked']);
	}

}