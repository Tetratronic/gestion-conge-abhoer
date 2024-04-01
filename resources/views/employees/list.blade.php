<x-app-layout>
    {{-- Displaying the list of Employees  --}}
        <div class="py-10">
            <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row justify-between">
                    {{-- <x-secondary-button class=" bg-black text-white max-h-10 max-w-40">Ajouter un employé</x-secondary-button> --}}
                    <a href="{{ route("employees.create") }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mb-auto rounded cursor-pointer">
                        Nouvel Employé
                    </a>
                    <form action="{{ route('employees.index')}}" method="GET" class="flex flex-row">
                        <input name='search' class="mb-5 p-1 border border-gray-400 rounded-md float" placeholder="Rechercher...">
                        <x-primary-button type="submit" class="mb-5 p-1 ml-5">Chercher</x-primary-button>
                        <a href="{{ URL::previous() }}">Back</button>
                    </form>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-max">
                        <table class="min-w-full divide-y divide-gray-200 text-center">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Prénom</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Nom</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Poste</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Division/Service</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Email</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">CIN</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Jours A. Courante</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Jours A. Precedante</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Options</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($employees->isEmpty())
                                <tr>
                                    <td colspan="10" class="bg-white-100 text-gray-600 text-center py-4 px-6 font-medium rounded"><i>{{__('Aucun employé trouvé.')}}</i>
                                        <br>
                                        <x-nav-link class="text-lg" :href="route('users.index')">Retour</x-nav-link>
                                    </td>
                                </tr>
                                @else
                                @foreach($employees as $employee)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">{{$employee->firstname}}</td>
                                    <td  class="px-4 py-2 whitespace-nowrap">{{$employee->lastname}}</td>
                                    <td  class="px-4 py-2 whitespace-nowrap">{{$employee->position}}</td>
                                    <td  class="px-4 py-2 whitespace-nowrap">{{$employee->department}}</td>
                                    <td  class="px-4 py-2 whitespace-nowrap">{{$employee->email}}</td>
                                    <td  class="px-4 py-2 whitespace-nowrap">{{$employee->idnumber}}</td>
                                    <td  class="px-4 py-2 whitespace-nowrap">{{$employee->current_year_days}}</td>
                                    <td  class="px-4 py-2 whitespace-nowrap">{{$employee->previous_year_days}}</td>
                                    <td class="px-4 py-2 whitespace-nowrap flex flex-row gap-3 align-center justify-center">
                                        <form action="{{ route('employees.edit', ['employee' => $employee->id] )}}" method="GET">
                                            @csrf
                                            <div class="relative">
                                                <button type="submit" data-tooltip-target="tooltip-info" data-tooltip-trigger="hover">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                        <form method="POST" action="{{ route('employees.destroy', $employee->id )}}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Confirmer ?')" type='submit' class="bg-transparent text-white font-bold">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="red">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        {{-- Add User Icon --}}
                                        {{-- @if(Auth::User()->isAdmin())
                                                <a href="{{ route('users.create', $employee->id )}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                                    </svg>
                                                </a>
                                        @endif --}}
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
