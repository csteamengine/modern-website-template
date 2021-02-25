<?php

namespace Database\Factories;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('-5 years', 'now')->getTimestamp());
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addWeek();

        return [
            'title' => $this->faker->title,
            'url' => $this->faker->url,
            'description' => $this->faker->title,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'image_id' => 1,
            'order' => 1,
        ];
    }
}
