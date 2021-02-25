<?php

namespace Database\Factories;

use App\Models\LinkVisit;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkVisitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LinkVisit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link_id' => 1,
            'created_at' => $this->faker->dateTimeBetween('2021-01-01'),
        ];
    }
}
