<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\RegistreBizum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BizumController extends Controller
{
    /**
     * Mostrar el formulari per fer un Bizum.
     */
    public function create()
    {
        $client = Auth::user()->client;
        $client->load('comptes.tipus');

        // Obtenim els IDs dels comptes del client per poder filtrar els bizums
        $compteIds = [];
        foreach ($client->comptes as $compte) {
            $compteIds[] = $compte->id;
        }

        // Recuperem els últims 10 bizums on un compte del client sigui origen o destí
        $ultimsBizums = RegistreBizum::with(['compteOrigen.client.user', 'compteDesti.client.user'])
            ->whereIn('idCompteOrigen', $compteIds)
            ->orWhereIn('idCompteDesti', $compteIds)
            ->orderBy('dataBizum', 'desc')
            ->take(10)
            ->get();

        return view('bizum.create', compact('client', 'compteIds', 'ultimsBizums'));
    }

    /**
     * Processar el Bizum.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idCompteOrigen' => 'required|exists:comptes,id',
            'telefon_desti'  => 'required|string',
            'quantitat'      => 'required|numeric|min:0.01',
        ]);

        // Obtenim el compte origen
        $compteOrigen = Compte::findOrFail($request->idCompteOrigen);

        // Comprovem que hi ha saldo suficient
        if ($compteOrigen->saldo < $request->quantitat) {
            return back()->withErrors(['quantitat' => 'No tens saldo suficient per fer aquest Bizum.']);
        }

        // Busquem el client destinatari pel seu telèfon
        $clientDesti = \App\Models\Client::where('telefon', $request->telefon_desti)->first();

        if (!$clientDesti) {
            return back()->withErrors(['telefon_desti' => 'No s\'ha trobat cap client amb aquest telèfon.']);
        }

        // No es pot fer un Bizum a un mateix client
        if ($clientDesti->id === Auth::user()->client->id) {
            return back()->withErrors(['telefon_desti' => 'No pots fer un Bizum a tu mateix.']);
        }

        // Busquem el compte CORRENT del client destinatari
        $compteDesti = $clientDesti->comptes()->whereHas('tipus', function ($query) {
            $query->where('nom', 'Corrent');
        })->first();

        if (!$compteDesti) {
            return back()->withErrors(['telefon_desti' => 'El destinatari no té cap compte corrent per rebre el Bizum.']);
        }

        // Creem el registre del Bizum
        RegistreBizum::create([
            'idCompteOrigen' => $compteOrigen->id,
            'idCompteDesti'  => $compteDesti->id,
            'dataBizum'      => now(),
            'quantitat'      => $request->quantitat,
        ]);

        // Actualitzem els saldos
        $compteOrigen->saldo = $compteOrigen->saldo - $request->quantitat;
        $compteOrigen->save();

        $compteDesti->saldo = $compteDesti->saldo + $request->quantitat;
        $compteDesti->save();

        return redirect()->route('client.index')->with('success', 'Bizum enviat correctament!');
    }
}
