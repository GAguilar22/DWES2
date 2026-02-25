<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


    /**
     * Els atributs que es poden assignar massivament.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
    ];

    /**
     * Regles de validació per als atributs del model.
     *
     * @return array<string, string|array>
     */
    public static function validationRules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|min:5',
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
            'name.required' => 'El nom és obligatori.',
            'email.required' => 'El correu electrònic és obligatori.',
            'email.email' => 'El format del correu electrònic no és vàlid.',
            'email.unique' => 'Aquest correu electrònic ja existeix.',
            'address.required' => "L'adreça és obligatòria.",
        ];
    }
}
