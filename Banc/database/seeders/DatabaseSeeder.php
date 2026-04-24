<?php

namespace Database\Seeders;

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

        // --- Clients de proves (Gerard i Eduard) ---
        $this->call(ClientsSeeder::class);

        // --- Moviments de proves (Bizums entre clients) ---
        $this->call(MovimentsSeeder::class);
    }
}
