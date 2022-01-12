<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;


class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<25; $i++){
            Teacher::factory()->create();
        }
    }
}
