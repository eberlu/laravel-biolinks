<?php

namespace Database\Factories\User\Profile;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User\Profile\Link;

class LinkFactory extends Factory
{

    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->word,
            "url" => "http://127.0.0.1:8000",
        ];
    }
}
