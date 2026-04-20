<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistreBizum extends Model
{
    protected $table = 'registre_bizums';

    protected $fillable = [
        'idCompteOrigen',
        'idCompteDesti',
        'dataBizum',
        'quantitat',
    ];

    /**
     * Obtenir el compte origen del bizum (Relació N:1).
     */
    public function compteOrigen()
    {
        return $this->belongsTo(Compte::class, 'idCompteOrigen');
    }

    /**
     * Obtenir el compte destí del bizum (Relació N:1).
     */
    public function compteDesti()
    {
        return $this->belongsTo(Compte::class, 'idCompteDesti');
    }
}
