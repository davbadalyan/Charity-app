<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'promo_code' => '#' . Str::random(1) . $this->faker->numberBetween($min = 10000, $max = 99999) . Str::random(1),
            'start_date' => now(),
            'raised_amount' => $this->faker->numberBetween($min = 0, $max = 1000),
            'goal_amount' => $this->faker->numberBetween($min = 0, $max = 5000),
            'show_foundation_status' => $this->faker->boolean(),
            'show_button' => $this->faker->boolean(),

            // 'en' => [
            'title' => $this->faker->text(10),
            'short_description' => $this->faker->text()
            // ],

            // 'ru' => [
            //     'title' => $this->faker->text(10),
            //     'short_description' => $this->faker->text()
            // ],

            // 'hy' => [
            //     'title' => $this->faker->text(10),
            //     'short_description' => $this->faker->text()
            // ]
        ];
    }
}
