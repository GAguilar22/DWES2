<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RegistreBizum;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Mostrar el dashboard del client autenticat.
     */
    public function index()
    {
        $client = Auth::user()->client;
        $client->load('comptes.tipus');

        $totalSaldo = $client->comptes->sum('saldo');

        $saldoPerTipus = [];
        foreach ($client->comptes as $compte) {
            $nom = $compte->tipus->nom;
            if (!isset($saldoPerTipus[$nom])) {
                $saldoPerTipus[$nom] = 0;
            }
            $saldoPerTipus[$nom] += $compte->saldo;
        }

        // IDs dels comptes del client
        $compteIds = [];
        foreach ($client->comptes as $compte) {
            $compteIds[] = $compte->id;
        }

        // Últims bizums paginats (5 per pàgina)
        $moviments = RegistreBizum::whereIn('idCompteOrigen', $compteIds)
            ->orWhereIn('idCompteDesti', $compteIds)
            ->with(['compteOrigen.client.user', 'compteDesti.client.user'])
            ->orderBy('dataBizum', 'desc')
            ->paginate(5);

        return view('client.index', compact('client', 'totalSaldo', 'saldoPerTipus', 'compteIds', 'moviments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
