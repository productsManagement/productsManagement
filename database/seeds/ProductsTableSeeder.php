<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModels\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i<101; $i++){
        	Product::create([
        		'SKU' => $faker->sentence(20),
		        'name' => $faker->sentence(20),
		        'brand' => $faker->sentence(20),
		        'category_id' => $faker->randomNumber(),
		        'description' => $faker->sentence(3),
		        'unitName' => $faker->sentence(20),
		        'unitValue' => $faker->randomNumber(),
		        'buyPrice' => $faker->randomNumber(),
		        'images' => $faker->imageUrl($width = 640, $height = 480),
		        'status'=> $faker->randomDigit(2),
		        'tags' => $faker->sentence(20),
		        'created_by' => $faker->sentence(20),
		        'updated_by' => $faker->sentence(20)
        		]);
        }
    }
}
