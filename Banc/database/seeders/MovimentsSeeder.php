<?php

namespace Database\Seeders;

use App\Models\Compte;
use App\Models\RegistreBizum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovimentsSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $gerardNomina    = Compte::where('iban', 'ES91210004184502000513320')->first();
        $gerardEstalvis  = Compte::where('iban', 'ES80231000011800000123450')->first();
        $eduardPrincipal = Compte::where('iban', 'ES76000190200418005600012')->first();

        $moviments = [
            [
                'idCompteOrigen' => $eduardPrincipal->id,
                'idCompteDesti'  => $gerardNomina->id,
                'dataBizum'      => '2026-03-28',
                'quantitat'      => 30.00,
            ],
            [
                'idCompteOrigen' => $gerardNomina->id,
                'idCompteDesti'  => $eduardPrincipal->id,
                'dataBizum'      => '2026-04-01',
                'quantitat'      => 75.00,
            ],
            [
                'idCompteOrigen' => $eduardPrincipal->id,
                'idCompteDesti'  => $gerardEstalvis->id,
                'dataBizum'      => '2026-04-03',
                'quantitat'      => 200.00,
            ],
            [
                'idCompteOrigen' => $gerardNomina->id,
                'idCompteDesti'  => $eduardPrincipal->id,
                'dataBizum'      => '2026-04-06',
                'quantitat'      => 45.00,
            ],
            [
                'idCompteOrigen' => $eduardPrincipal->id,
                'idCompteDesti'  => $gerardNomina->id,
                'dataBizum'      => '2026-04-08',
                'quantitat'      => 120.50,
            ],
            [
                'idCompteOrigen' => $gerardNomina->id,
                'idCompteDesti'  => $eduardPrincipal->id,
                'dataBizum'      => '2026-04-10',
                'quantitat'      => 18.00,
            ],
            [
                'idCompteOrigen' => $eduardPrincipal->id,
                'idCompteDesti'  => $gerardEstalvis->id,
                'dataBizum'      => '2026-04-13',
                'quantitat'      => 50.00,
            ],
            [
                'idCompteOrigen' => $gerardNomina->id,
                'idCompteDesti'  => $eduardPrincipal->id,
                'dataBizum'      => '2026-04-15',
                'quantitat'      => 250.00,
            ],
            [
                'idCompteOrigen' => $eduardPrincipal->id,
                'idCompteDesti'  => $gerardNomina->id,
                'dataBizum'      => '2026-04-18',
                'quantitat'      => 60.00,
            ],
            [
                'idCompteOrigen' => $gerardNomina->id,
                'idCompteDesti'  => $eduardPrincipal->id,
                'dataBizum'      => '2026-04-20',
                'quantitat'      => 35.50,
            ],
            [
                'idCompteOrigen' => $eduardPrincipal->id,
                'idCompteDesti'  => $gerardEstalvis->id,
                'dataBizum'      => '2026-04-22',
                'quantitat'      => 15.75,
            ],
            [
                'idCompteOrigen' => $gerardNomina->id,
                'idCompteDesti'  => $eduardPrincipal->id,
                'dataBizum'      => '2026-04-23',
                'quantitat'      => 9.99,
            ],
        ];

        foreach ($moviments as $moviment) {
            RegistreBizum::create($moviment);
        }
    }
}
