<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory(10)->create()->map(function (Event $event){
            $event->addMedia(public_path('images/events/1.jpg'))->preservingOriginal()->toMediaCollection();
            $event->addMedia(public_path('images/events/2.jpg'))->preservingOriginal()->toMediaCollection();
            $event->addMedia(public_path('images/events/3.jpg'))->preservingOriginal()->toMediaCollection();
        });
        // dd(Event::factory(10));
    }
}

