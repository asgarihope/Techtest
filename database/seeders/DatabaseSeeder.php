<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'password' => config('auth.admin_password'),
            'email' => config('auth.admin_email'),
        ]);
    }
}
