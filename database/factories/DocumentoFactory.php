<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Documento;
use App\Models\User;

class DocumentoFactory extends Factory
{
    protected $model = Documento::class;
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
            'link'=> $this->faker->url(),
            'categoria'=> $this->faker->numberBetween($int1 = 0, $int2 = 2),
            'userID'=> $this->faker->randomElement($users)
        ];
    }
    public function configure(){
        return $this->afterMaking(function (Documento $documento){

        })->afterCreating(function (Documento $documento){


        });
    }
}
