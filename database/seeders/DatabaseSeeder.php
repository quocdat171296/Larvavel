<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	$this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->insert([
        	['name'=>'Dat','email'=>Str::random(10).'@gmail.com','password'=>bcrypt('matkhau')],
        	['name'=>'Laravel','email'=>Str::random(10).'@gmail.com','password'=>bcrypt('matkhau')],
        	['name'=>'PHP','email'=>Str::random(10).'@gmail.com','password'=>bcrypt('matkhau')]
    	]);
	}
}