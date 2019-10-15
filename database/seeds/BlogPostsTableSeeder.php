<?php

use Illuminate\Database\Seeder;
use App\BlogPost;
use App\User;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postsCount = (int) $this->command->ask('How many posts would you like to add?', 50);

        $users = User::all();

        factory(BlogPost::class, $postsCount)->make()->each(function($post) use ($users){
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
