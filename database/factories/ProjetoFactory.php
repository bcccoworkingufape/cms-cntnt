<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();
        return [
            'titulo'=> $this->faker->words($nb=5,$asText=true),
            'tipo'=> $this->faker->words($nb=1,$asText=true),
            'area'=> $this->faker->words($nb=1,$asText=true),
            'descricao'=> $this->faker->words($nb = 3, $variableNbSentences = true),
            'link'=> $this->faker->words($nb=5,$asText=true),
            'img'=> $this->faker->imageUrl($width = 640, $height = 480),
            'userID'=> $this->faker->randomElement($users)
        ];
    }
}
