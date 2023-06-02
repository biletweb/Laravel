<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ]
        );

        Category::factory()->create(['title' => 'Category 1']);
        Category::factory()->create(['title' => 'Category 2']);
        Category::factory()->create(['title' => 'Category 3']);

        Post::factory(20)->create();

    }
}
