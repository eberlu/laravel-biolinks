<?php

namespace Database\Factories\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User\Profile;
use Str;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            'nickname' => $name,
            'description' => $this->faker->sentence(),
            'url' => Str::slug($name)
        ];
    }
}
