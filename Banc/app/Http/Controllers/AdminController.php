<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use App\Models\RegistreBizum;
use App\Models\Tipus;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('user')->get();
        $tipus   = Tipus::all();
        $comptes = Compte::with(['client.user', 'tipus'])->get();
        $bizums  = RegistreBizum::with(['compteOrigen.client.user', 'compteDesti.client.user'])
            ->orderBy('dataBizum', 'desc')
            ->get();

        $activeTab = request('tab', 'clients');

        return view('admin.index', compact('clients', 'tipus', 'comptes', 'bizums', 'activeTab'));
    }

    /**
     * Mostrar el detall d'un client (vista de lectura per l'admin).
     */
    public function showClient(Client $client)
    {
        $client->load('user', 'comptes.tipus');

        $compteIds = $client->comptes->pluck('id')->toArray();

        // Historial de bizums (enviats i rebuts)
        $bizums = RegistreBizum::whereIn('idCompteOrigen', $compteIds)
            ->orWhereIn('idCompteDesti', $compteIds)
            ->with(['compteOrigen.client.user', 'compteDesti.client.user'])
            ->orderBy('dataBizum', 'desc')
            ->get();

        return view('admin.show', compact('client', 'bizums', 'compteIds'));
    }

    /**
     * Mostrar el formulari d'edició d'un client.
     */
    public function editClient(Client $client)
    {
        $client->load('user');
        return view('admin.edit', compact('client'));
    }

    /**
     * Guardar els canvis d'un client.
     */
    public function updateClient(Request $request, Client $client)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'dni'            => 'required|string|max:20',
            'data_naixement' => 'required|date',
            'telefon'        => 'required|string|max:20',
        ]);

        // Actualitzem les dades de l'usuari associat
        $client->user->name  = $request->name;
        $client->user->email = $request->email;
        $client->user->save();

        // Actualitzem les dades del client
        $client->dni            = $request->dni;
        $client->data_naixement = $request->data_naixement;
        $client->telefon        = $request->telefon;
        $client->save();

        return redirect()->route('admin.index')->with('success', 'Client actualitzat correctament!');
    }

    /**
     * Mostrar el detall del compte d'un client
     */
    public function showCompte(string $id)
    {
        $compte = Compte::findOrFail($id);
        $compte->load('client.user', 'tipus');

        // Historial de bizums (enviats i rebuts)
        $bizums = RegistreBizum::where('idCompteOrigen', $compte->id)
            ->orWhere('idCompteDesti', $compte->id)
            ->with(['compteOrigen.client.user', 'compteDesti.client.user'])
            ->orderBy('dataBizum', 'desc')
            ->get();

        return view('admin.showCompte', compact('compte', 'bizums'));
    }

    /**
     * Edit del compte d'un client
     */
    public function editCompte(string $id)
    {
        $compte = Compte::findOrFail($id);
        $compte->load('client.user', 'tipus');
        $tipusList = Tipus::all();

        return view('admin.editCompte', compact('compte', 'tipusList'));
    }

    /**
     * Guardar els canvis d'un compte bancari (inclou saldo).
     */
    public function adminCompteUpdate(Request $request, string $id)
    {
        $request->validate([
            'alias'    => 'nullable|string|max:50',
            'tipus_id' => 'required|exists:tipus,id',
            'saldo'    => 'required|numeric|min:0',
        ]);

        $compte = Compte::findOrFail($id);
        $compte->alias    = $request->alias;
        $compte->tipus_id = $request->tipus_id;
        $compte->saldo    = $request->saldo;
        $compte->save();

        return redirect()->route('admin.index')->with('success', 'Compte actualitzat correctament.');
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
     * Esborrar un tipus de compte.
     */
    public function destroy(string $id)
    {
        $tipus = Tipus::findOrFail($id);

        // No es pot esborrar si hi ha comptes que utilitzen aquest tipus
        if ($tipus->comptes()->count() > 0) {
            return redirect()->route('admin.index')
                ->with('error', "No es pot esborrar el tipus '{$tipus->nom}' perquè hi ha comptes que l'utilitzen.");
        }

        $tipus->delete();

        return redirect()->route('admin.index')->with('success', 'Tipus esborrat correctament.');
    }
}
