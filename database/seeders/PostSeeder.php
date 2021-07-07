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
        Post::factory(10)->create()->map(function (Post $event){
            $event->addMedia(public_path('images/events/1.jpg'))->preservingOriginal()->toMediaCollection();
            $event->addMedia(public_path('images/events/2.jpg'))->preservingOriginal()->toMediaCollection();
            $event->addMedia(public_path('images/events/3.jpg'))->preservingOriginal()->toMediaCollection();
        });;
    }
}
