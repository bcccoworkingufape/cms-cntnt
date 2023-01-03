<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'area' => "adminArea",
            'lattes'=> "adminLattes",
            'acesso' => 0,
            'img'=> '',//set file later
            'password' => Hash::make('admin'), // admin
            'remember_token' => Str::random(10),
        ]);
        for($i=0; $i<25; $i++){
            User::factory()->create();
        }
    }
}
