<x-app-layout>
    {{-- Displaying the list of Employees  --}}

        <div class="py-10">
            <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row justify-between">
                    {{-- <x-secondary-button class=" bg-black text-white max-h-10 max-w-40">Ajouter un employé</x-secondary-button> --}}
                    <form action="{{ route('leave-requests.index')}}" method="GET" class="flex flex-row">
                        <input name='search' class="mb-5 p-1 border border-gray-400 rounded-md float" placeholder="Rechercher...">
                        <x-primary-button type="submit" class="mb-5 p-1 ml-5">Chercher</x-primary-button>
                    </form>
                </div>
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                        <span class="font-medium">{{session('success')}}</span>
                    </div>
                @endif
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-max">

                        <table class="min-w-full divide-y divide-gray-200 text-center">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Nom </th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Du</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Au</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Durée</th>
                                    <th scope="col" class="text-center py-2 text-xs text-gray-500 uppercase">Options</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($requests->isEmpty())
                                <tr>
                                    <td colspan="10" class="bg-white-100 text-gray-600 text-center py-4 px-6 font-medium rounded"><i>{{__('Aucune demande trouvée.')}}</i>
                                        <br>
                                        <x-nav-link class="text-lg" :href="route('users.index')">Retour</x-nav-link>
                                    </td>
                                </tr>
                                @else
                                @foreach($requests as $request)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">{{$request->fullname_ar}}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ Carbon\Carbon::parse($request->start_date)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ Carbon\Carbon::parse($request->end_date)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{$request->duration}}</td>
                                    <td class="px-4 py-2 whitespace-nowrap flex flex-row gap-3 align-center justify-center">
                                        <form action="{{ route('vacation.print', ['employeeRequest' => $request->id] )}}" method="GET">
                                            @csrf
                                            <div class="relative">
                                                <button type="submit" data-tooltip-target="tooltip-info" data-tooltip-trigger="hover">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            <div>{{ $requests->links() }}</div>
            </div>
</x-app-layout>
