<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'skill' => $this->faker->sentence,
            'level' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'user_id' => User::all()->random()
 
        ];
    }

}
