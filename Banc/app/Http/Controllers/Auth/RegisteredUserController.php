<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password'       => ['required', 'confirmed', Rules\Password::defaults()],
            'dni'            => ['required', 'string', 'max:20', 'unique:clients'],
            'data_naixement' => ['required', 'date', 'before:today'],
            'telefon'        => ['required', 'string', 'max:20', 'unique:clients'],
        ]);

        // Creem l'usuari
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Creem el client associat a l'usuari (relació 1:1)
        $user->client()->create([
            'dni'            => $request->dni,
            'data_naixement' => $request->data_naixement,
            'telefon'        => $request->telefon,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('client.index', absolute: false));
    }
}
