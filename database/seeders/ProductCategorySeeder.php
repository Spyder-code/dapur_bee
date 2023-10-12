<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $data = [
            ['name' => 'Starter Menu','slug' => 'starter-menu'],
            ['name' => 'Main Menu','slug' => 'main-menu'],
            ['name' => 'Special Menu','slug' => 'special-menu'],
            ['name' => 'Drinks','slug' => 'drinks'],
        ];

        ProductCategory::insert($data);
    }
}
