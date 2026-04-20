<?php

namespace Database\Seeders;

use App\Models\Tipus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipusSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the tipus table with the 3 account types.
     */
    public function run(): void
    {
        $tipus = [
            [
                'nom' => 'Corrent',
                'descripcio' => 'Compte corrent.',
            ],
            [
                'nom' => 'Estalvis',
                'descripcio' => 'Compte d\'estalvis.',
            ],
            [
                'nom' => 'Inversions',
                'descripcio' => 'Compte per a inversions.',
            ],
        ];

        foreach ($tipus as $t) {
            Tipus::create($t);
        }
    }
}
