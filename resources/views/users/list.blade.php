<x-app-layout>
    {{-- Displaying the list of Employees  --}}
        <div class="py-10">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row justify-between">
                    {{-- <x-secondary-button class=" bg-black text-white max-h-10 max-w-40">Ajouter un employé</x-secondary-button> --}}
                    <a href="{{ route("users.create") }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mb-auto rounded cursor-pointer">
                        Nouvel Utilisateur
                    </a>
                    <form action="{{ route('users.index')}}" method="GET" class="flex flex-row">
                        <input name='search' class="mb-5 p-1 border border-gray-400 rounded-md float" placeholder="Rechercher...">
                        <x-primary-button type="submit" class="mb-5 p-1 ml-5">Chercher</x-primary-button>
                    </form>

                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-max">
                        <table class="min-w-full divide-y divide-gray-200 text-center">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Login</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Email</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Role</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Date Création</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Options</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="10" class="bg-white-100 text-gray-600 text-center py-4 px-6 font-medium rounded"><i>{{__('Aucun utilisateur trouvé.')}}</i>
                                            <br>
                                            <x-nav-link class="text-lg" :href="route('users.index')">Retour</x-nav-link>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="px-2 py-2 whitespace-nowrap">{{$user->login}}</td>
                                        <td class="px-2 py-2 whitespace-nowrap">{{$user->email}}</td>
                                        <td class="px-2 py-2 whitespace-nowrap">{{$user->role}}</td>
                                        <td class="px-2 py-2 whitespace-nowrap">{{$user->created_at}}</td>
                                        <td class="px-2 py-2 whitespace-nowrap flex flex-row gap-3 justify-center">
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
