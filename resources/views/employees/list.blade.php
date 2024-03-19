<x-app-layout>
    
    {{-- This is some AlpineJS code responsible for making the search dynamic --}}
    <div x-data="{
        openModal: false,
        search: '',
        employees: {{json_encode($employees)}},
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
    
    {{-- Displaying the list of Employees  --}}

        <div class="py-10">
            <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row justify-between">
                    {{-- <x-secondary-button class=" bg-black text-white max-h-10 max-w-40">Ajouter un employé</x-secondary-button> --}}
                    <button @click="openModal = true" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mb-auto rounded">
                        Nouveau Employé
                    </button>
                    <input x-model="search" class="mb-5 p-1 border border-gray-400 rounded-md float" placeholder="Rechercher...">
                    
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
                                                <x-primary-button @click="deleteEmployee(employee.id)">
                                                    Modifier
                                                </x-primary-button>
                                                <x-primary-button @click="deleteEmployee(employee.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                                                    Supprimer
                                                </x-primary-button>
                                            </td>
                                    </tr>
                                </template>
                                <template x-if="filteredEmployee.length === 0">
                                    <tr>
                                        <td colspan="10" class="bg-white-100 text-gray-600 text-center py-4 px-6 font-medium rounded">Aucun employé trouvé.</td> 
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            

             {{-- Modal form for Adding Employees --}}
            <div x-show="openModal" class="fixed inset-0 overflow-y-auto z-50" style="display: none;" x-cloak>
                <div class="flex flex-wrap items-center justify-center min-h-screen">
                    <div class="relative bg-white p-10 rounded-md">
                        <button @click="openModal = false" class="absolute top-3 right-3 text-gray-700 hover:text-red-600">Fermer</button>
            
                        <form method="POST" action="{{route('employees.store')}}" class="grid grid-cols-2 gap-4"> 
                            @csrf
            
                            <div class="flex flex-col"> <label class="mb-1" for="firstname">Nom:</label>
                                <input type="text" name="firstname" id="firstname" required > 
                            </div>
             
                            <div class="mb-4 flex flex-col"> <label class="mb-1" for="lastname">Prénom:</label>
                                <input type="text" name="lastname" id="lastname" required > 
                            </div>
            
                            <div class="mb-4 flex flex-col"> <label class="mb-1" for="position">Poste:</label>
                                <input type="text" name="position" id="position" required > 
                            </div>
            
                            <div class="mb-4 flex flex-col"> 
                                <label for="department">Departement:</label>
                                <select name="department" id="department" required >
                                    <option value="">Choisir</option> 
                                    <option value="Informatique">Informatique</option>
                                    <option value="Administration">Administration</option>
                                    <option value="Gestion">Gestion</option>
                                    <option value="Sécurité">Securite</option>
                                    </select> 
                            </div>
            
                            <div class="mb-4 flex flex-col"> <label class="mb-1" for="idnumber">CIN:</label>
                                <input type="text" name="idnumber" id="idnumber" required > 
                            </div>
            
                            <div class="mb-4 flex flex-col"> <label class="mb-1" for="email">Email:</label>
                                <input type="email" name="email" id="email" required > 
                            </div>
            
                            <div class="mb-4 flex flex-col"> <label class="mb-1" for="current_year_days">Jours A. Courante:</label>
                                <input type="number" name="current_year_days" id="current_year_days" required > 
                            </div>
            
                            <div class="mb-4 flex flex-col"> <label class="mb-1" for="previous_year_days">Jours A. Precedante:</label>
                                <input type="number" name="previous_year_days" id="previous_year_days" required > 
                            </div>
            
                           <div class="mb-4 flex flex-col"> <label class="mb-1" for="joindate">Date Recrutement:</label>
                                <input type="date" name="joindate" id="joindate" required > 
                            </div>
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded m-4">
                                    Ajouter
                                </button>
                        </form> 
                    </div>
                </div>
            </div> 
</x-app-layout>
