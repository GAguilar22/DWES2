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
            'tipus_id' => 1,
            'iban'     => 'ES91210004184502000513320',
            'alias'    => 'Compte Nòmina',
            'saldo'    => 2500.00,
        ]);

        $client->comptes()->create([
            'tipus_id' => 2,
            'iban'     => 'ES80231000011800000123450',
            'alias'    => 'Estalvis',
            'saldo'    => 18750.50,
        ]);

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
            'tipus_id' => 1,
            'iban'     => 'ES76000190200418005600012',
            'alias'    => 'Compte Principal',
            'saldo'    => 1200.75,
        ]);

        $client->comptes()->create([
            'tipus_id' => 3,
            'iban'     => 'ES12049320060990115678900',
            'alias'    => 'Inversions Futures',
            'saldo'    => 15000.00,
        ]);

        $user = new User();
        $user->name = 'David Lucia';
        $user->email = 'david@banc.cat';
        $user->password = bcrypt('david1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '11223344C',
            'data_naixement' => '1990-06-12',
            'telefon'        => '633100200',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES5321000418450200012345',
            'alias'    => 'Compte David',
            'saldo'    => 1250.00,
        ]);

        $user = new User();
        $user->name = 'Guillem Pereira';
        $user->email = 'guillem@banc.cat';
        $user->password = bcrypt('guillem1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '22334455D',
            'data_naixement' => '1993-11-25',
            'telefon'        => '644200300',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES7200190200418005678901',
            'alias'    => 'Compte Guillem',
            'saldo'    => 8300.00,
        ]);

        $user = new User();
        $user->name = 'Jesus Silva';
        $user->email = 'jesus@banc.cat';
        $user->password = bcrypt('jesus1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '33445566E',
            'data_naixement' => '1988-02-08',
            'telefon'        => '655300400',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES4904932006099011567891',
            'alias'    => 'Compte Jesus',
            'saldo'    => 450.00,
        ]);

        $user = new User();
        $user->name = 'Carles Lara';
        $user->email = 'carles@banc.cat';
        $user->password = bcrypt('carles1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '44556677F',
            'data_naixement' => '1985-07-30',
            'telefon'        => '666400500',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES2020800300500001234567',
            'alias'    => 'Compte Carles',
            'saldo'    => 11500.00,
        ]);

        $user = new User();
        $user->name = 'Youssef Ghaddari';
        $user->email = 'youssef@banc.cat';
        $user->password = bcrypt('youssef1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '55667788G',
            'data_naixement' => '1997-04-15',
            'telefon'        => '677500600',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES8821000418450200098765',
            'alias'    => 'Compte Youssef',
            'saldo'    => 5800.00,
        ]);

        $user = new User();
        $user->name = 'Alan Garcia';
        $user->email = 'alan@banc.cat';
        $user->password = bcrypt('alan1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '66778899H',
            'data_naixement' => '1991-09-03',
            'telefon'        => '688600700',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES3600190200418005111222',
            'alias'    => 'Compte Alan',
            'saldo'    => 3200.00,
        ]);

        $user = new User();
        $user->name = 'Alexander Garcia';
        $user->email = 'alexander@banc.cat';
        $user->password = bcrypt('alexander1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '77889900I',
            'data_naixement' => '1992-12-20',
            'telefon'        => '699700800',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES6604932006099011333444',
            'alias'    => 'Compte Alexander',
            'saldo'    => 9750.00,
        ]);

        $user = new User();
        $user->name = 'Antoni Gaitan';
        $user->email = 'antoni@banc.cat';
        $user->password = bcrypt('antoni1234');
        $user->save();

        $client = $user->client()->create([
            'dni'            => '88990011J',
            'data_naixement' => '1999-01-10',
            'telefon'        => '611800900',
        ]);

        $client->comptes()->create([
            'tipus_id' => 1,
            'iban'     => 'ES1521000418450200055555',
            'alias'    => 'Compte Antoni',
            'saldo'    => 100.00,
        ]);
    }
}
