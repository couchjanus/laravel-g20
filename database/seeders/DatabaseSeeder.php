<?php

namespace Database\Seeders;

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
        // \DB::table('users')->truncate();
        // \DB::table('categories')->truncate();
        // \DB::table('posts')->truncate();
        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(20)->create();
        // \App\Models\Post::factory(30)->create();
        \App\Models\Profile::factory(10)->create();
    }

    
}
