<?php

namespace App\Http\Controllers;

use App\Models\Tipus;
use Illuminate\Http\Request;

class TipusController extends Controller
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Mostrar el formulari d'edició d'un tipus de compte.
     */
    public function edit(string $id)
    {
        $tipus = Tipus::findOrFail($id);
        return view('admin.editTipus', compact('tipus'));
    }

    /**
     * Guardar els canvis d'un tipus de compte.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom'        => 'required|string|max:100',
            'descripcio' => 'nullable|string|max:255',
        ]);

        $tipus = Tipus::findOrFail($id);
        $tipus->nom        = $request->nom;
        $tipus->descripcio = $request->descripcio;
        $tipus->save();

        return redirect()->route('admin.index')->with('success', 'Tipus actualitzat correctament.');
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
