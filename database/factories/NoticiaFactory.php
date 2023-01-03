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
            'img'=> "https://s2.glbimg.com/mSk_kVJ7XSOhV-wYo4iDy_0cbZA=/1080x608/top/smart/http://s.glbimg.com/po/tt2/f/original/2017/05/04/computador_desktop_pc_dell.png",
            'descricao'=> $this->faker->words($nb = 3, $variableNbSentences = true),
            'userID'=> $this->faker->randomElement($users)
        ];
    }
}
