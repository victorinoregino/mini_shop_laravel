<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
        	[
	            'name' => 'Polo',
	            'qty' => 10,
	            'category' => 'top'
	        ],
	        [
	            'name' => 'Shirt',
	            'qty' => 10,
	            'category' => 'top'
        	],
	        [
	            'name' => 'Short',
	            'qty' => 10,
	            'category' => 'bottom'
	        ],
	        [
	            'name' => 'Pants',
	            'qty' => 10,
	            'category' => 'bottom'
	        ]
    	);
    }
}
