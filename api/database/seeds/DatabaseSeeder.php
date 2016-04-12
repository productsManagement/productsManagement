<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    	
    	$faker = Faker::create();
    	foreach (range(1,500) as $index) {
	        DB::table('db_products')->insert([
	            'name' => $faker->name,
	            'brand' => $faker->brand,
	            'buyPrice' => $faker->buyPrice,
	        ]);
        }
    }
}
