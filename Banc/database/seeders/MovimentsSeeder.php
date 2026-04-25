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
        $eduardPrincipal = Compte::where('iban', 'ES76000190200418005600012')->first();
        $davidC      = Compte::where('iban', 'ES5321000418450200012345')->first();
        $guillemC    = Compte::where('iban', 'ES7200190200418005678901')->first();
        $jesusC      = Compte::where('iban', 'ES4904932006099011567891')->first();
        $carlesC     = Compte::where('iban', 'ES2020800300500001234567')->first();
        $youssefC    = Compte::where('iban', 'ES8821000418450200098765')->first();
        $alanC       = Compte::where('iban', 'ES3600190200418005111222')->first();
        $alexanderC  = Compte::where('iban', 'ES6604932006099011333444')->first();
        $antoniC     = Compte::where('iban', 'ES1521000418450200055555')->first();

        $moviments = [
            ['idCompteOrigen' => $eduardPrincipal->id, 'idCompteDesti' => $gerardNomina->id,   'dataBizum' => '2026-03-28', 'quantitat' => 30.00],
            ['idCompteOrigen' => $gerardNomina->id,    'idCompteDesti' => $eduardPrincipal->id, 'dataBizum' => '2026-04-01', 'quantitat' => 75.00],
            ['idCompteOrigen' => $eduardPrincipal->id, 'idCompteDesti' => $gerardNomina->id,   'dataBizum' => '2026-04-03', 'quantitat' => 200.00],
            ['idCompteOrigen' => $gerardNomina->id,    'idCompteDesti' => $eduardPrincipal->id, 'dataBizum' => '2026-04-06', 'quantitat' => 45.00],
            ['idCompteOrigen' => $eduardPrincipal->id, 'idCompteDesti' => $gerardNomina->id,   'dataBizum' => '2026-04-08', 'quantitat' => 120.50],
            ['idCompteOrigen' => $gerardNomina->id,    'idCompteDesti' => $eduardPrincipal->id, 'dataBizum' => '2026-04-10', 'quantitat' => 18.00],
            ['idCompteOrigen' => $eduardPrincipal->id, 'idCompteDesti' => $gerardNomina->id,   'dataBizum' => '2026-04-13', 'quantitat' => 50.00],
            ['idCompteOrigen' => $gerardNomina->id,    'idCompteDesti' => $eduardPrincipal->id, 'dataBizum' => '2026-04-15', 'quantitat' => 250.00],
            ['idCompteOrigen' => $eduardPrincipal->id, 'idCompteDesti' => $gerardNomina->id,   'dataBizum' => '2026-04-18', 'quantitat' => 60.00],
            ['idCompteOrigen' => $gerardNomina->id,    'idCompteDesti' => $eduardPrincipal->id, 'dataBizum' => '2026-04-20', 'quantitat' => 35.50],
            ['idCompteOrigen' => $eduardPrincipal->id, 'idCompteDesti' => $gerardNomina->id,   'dataBizum' => '2026-04-22', 'quantitat' => 15.75],
            ['idCompteOrigen' => $gerardNomina->id,    'idCompteDesti' => $eduardPrincipal->id, 'dataBizum' => '2026-04-23', 'quantitat' => 9.99],

            ['idCompteOrigen' => $davidC->id,     'idCompteDesti' => $guillemC->id,    'dataBizum' => '2026-03-02', 'quantitat' => 25.00],
            ['idCompteOrigen' => $guillemC->id,    'idCompteDesti' => $jesusC->id,      'dataBizum' => '2026-03-04', 'quantitat' => 40.00],
            ['idCompteOrigen' => $jesusC->id,      'idCompteDesti' => $davidC->id,      'dataBizum' => '2026-03-06', 'quantitat' => 15.00],
            ['idCompteOrigen' => $carlesC->id,     'idCompteDesti' => $youssefC->id,    'dataBizum' => '2026-03-08', 'quantitat' => 100.00],
            ['idCompteOrigen' => $youssefC->id,    'idCompteDesti' => $alanC->id,       'dataBizum' => '2026-03-10', 'quantitat' => 60.00],
            ['idCompteOrigen' => $alanC->id,       'idCompteDesti' => $carlesC->id,     'dataBizum' => '2026-03-12', 'quantitat' => 35.00],
            ['idCompteOrigen' => $alexanderC->id,  'idCompteDesti' => $antoniC->id,     'dataBizum' => '2026-03-14', 'quantitat' => 80.00],
            ['idCompteOrigen' => $antoniC->id,     'idCompteDesti' => $alexanderC->id,  'dataBizum' => '2026-03-16', 'quantitat' => 20.00],
            ['idCompteOrigen' => $davidC->id,      'idCompteDesti' => $carlesC->id,     'dataBizum' => '2026-03-18', 'quantitat' => 50.00],
            ['idCompteOrigen' => $guillemC->id,    'idCompteDesti' => $alanC->id,       'dataBizum' => '2026-03-20', 'quantitat' => 75.00],
            ['idCompteOrigen' => $jesusC->id,      'idCompteDesti' => $alexanderC->id,  'dataBizum' => '2026-03-22', 'quantitat' => 30.00],
            ['idCompteOrigen' => $youssefC->id,    'idCompteDesti' => $antoniC->id,     'dataBizum' => '2026-03-24', 'quantitat' => 45.00],
            ['idCompteOrigen' => $carlesC->id,     'idCompteDesti' => $davidC->id,      'dataBizum' => '2026-03-26', 'quantitat' => 90.00],
            ['idCompteOrigen' => $alanC->id,       'idCompteDesti' => $guillemC->id,    'dataBizum' => '2026-03-28', 'quantitat' => 55.00],
            ['idCompteOrigen' => $alexanderC->id,  'idCompteDesti' => $jesusC->id,      'dataBizum' => '2026-03-30', 'quantitat' => 70.00],
            ['idCompteOrigen' => $antoniC->id,     'idCompteDesti' => $youssefC->id,    'dataBizum' => '2026-04-01', 'quantitat' => 25.00],
            ['idCompteOrigen' => $davidC->id,      'idCompteDesti' => $alexanderC->id,  'dataBizum' => '2026-04-02', 'quantitat' => 110.00],
            ['idCompteOrigen' => $guillemC->id,    'idCompteDesti' => $antoniC->id,     'dataBizum' => '2026-04-04', 'quantitat' => 65.00],
            ['idCompteOrigen' => $carlesC->id,     'idCompteDesti' => $jesusC->id,      'dataBizum' => '2026-04-05', 'quantitat' => 40.00],
            ['idCompteOrigen' => $alanC->id,       'idCompteDesti' => $youssefC->id,    'dataBizum' => '2026-04-07', 'quantitat' => 85.00],
        ];

        foreach ($moviments as $moviment) {
            RegistreBizum::create($moviment);
        }
    }
}
