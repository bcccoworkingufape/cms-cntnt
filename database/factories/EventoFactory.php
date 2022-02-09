<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evento;
use App\Models\User;



class EventoFactory extends Factory
{
    protected $model = Evento::class;
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
            'data'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'descricao'=> $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'userID'=> $this->faker->randomElement($users)
        ];
    }
    public function configure(){
        return $this->afterMaking(function (Evento $evento){
           
        })->afterCreating(function (Evento $evento){
           
            
        });
    }
}
