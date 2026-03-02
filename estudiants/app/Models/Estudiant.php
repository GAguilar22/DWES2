<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiant extends Model
{
    /**
     * Els atributs que es poden assignar massivament.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'email',
        'adresa',
    ];

    /**
     * Regles de validació per als atributs del model.
     *
     * @return array<string, string|array>
     */
    public static function validationRules(): array
    {
        return [
            'nom' => 'required|string',
            'email' => 'required|email|unique:estudiants,email',
            'adresa' => 'required|string',
        ];
    }

    /**
     * Missatges de validació personalitzats (en català).
     *
     * @return array<string, string>
     */
    public static function validationMessages(): array
    {
        return [
            'nom.required' => 'El nom és obligatori.',
            'email.required' => 'El correu electrònic és obligatori.',
            'email.email' => 'El format del correu electrònic no és vàlid.',
            'email.unique' => 'Aquest correu electrònic ja existeix.',
            'adresa.required' => "L'adreça és obligatòria.",
        ];
    }
}
