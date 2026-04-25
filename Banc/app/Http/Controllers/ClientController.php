<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\RegistreBizum;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Mostrar el dashboard del client autenticat.
     */
    public function index()
    {
        if (Auth::user()->email === 'admin@admin.cat') {
            return redirect()->route('admin.index');
        }

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

        $compteIds = [];
        foreach ($client->comptes as $compte) {
            $compteIds[] = $compte->id;
        }

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
     * Esborrar un client i totes les seves dades.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->load('comptes');

        foreach ($client->comptes as $compte) {
            if ($compte->saldo > 0) {
                return redirect()->route('admin.index')
                    ->with('error', "No es pot esborrar el client {$client->user->name} perquè té comptes amb saldo.");
            }
        }

        $compteIds = $client->comptes->pluck('id')->toArray();

        RegistreBizum::whereIn('idCompteOrigen', $compteIds)
            ->orWhereIn('idCompteDesti', $compteIds)
            ->delete();

        $client->comptes()->delete();

        $user = $client->user;

        $client->delete();
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'Client esborrat correctament.');
    }
}
