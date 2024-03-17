<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Employés') }}
        </h2>
    </x-slot>
    <div x-data="{
        search: '',
        employees: {{$employees}},
        get filteredEmployee(){
            return this.employees.filter(i => i.firstname.toLowerCase().startsWith(this.search.toLowerCase())
            )
        }, 
    
        deleteEmployee(id) {
            if (confirm('Are you sure you want to delete this employee?')) {
                fetch(`/employees/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=&quot;csrf-token&quot;]').getAttribute('content')
                    }
                })
                .then(() => {
                    const index = this.employees.findIndex(e => e.id === id);
                    this.employees.splice(index, 1); 
                })
                .catch(error => {
                    console.error('Error deleting employee:', error); 
                });
            }
        }
    }">
        <div class="py-2">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <input x-model="search" class="mb-2 p-1 border border-gray-400 rounded-md" placeholder="Search...">
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
                                <template x-for="employee in filteredEmployee" :key="employee.id">
                                    <tr>
                                            <td x-text="employee.firstname" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.lastname" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.position" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.department" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.email" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.idnumber" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.current_year_days" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.previous_year_days" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td x-text="employee.joindate" class="px-6 py-4 whitespace-nowrap"></td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <x-primary-button @click="deleteEmployee(employee.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </x-primary-button>
                                            </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</x-app-layout>
