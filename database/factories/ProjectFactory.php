<?php

namespace Database\Factories;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

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
            'title' => $this->faker->catchPhrase,
            'short_description' => $this->faker->text(100),
            'description' => $this->faker->text,
            'page_content' => $this->faker->randomHtml(),
            'external_url' => $this->faker->url,
            'is_active' => true,
            'order' => $this->faker->randomNumber(),
            'started_at' => $startDate,
            'finished_at' => $endDate,
        ];
    }
}
