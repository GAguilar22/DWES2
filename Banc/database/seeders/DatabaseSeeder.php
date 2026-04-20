<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cridem primer el TipusSeeder perquè els comptes en depenen
        $this->call(TipusSeeder::class);

        // --- Administrador (identificat pel seu email) ---
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@admin.cat';
        $user->password = bcrypt('admin1234');
        $user->save();

        // --- Client de proves ---
        $user = new User();
        $user->name = 'Gerard Aguilar';
        $user->email = 'gerard@banc.cat';
        $user->password = bcrypt('gerard1234');
        $user->save();

        // Creem el Client associat a l'usuari de proves
        $client = new Client();
        $client->user_id = $user->id;
        $client->dni = '12345678A';
        $client->data_naixement = '1996-09-09';
        $client->telefon = '610 10 10 10';
        $client->save();
    }
}
