<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
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
       //  \App\Models\User::factory(3)->create();

       Image::factory()->count(3)->create();

     Post::factory()->count(5)->create();
      Comment::factory()->count(15)->create();
    }
    
}
