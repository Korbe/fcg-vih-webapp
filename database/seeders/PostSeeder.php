<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('app.env') == 'local'){
            $posts = Post::factory()
                ->Count(50)
                ->create();

            /** @var Post $post */
            foreach ($posts as $post){
                $post->addMedia( storage_path('demo\demo_audio.mp3'))
                    ->preservingOriginal()
                    ->toMediaCollection('audio');
            }
        }
    }
}
