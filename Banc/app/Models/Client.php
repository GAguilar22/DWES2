<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'dni',
        'data_naixement',
        'telefon',
    ];

    /**
     * Obtenir l'usuari associat a aquest client (Relació 1:1).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtenir els comptes bancaris associats a aquest client (Relació 1:N).
     */
    public function comptes()
    {
        return $this->hasMany(Compte::class);
    }
}
