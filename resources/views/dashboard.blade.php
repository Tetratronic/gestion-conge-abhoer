<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenue')}} {{Auth::user()->login}} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-nav-link :href="route('employees.index')">Liste des Employés</x-nav-link>
                    <x-nav-link :href="route('users.index')">Liste des Utilisateurs</x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
