<?php

namespace Database\Seeders;

use App\Models\Category;
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
            'slug' => 'دورات',
            'user_id' => 1
        ]);

        Category::create([
            'name' => 'خدماتنا',
            'slug' => 'خدماتنا',
            'user_id' => 1
        ]);
    }
}
