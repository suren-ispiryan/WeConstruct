<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product1',
                'description' => 'desctiption1',
                'price' => 11111,
                'brand' => 'brand1',
                'color' => '["red","yellow"]',
                'size' => '["medium","big"]',
                'category' => 'books',
                'image' => 'default-product-image.png'
            ],
            [
                'name' => 'Product2',
                'description' => 'desctiption2',
                'price' => 22222,
                'brand' => 'brand2',
                'color' => '["green","yellow"]',
                'size' => '["medium","small"]',
                'category' => 'toys',
                'image' => 'default-product-image.png'
            ],
            [
                'name' => 'Product3',
                'description' => 'desctiption3',
                'price' => 33333,
                'brand' => 'brand3',
                'color' => '["red","yellow"]',
                'size' => '["medium","big"]',
                'category' => 'tools',
                'image' => 'default-product-image.png'
            ]
        ]);
    }
}
