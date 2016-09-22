<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Create some tags.
    	factory(App\Tag::class, 10)->create();

    	// Create some users.
        factory(App\User::class, 25)->create()->each(function($u) {
        	// Have each user publish one post.
            $post = $u->posts()->save(factory(App\Post::class)->make());

            // Add random tags to post.
            $post->tags()->save(App\Tag::find(rand(1, 5)));
            $post->tags()->save(App\Tag::find(rand(6, 10)));
        });
    }
}
