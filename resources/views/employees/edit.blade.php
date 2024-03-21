<x-app-layout>>
    <div class="flex flex-wrap items-center justify-center ">
        <div class="relative bg-white p-10 rounded-md">    
            <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}" class="grid grid-cols-2 gap-4"> 
                @csrf
                @method('PUT')
                <div class="flex flex-col"> <label class="mb-1" for="firstname">Nom:</label>
                    <input type="text" name="firstname" id="firstname" required value="{{old('firstname', $employee->firstname)}}" > 
                </div>
 
                <div class="mb-4 flex flex-col"> <label class="mb-1" for="lastname">Prénom:</label>
                    <input type="text" name="lastname" id="lastname" required value="{{old('lastname', $employee->lastname)}}"  > 
                </div>

                <div class="mb-4 flex flex-col"> <label class="mb-1" for="position">Poste:</label>
                    <input type="text" name="position" id="position" required  value="{{old('position', $employee->position)}}" > 
                </div>

                <div class="mb-4 flex flex-col"> 
                    <label for="department">Departement:</label>
                    <select name="department" id="department" required>
                        <option value="{{$employee->department}}">{{$employee->department}}</option> 
                        <option value="Informatique">Informatique</option>
                        <option value="Administration">Administration</option>
                        <option value="Gestion">Gestion</option>
                        <option value="Sécurité">Securite</option>
                    </select> 
                </div>

                <div class="mb-4 flex flex-col"> <label class="mb-1" for="idnumber">CIN:</label>
                    <input type="text" name="idnumber" id="idnumber" required value="{{old('idnumber', $employee->idnumber)}}"  > 
                    @error('idnumber')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 flex flex-col"> <label class="mb-1" for="email">Email:</label>
                    <input type="email" name="email" id="email" required  value="{{old('email', $employee->email)}}" > 
                </div>

                <div class="mb-4 flex flex-col"> <label class="mb-1" for="current_year_days">Jours A. Courante:</label>
                    <input type="number" name="current_year_days" id="current_year_days" required  value="{{old('current_year_days', $employee->current_year_days)}}" > 
                </div>

                <div class="mb-4 flex flex-col"> <label class="mb-1" for="previous_year_days">Jours A. Precedante:</label>
                    <input type="number" name="previous_year_days" id="previous_year_days" required  value="{{old('previous_year_days', $employee->previous_year_days)}}" > 
                </div>

               <div class="mb-4 flex flex-col"> <label class="mb-1" for="joindate">Date Recrutement:</label>
                    <input type="date" name="joindate" id="joindate" required value="{{old('joindate', $employee->joindate->format('Y-m-d'))}}"  > 
                </div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded m-4">
                        Ajouter
                    </button>
            </form> 
        </div>
    </div>
</x-app-layout>