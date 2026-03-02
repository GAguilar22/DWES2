<?php

namespace App\Http\Controllers;

use App\Models\Estudiant;
use Illuminate\Http\Request;

class EstudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiants = Estudiant::all();
        return view('estudiants.index', compact('estudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            Estudiant::validationRules(),
            Estudiant::validationMessages()
        );

        Estudiant::create($request->all());

        return redirect()->route('estudiants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estudiant = Estudiant::findOrFail($id);
        return view('estudiants.show', compact('estudiant'));
    }

    /**
     * Show the form for editing the existing resource.
     */
    public function edit(string $id)
    {
        $estudiant = Estudiant::findOrFail($id);
        return view('estudiants.edit', compact('estudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estudiant = Estudiant::findOrFail($id);

        $request->validate(
            [
                'nom' => 'required|string',
                'email' => 'required|email|unique:estudiants,email,' . $id,
                'adresa' => 'required|string',
            ],
            Estudiant::validationMessages()
        );

        $estudiant->update($request->all());

        return redirect()->route('estudiants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiant = Estudiant::findOrFail($id);
        $estudiant->delete();

        return redirect()->route('estudiants.index');
    }
}
