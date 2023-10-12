<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $menu1 = [
            [
                "name" => "Spaghetti Bolognese",
                "slug" => "spaghetti-bolognese",
                "product_category_id" => 1,
                "price" => 120000,
                "image" => "storage/product/spaghetti_bolognese.jpg",
            ],
            [
                "name" => "Chicken Caesar Salad",
                "slug" => "chicken-caesar-salad",
                "product_category_id" => 1,
                "price" => 99000,
                "image" => "storage/product/chicken_caesar_salad.jpeg",
            ],
            [
                "name" => "Margherita Pizza",
                "slug" => "margherita-pizza",
                "product_category_id" => 1,
                "price" => 149000,
                "image" => "storage/product/margherita_pizza.jpeg",
            ],
            [
                "name" => "Grilled Salmon",
                "slug" => "grilled-salmon",
                "product_category_id" => 1,
                "price" => 189000,
                "image" => "storage/product/grilled_salmon.jpeg",
            ],
            [
                "name" => "Vegetable Stir Fry",
                "slug" => "vegetable-stir-fry",
                "product_category_id" => 1,
                "price" => 109000,
                "image" => "storage/product/vegetable_stir_fry.jpeg",
            ],
        ];
        $menu2 = [
            [
                "name" => "Beef Tacos",
                "slug" => "beef-tacos",
                "product_category_id" => 2,
                "price" => 119900,
                "image" => "storage/product/beef_tacos.jpeg",
            ],
            [
                "name" => "Shrimp Pasta",
                "slug" => "shrimp-pasta",
                "product_category_id" => 2,
                "price" => 159900,
                "image" => "storage/product/shrimp_pasta.jpeg",
            ],
            [
                "name" => "BBQ Chicken Wings",
                "slug" => "bbq-chicken-wings",
                "product_category_id" => 2,
                "price" => 139900,
                "image" => "storage/product/bbq_chicken_wings.jpg",
            ],
        ];
        $menu3 = [
            [
                "name" => "Pho Soup",
                "slug" => "pho-soup",
                "product_category_id" => 3,
                "price" => 109900,
                "image" => "storage/product/pho_soup.jpeg",
            ],
            [
                "name" => "Fish and Chips",
                "slug" => "fish-and-chips",
                "product_category_id" => 3,
                "price" => 149900,
                "image" => "storage/product/fish_and_chips.jpg",
            ],
            [
                "name" => "Beef Burrito",
                "slug" => "beef-burrito",
                "product_category_id" => 3,
                "price" => 119900,
                "image" => "storage/product/beef_burrito.jpeg",
            ],
            [
                "name" => "Chicken Noodle Soup",
                "slug" => "chicken-noodle-soup",
                "product_category_id" => 3,
                "price" => 99900,
                "image" => "storage/product/chicken_noodle_soup.jpeg",
            ],
        ];
        $drinks = [
            [
                "name" => "Iced Coffee",
                "slug" => "iced-coffee",
                "prodct_category_id" => 4,
                "price" => 25000,
                "image" => "storage/product/iced_coffee.jpeg",
            ],
            [
                "name" => "Green Tea",
                "slug" => "green-tea",
                "prodct_category_id" => 4,
                "price" => 15000,
                "image" => "storage/product/green_tea.jpg",
            ],
            [
                "name" => "Lemonade",
                "slug" => "lemonade",
                "prodct_category_id" => 4,
                "price" => 18000,
                "image" => "storage/product/lemonade.jpeg",
            ],
        ];

        $data = array_merge($menu1,$menu2,$menu3,$drinks);
        Product::insert($data);
    }
}
