<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipus extends Model
{
    protected $table = 'tipus';

    protected $fillable = [
        'nom',
        'descripcio',
        'imatge',
    ];

    /**
     * Obtenir els comptes associats a aquest tipus (Relació 1:N).
     */
    public function comptes()
    {
        return $this->hasMany(Compte::class);
    }
}
