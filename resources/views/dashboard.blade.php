<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
            {{ __('Bienvenue')}}, {{Auth::user()->login}} 
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-10 text-gray-900 flex justify-between">
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 focus:outline-none" href="{{route('employees.index')}}">Liste des Employés</a>
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 focus:outline-none" href="{{route('users.index')}}">Liste des Utilisateurs</a>
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 focus:outline-none" href="{{route('users.index')}}">Nouvelle demande de congé</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
