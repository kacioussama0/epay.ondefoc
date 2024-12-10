<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'epay@ondefoc.dz',
            'password' => Hash::make('ondefoc2024')
        ]);

        Category::create([
           'name' => 'دورات',
            'slug' => 'formations',
            'user_id' => 1
        ]);

        Category::create([
            'name' => 'خدماتنا',
            'slug' => 'services',
            'user_id' => 1
        ]);


        Product::create([
            'id' => 1,
            'name' => 'شهادة الكفاءة المهنية',
            'slug' => 'vcae',
            'description' => '',
            'amount' => 16350 * 1000,
            'category_id' => 2,

        ]);

    }
}
