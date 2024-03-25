<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
            {{ __('Bienvenue')}}, {{Auth::user()->login}} 
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto">
                <div class="px-8 py-6 text-gray-900 flex flex-col justify-between gap-4">
                    <a class="max-w-xs text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-large rounded-lg text-lg px-5 py-2.5 focus:outline-none" href="{{route('employees.index')}}">Liste des Employés</a>
                    @if (Auth::User()->isAdmin() == 'admin')
                        <a class="max-w-xs text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-large rounded-lg text-lg px-5 py-2.5 focus:outline-none" href="{{route('users.index')}}">Liste des Utilisateurs</a>
                    @endif
                    <a class="max-w-xs text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-large rounded-lg text-lg px-5 py-2.5 focus:outline-none" href="{{route('users.index')}}">Nouvelle demande de congé</a>
                </div>
        </div>
</x-app-layout>
