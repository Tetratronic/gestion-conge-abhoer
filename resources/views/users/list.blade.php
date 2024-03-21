<x-app-layout>
    
    {{-- Displaying the list of Employees  --}}

        <div class="py-10">
            <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row justify-between">
                    {{-- <x-secondary-button class=" bg-black text-white max-h-10 max-w-40">Ajouter un employé</x-secondary-button> --}}
                    <a href="{{ route("users.create") }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mb-auto rounded cursor-pointer">
                        Nouveau Employé
                    </a>
                    <form action="{{ route('users.index')}}" method="GET" class="flex flex-row">
                        <input name='search' class="mb-5 p-1 border border-gray-400 rounded-md float" placeholder="Rechercher...">
                        <x-primary-button type="submit" class="mb-5 p-1 ml-5">Chercher</x-primary-button>
                    </form>
                    
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-max">
                        <table class="min-w-full divide-y divide-gray-200"> 
                            <thead class="bg-gray-50"> 
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poste</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Département</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CIN</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jours A. Courante</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jours A. Precedante</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Recrutement</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Options</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($users->isEmpty())
                                <tr>
                                    <td colspan="10" class="bg-white-100 text-gray-600 text-center py-4 px-6 font-medium rounded">Aucun utilisateur trouvé.</td> 
                                </tr>
                                @else
                                @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$user->login}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex flex-row gap-3">
                                        <form action="{{ route('users.edit', ['user' => $user->id] )}}" method="GET">
                                            @csrf
                                            <x-primary-button type="submit">
                                                Modifier
                                            </x-primary-button>
                                        </form>
                                        <form method="POST" action="{{ route('users.destroy', $user->id )}}">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button type='submit' class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                                                Supprimer
                                            </x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
</x-app-layout>