<x-app-layout>>
        <div class="flex flex-wrap items-center justify-center ">
            <div class=" bg-white p-10 rounded-md">
                <h2 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 mb-4">{{ __('Nouvel employé')}}</h2>
                <form method="POST" action="{{route('employees.store')}}" class="grid grid-cols-2 gap-4">
                    @csrf

                    <div class="flex flex-col"><x-input-label class="mt-4" for="firstname" :value="__('Nom')" />
                    <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" required :value="old('firstname')" />
                    <x-input-error class="mt-2" :messages="$errors->get('firstname')" /></div>



                    <div class="flex flex-col"><x-input-label class="mt-4" for="lastname" :value="__('Prénom')" />
                        <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" required :value="old('lastname')" />
                        <x-input-error class="mt-2" :messages="$errors->get('lastname')" /></div>


                    <div class="flex flex-col"><x-input-label class="mt-4" for="fullname_ar" :value="__('Nom complet en arabe')" />
                        <x-text-input id="fullname_ar" name="fullname_ar" type="text" class="mt-1 block w-full" required :value="old('fullname_ar')" />
                        <x-input-error class="mt-2" :messages="$errors->get('fullname_ar')" /></div>


                    <div class="flex flex-col"><x-input-label class="mt-4" for="position" :value="__('Poste')" />
                        <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" required :value="old('position')" />
                        <x-input-error class="mt-2" :messages="$errors->get('position')" /></div>



                    <div class="flex flex-col"><x-input-label class="mt-4" for="department" :value="__('Division/Service')" />
                    <select name="department" id="department" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach($departments as $department)
                            <option value="{{$department->name}}">{{$department->name}}</option>
                        @endforeach
                    </select></div>


                    <div class="flex flex-col"><x-input-label class="mt-4" for="idnumber" :value="__('CIN')" />
                        <x-text-input id="idnumber" name="idnumber" type="text" class="mt-1 block w-full" required :value="old('idnumber')" />
                        <x-input-error class="mt-2" :messages="$errors->get('idnumber')" /></div>


                    <div class="flex flex-col"><x-input-label class="mt-4" for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required :value="old('email')" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" /></div>



                    <div class="flex flex-col"><x-input-label class="mt-4" for="current_year_days" :value="__('Jours A. Courante')" />
                        <x-text-input id="current_year_days" name="current_year_days" type="number" class="mt-1 block w-full" required :value="old('current_year_days')" />
                        <x-input-error class="mt-2" :messages="$errors->get('current_year_days')" /></div>



                    <div class="flex flex-col"><x-input-label class="mt-4" for="previous_year_days" :value="__('Jours A. Precedante')" />
                        <x-text-input id="previous_year_days" name="previous_year_days" type="number" class="mt-1 block w-full" required :value="old('previous_year_days')" />
                        <x-input-error class="mt-2" :messages="$errors->get('previous_year_days')" /></div>

                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded mt-6 p-4">
                            Ajouter
                        </button>
                </form>
            </div>
        </div>
</x-app-layout>
