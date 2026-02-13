<?php

namespace Database\Seeders;

use App\Models\Jugadora;
use Illuminate\Database\Seeder;

class JugadorasSeeder extends Seeder
{
    public function run()
    {
        Jugadora::factory()->count(10)->create();
    }
}