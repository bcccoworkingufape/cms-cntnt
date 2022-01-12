<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;


class TeacherFactory extends Factory
{
    protected $model = Teacher::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'area'=> $this->faker->jobTitle(),
            'lattes'=> $this->faker->url(),
            'img'=> $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
