<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        User::factory()->create([
            'name'=>'Andy Villegas',
            'email'=>'andyvillegas440@gmail.com',
            'password'=>Hash::make('admin'),
            'is_admin'=>true
        ]);
        Category::factory(6)->create();
        Product::factory(30)->create();
    }
}
