<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'title' => 'Learning Laravel',
            'content' => 'This blog post will get you right on track with Laravel!'
        ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'The Next Steps',
            'content' => 'Understanding the basics is great, but you need to be able to take the next step.'
        ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'Laravel 5.3',
            'content' => 'Though announced as a "minor release", Laravel 5.3 ships with some very interesting additions and features.'
        ]);
        $post->save();
    }
}
