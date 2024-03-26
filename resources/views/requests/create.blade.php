<x-app-layout>>
    <div class="flex flex-wrap items-center justify-center ">
        <div class="bg-white p-10 rounded-md">
            <h2 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 mb-4">{{ __('Nouvelle Demande de Congé')}}</h2>
            <form method="POST" action="{{route('leave-requests.store')}}" class="flex flex-col justify-between">
                @csrf
                @method('POST')

                <x-input-label for="idnumber" :value="__('Numero CIN')" />
                <x-text-input id="idnumber" name="idnumber" type="text" class="mt-1 block w-full" :value="old('idnumber')" required autocomplete="idnumber" />
                <x-input-error class="mt-2" :messages="$errors->get('idnumber')" />

                <x-input-label for="start_date" :value="__('Date Début')" />
                <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full" :value="old('start_date')" required autocomplete="start_date" />
                <x-input-error class="mt-2" :messages="$errors->get('start_date')" />

                <x-input-label for="end_date" :value="__('Date Fin')" />
                <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" :value="old('end_date')" required autocomplete="end_date" />
                <x-input-error class="mt-2" :messages="$errors->get('end_date')" />

                <x-input-label for="duration" :value="__('Durée')" />
                <x-text-input id="duration" name="duration" type="number" class="mt-1 block w-full" :value="old('duration')" required autocomplete="duration" />
                <x-input-error class="mt-2" :messages="$errors->get('duration')" />

                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded m-4 p-4">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
