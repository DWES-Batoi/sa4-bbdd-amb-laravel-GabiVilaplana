<?php

namespace Database\Seeders;

use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;
use Illuminate\Database\Seeder;

class PartitsSeeder extends Seeder
{
    public function run()
    {
        // Asegúrate de que hay equipos y estadios creados
        $equips = Equip::all();
        $estadis = Estadi::all();

        if ($equips->count() < 2 || $estadis->isEmpty()) {
            $this->command->info('No hay equipos o estadios suficientes. Ejecuta primero los seeders de Equip y Estadi.');
            return;
        }

        for ($i = 0; $i < 5; $i++) {
            Partit::create([
                'local_id' => $equips->random()->id,
                'visitant_id' => $equips->where('id', '!=', $equips->random()->id)->random()->id,
                'estadi_id' => $estadis->random()->id,
                'data' => now()->subDays($i * 7),
                'jornada' => $i + 1,
                'gols_local' => rand(0, 4),
                'gols_visitant' => rand(0, 4),
            ]);
        }
    }
}