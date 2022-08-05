<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school' => $this->faker->sentence,
            'program' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'user_id' => User::all()->random()
           

        ];
    }

}
