<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Firstame -->
        <div>
            <x-input-label for="firstname" :value="__('Nom')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="lastname" :value="__('Prenom')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="position" :value="__('Poste')" />
            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required />
            <x-input-error :messages="$errors->get('position')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="department" :value="__('Departement')" />
            <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" required />
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="idnumber" :value="__('CIN')" />
            <x-text-input id="idnumber" class="block mt-1 w-full" type="text" name="idnumber" :value="old('idnumber')" required />
            <x-input-error :messages="$errors->get('idnumber')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="current_year_days" :value="__('Jours annee courante')" />
            <x-text-input id="current_year_days" class="block mt-1 w-full" type="number" name="current_year_days" :value="old('current_year_days')" required />
            <x-input-error :messages="$errors->get('current_year_days')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="previous_year_days" :value="__('Jours annee precedante')" />
            <x-text-input id="previous_year_days" class="block mt-1 w-full" type="number" name="previous_year_days" :value="old('previous_year_days')" required />
            <x-input-error :messages="$errors->get('previous_year_days')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="joindate" :value="__('Date de recrutement')" />
            <x-text-input id="joindate" class="block mt-1 w-full" type="date" name="joindate" :value="old('joindate')" required />
            <x-input-error :messages="$errors->get('joindate')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
