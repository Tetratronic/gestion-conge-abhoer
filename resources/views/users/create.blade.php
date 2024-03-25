<x-app-layout>>
    <div class="flex flex-wrap items-center justify-center ">
        <div class="bg-white p-10 rounded-md">
            <h2 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 mb-4">{{ __('Nouvel utilisateur')}}</h2>
            <form method="POST" action="{{route('users.store')}}" class="flex flex-col justify-between">
                @csrf
                @method('POST')

                <x-input-label for="login" :value="__('Login')" />
                <x-text-input id="login" name="login" type="text" class="mt-1 block w-full" :value="old('login')" required autocomplete="login" />
                <x-input-error class="mt-2" :messages="$errors->get('login')" />

                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email')" required autocomplete="email" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                <x-input-label class="mt-2" for="role" :value="__('Role')" />
                <select name="role" id="role" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">{{old('role', 'Choisir')}}</option>
                    <option value="rh">RH</option>
                    <option value="admin">Administrateur</option>
                </select>

                <x-input-label class="mt-4" for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('password')" />

                <x-input-label class="mt-4" for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />

                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded m-4 p-4">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
