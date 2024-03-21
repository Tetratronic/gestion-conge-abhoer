<x-app-layout>>
        <div class="flex flex-wrap items-center justify-center ">
            <div class="relative bg-white p-10 rounded-md">    
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
</x-app-layout>