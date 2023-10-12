<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use Illuminate\Database\Seeder;

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

        $this->call([
            ProductCategorySeeder::class,
            ProductSeeder::class,
            RoleSeeder::class,
            PaymentStatusSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'role_id' => 1,
            'email' => 'superadmin@gmail.com',
        ]);

        Setting::create([
            'whatsapp' => '6283857317946'
        ]);
    }
}
