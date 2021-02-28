<?php

namespace Database\Factories;

use App\Domains\Auth\Models\User;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('-5 years', 'now')->getTimestamp());
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addWeek();

        $tags = [
            'baseball, football, soccer, tennis, basketball, swimming, sports, Photography, winter',
            'MacOS, Windows, Operating Systems, Computer, PC, Mac, Tech',
            'Photography, Websites, Software, Technology, PHP, Laravel, Tech',
            'Winter, Summer, Spring, Fall',
            'Photography, tech, Images',
            'websites, baseball, football, summer, photography, technology',
        ];

        return [
            'title' => $this->faker->catchPhrase,
            'author_id' => User::all()->random()->id,
            'tags' => $tags[random_int(0, sizeof($tags) - 1)],
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
