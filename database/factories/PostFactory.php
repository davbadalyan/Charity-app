<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomEventId = Event::all()->random()->id; // Collection works here
        $randomEventId = Event::inRandomOrder()->first()->id; // QueryBuilder order by RAND()

        return [
            'title' => $this->faker->text(10),
            'short_description' => $this->faker->text(),
            'description' => $this->faker->text(1000),
            'event_id' => $randomEventId
        ];
    }
}
