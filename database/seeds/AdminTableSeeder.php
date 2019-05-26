<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class AdminTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 * @throws Exception
	 */
	public function run() {
		$admins = [
			'id' => Uuid::generate()->string,
			'name' => env('APP_DEV'),
			'email' => 'admin@test.com',
			'password' => bcrypt('admin@test.com'),
			'remember_token' => str_random(10),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
		DB::table('admins')->insert($admins);
	}
}
