<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class NoticiaFactory extends Factory
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
            'link'=> $this->faker->words($nb=5,$asText=true),
            'img'=> $this->faker->words($nb=5,$asText=true),
            'descricao'=> $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'userID'=> $this->faker->randomElement($users)
        ];
    }
}
