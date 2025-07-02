<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create one or more users
        $users = collect([
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@gmail.com',
            ]),
        ]);

        // 2. Create categories if not already there
        $categories = [
            'Technology',
            'Health',
            'Lifestyle',
            'Education',
            'Travel',
            'Food',
            'Finance',
            'Entertainment',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }

        // 3. Now seed posts safely
        $allCategories = Category::all();

        Post::factory(100)->make()->each(function ($post) use ($users, $allCategories) {
            $post->user_id = $users->random()->id;
            $post->category_id = $allCategories->random()->id;
            $post->save();
        });
    }
}
