<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('El meu Banc') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Dades del client --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Dades del client</h3>
                    <p><strong>Nom:</strong> {{ $client->user->name }}</p>
                    <p><strong>Email:</strong> {{ $client->user->email }}</p>
                    <p><strong>DNI:</strong> {{ $client->dni }}</p>
                    <p><strong>Data de naixement:</strong> {{ $client->data_naixement }}</p>
                    <p><strong>Telèfon:</strong> {{ $client->telefon }}</p>
                </div>
            </div>

            {{-- Comptes bancaris --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Els meus comptes</h3>
                    @forelse ($client->comptes as $compte)
                        <div class="border rounded p-4 mb-3">
                            <p><strong>IBAN:</strong> {{ $compte->iban }}</p>
                            <p><strong>Àlies:</strong> {{ $compte->alias ?? '-' }}</p>
                            <p><strong>Tipus:</strong> {{ $compte->tipus->nom }}</p>
                            <p><strong>Saldo:</strong> {{ number_format($compte->saldo, 2) }} €</p>
                        </div>
                    @empty
                        <p>No tens cap compte bancari.</p>
                    @endforelse
                </div>
            </div>

            {{-- Últims moviments --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Últims moviments</h3>
                    <p class="text-gray-500">Pròximament...</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
