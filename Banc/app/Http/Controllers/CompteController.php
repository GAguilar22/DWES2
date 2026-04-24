<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Seguretat: verificar que el compte pertany al client autenticat
        if ($compte->client_id !== Auth::user()->client->id) {
            abort(403);
        }

        // Carreguem les relacions necessàries
        $compte->load('tipus', 'bizumsEnviats.compteDesti.client.user', 'bizumsRebuts.compteOrigen.client.user');

        // Ajuntem els bizums enviats i rebuts en una sola llista i els ordenem per data
        $moviments = $compte->bizumsEnviats->concat($compte->bizumsRebuts)->sortByDesc('dataBizum');

        return view('client.show', compact('compte', 'moviments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compte $compte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compte $compte)
    {
        //
    }
}
