<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = [
            [
                'id' => '1',
                'name' => 'Shirt',
                'slug' => 'shirt',
            ],
            [
                'id' => '2',
                'name' => 'Hoodie',
                'slug' => 'hoodie',
            ],
            [
                'id' => '3',
                'name' => 'Book',
                'slug' => 'book',
            ]
        ];

        foreach($categoryData as $value){
            DB::table('product_category')->insert([
                'id' => $value['id'],
                'name' => $value['name'],
                'slug'=> $value['slug'],
                'created_at' => Now(),
                'updated_at' => Now()
            ]);
        }
    }
}
