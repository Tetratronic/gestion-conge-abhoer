<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Employés') }}
        </h2>
    </x-slot>
        <div class="py-2">
            <div class="max-w-max mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->firstname}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->lastname}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->position}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->department }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->idnumber }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->current_year_days }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->previous_year_days }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ Carbon\Carbon::parse($employee->joindate)->format('d/m/Y')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</x-app-layout>
