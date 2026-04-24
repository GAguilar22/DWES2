<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed clients de proves amb els seus comptes bancaris.
     */
    public function run(): void
    {
        // --- Client 1: Gerard Aguilar ---
        $user = new User();
        $user->name = 'Gerard Aguilar';
        $user->email = 'gerard@banc.cat';
        $user->password = bcrypt('gerard1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '12345678A',
            'data_naixement' => '1996-09-09',
            'telefon'        => '610101010',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1, // Corrent
            'iban'     => 'ES91210004184502000513320',
            'alias'    => 'Compte Nòmina',
            'saldo'    => 2500.00,
        ]);

        $client->comptes()->create([
            'tipus_id' => 2, // Estalvis
            'iban'     => 'ES80231000011800000123450',
            'alias'    => 'Estalvis',
            'saldo'    => 18750.50,
        ]);

        // --- Client 2: Eduard ---
        $user = new User();
        $user->name = 'Eduard Cañamas';
        $user->email = 'eduard@banc.cat';
        $user->password = bcrypt('eduard1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '87654321B',
            'data_naixement' => '1994-03-15',
            'telefon'        => '622334455',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1, // Corrent
            'iban'     => 'ES76000190200418005600012',
            'alias'    => 'Compte Principal',
            'saldo'    => 1200.75,
        ]);

        $client->comptes()->create([
            'tipus_id' => 3, // Inversions
            'iban'     => 'ES12049320060990115678900',
            'alias'    => 'Inversions Futures',
            'saldo'    => 15000.00,
        ]);
    }
}
