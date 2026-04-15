<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\WebInfo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Rega',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                "role_id" => 1
            ]);
        }

        if (!User::where('email', 'karyawan@example.com')->exists()) {
            User::create([
                'name' => 'Agus Prayetno',
                'email' => 'karyawan@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                "role_id" => 2
            ]);
        }


        if (!WebInfo::where('name', 'web_title')->exists()) {
            $webinfo = new WebInfo;
            $webinfo->name = "web_title";
            $webinfo->value = "JOHN BAG SHOP";
            $webinfo->save();
        }

        if (Category::count() < 3) {
            Category::insert([
                ["name" => "Category 1"],
                ["name" => "Category 2"],
                ["name" => "Category 3"]
            ]);
        }

        Product::factory(10)->create();
    }
}
