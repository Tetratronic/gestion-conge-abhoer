<x-app-layout>>
    <div class="flex flex-wrap items-center justify-center ">
        <div class="relative bg-white p-10 rounded-md">    
            <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}" class="grid grid-cols-2 gap-4"> 
                @csrf
                @method('PUT')
                <div class="flex flex-col"><x-input-label class="mt-4" for="firstname" :value="__('Nom')" />
                    <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" required :value="old('firstname', $employee->firstname)" />
                    <x-input-error class="mt-2" :messages="$errors->get('firstname')" /></div>
     


                    <div class="flex flex-col"><x-input-label class="mt-4" for="lastname" :value="__('Prénom')" />
                        <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" required :value="old('lastname', $employee->lastname)" />
                        <x-input-error class="mt-2" :messages="$errors->get('lastname')" /></div>
    


                    <div class="flex flex-col"><x-input-label class="mt-4" for="position" :value="__('Poste')" />
                        <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" required :value="old('position', $employee->position)" />
                        <x-input-error class="mt-2" :messages="$errors->get('position')" /></div>



                    <div class="flex flex-col"><x-input-label class="mt-4" for="department" :value="__('Departement')" />
                    <select name="department" id="department" required class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="{{$employee->department}}">{{$employee->department}}</option> 
                        <option value="Informatique">Informatique</option>
                        <option value="Administration">Administration</option>
                        <option value="Gestion">Gestion</option>
                        <option value="Sécurité">Securite</option>
                    </select></div>


                    <div class="flex flex-col"><x-input-label class="mt-4" for="idnumber" :value="__('CIN')" />
                        <x-text-input id="idnumber" name="idnumber" type="text" class="mt-1 block w-full" required :value="old('idnumber', $employee->idnumber)" />
                        <x-input-error class="mt-2" :messages="$errors->get('idnumber')" /></div>
                    

                    <div class="flex flex-col"><x-input-label class="mt-4" for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required :value="old('email', $employee->email)" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" /></div>
    


                    <div class="flex flex-col"><x-input-label class="mt-4" for="current_year_days" :value="__('Jours A. Courante')" />
                        <x-text-input id="current_year_days" name="current_year_days" type="number" class="mt-1 block w-full" required :value="old('current_year_days', $employee->current_year_days)" />
                        <x-input-error class="mt-2" :messages="$errors->get('current_year_days')" /></div>
    


                    <div class="flex flex-col"><x-input-label class="mt-4" for="previous_year_days" :value="__('Jours A. Precedante')" />
                        <x-text-input id="previous_year_days" name="previous_year_days" type="number" class="mt-1 block w-full" required :value="old('previous_year_days', $employee->previous_year_days)" />
                        <x-input-error class="mt-2" :messages="$errors->get('previous_year_days')" /></div>
    

                    <div class="flex flex-col"><x-input-label class="mt-4" for="joindate" :value="__('Date de recrutement')" />
                        <x-text-input id="joindate" name="joindate" type="date" class="mt-1 block w-full" required :value="old('joindate', $employee->joindate->format('Y-m-d'))"/>
                        <x-input-error class="mt-2" :messages="$errors->get('joindate')" /></div>

                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded mt-6 p-4">
                            Ajouter
                        </button>
            </form> 
        </div>
    </div>
</x-app-layout>