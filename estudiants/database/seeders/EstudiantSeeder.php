<?php

namespace Database\Seeders;

use App\Models\Estudiant;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EstudiantSeeder extends Seeder
{
    /**
     * Genera 10 estudiants aleatoris en català i els insereix a la BD.
     */
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        for ($i = 0; $i < 10; $i++) {
            Estudiant::create([
                'nom' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'adresa' => $faker->address(),
            ]);
        }
    }
}
