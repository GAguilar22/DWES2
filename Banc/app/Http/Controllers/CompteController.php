<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\RegistreBizum;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * Mostrar el detall d'un compte bancari.
     */
    public function show(Compte $compte)
    {
        // Carreguem les relacions necessàries
        $compte->load('tipus', 'bizumsEnviats.compteDesti.client.user', 'bizumsRebuts.compteOrigen.client.user');

        // Ajuntem els bizums enviats i rebuts en una sola llista i els ordenem per data
        $moviments = $compte->bizumsEnviats->concat($compte->bizumsRebuts)->sortByDesc('dataBizum');

        return view('client.show', compact('compte', 'moviments'));
    }

    /**
     * Actualitzar l'àlies d'un compte bancari.
     */
    public function update(Request $request, Compte $compte)
    {
        $request->validate([
            'alias' => 'nullable|string|max:50',
        ]);

        $compte->alias = $request->alias;
        $compte->save();

        return redirect()->route('compte.show', $compte)
            ->with('success', 'Àlies actualitzat correctament!');
    }

    /**
     * Esborrar un compte bancari.
     */
    public function destroy(string $id)
    {
        $compte = Compte::findOrFail($id);

        // No es pot esborrar si el compte té saldo > 0
        if ($compte->saldo > 0) {
            return redirect()->route('admin.index')
                ->with('error', "No es pot esborrar el compte perquè té saldo pendent.");
        }

        // Esborrem els bizums associats
        RegistreBizum::where('idCompteOrigen', $compte->id)
            ->orWhere('idCompteDesti', $compte->id)
            ->delete();

        $compte->delete();

        return redirect()->route('admin.index')->with('success', 'Compte esborrat correctament.');
    }
}
