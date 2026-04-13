<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable = [
        'client_id',
        'tipus_id',
        'iban',
        'alias',
        'saldo',
    ];

    /**
     * Obtenir el client associat a aquest compte bancari (Relació N:1).
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Obtenir el tipus assignat a aquest compte (Relació N:1).
     */
    public function tipus()
    {
        return $this->belongsTo(Tipus::class);
    }
}
