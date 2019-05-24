<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productData = [
            [
                'name' => '7 Kesalahan Fatal Pengusaha Pemula',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/7KFPP-300WEB.jpg',
                'slug' => '7-kesalahan-fatal-pengusaha-pemula',
                'product_category_id' => 3,
                'price' => 79000,
                'qty' => 100
            ],
            [
                'name' => '30 Hari Jago Jualan',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/30HJJ-300WEB.jpg',
                'slug' => '30-hari-jago-jualan',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Dongkrak Omset Milyaran',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/DOM-300WEB.jpg',
                'slug' => 'dongkrak-omset-milyaran',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Easy Copywriting',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/ECW-300WEB.jpg',
                'slug' => 'easy-copywriting',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Gara Gara Facebook',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/GGF-300WEB.jpg',
                'slug' => 'gara-gara-facebook',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Gara Gara Facebook Ads',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/GGFA-300WEB.jpg',
                'slug' => 'gara-gara-facebook-ads',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Juragan Marketplace',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/JRM-300WEB.jpg',
                'slug' => 'juragan-marketplace',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Komik Jago Jualan',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/KJJ-300WEB.jpg',
                'slug' => 'komik-jago-jualan',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Main Facebook',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/MF-300WEB.jpg',
                'slug' => 'main-facebook',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
            [
                'name' => 'Melawan Kemustahilan',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate reprehenderit illo corrupti rem temporibus cum id, quae earum. Ab beatae odit velit laudantium eveniet dolorum inventore reiciendis odio itaque quae.',
                'image' => 'product/MK-300WEB.jpg',
                'slug' => 'melawan-kemustahilan',
                'product_category_id' => 3,
                'price' => 199000,
                'qty' => 100
            ],
        ];

        foreach($productData as $value){
            DB::table('products')->insert([
                'name' => $value['name'],
                'description' => $value['description'],
                'image' => $value['image'],
                'slug' => $value['slug'],
                'product_category_id' => $value['product_category_id'],
                'price' => $value['price'],
                'qty' => $value['qty'],
                'created_at' => Now(),
                'updated_at' => Now()
            ]);
        }
    }
}
