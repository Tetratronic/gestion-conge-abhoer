<x-app-layout>>
    <div class="flex flex-wrap items-center justify-center ">
        <div class="relative bg-white p-10 rounded-md">
            <h2 class=" mb-5 text-4xl font-extrabold leading-none tracking-tight text-gray-900 mb-4">{{ __('Modifier utilisateur')}}</h2>
            <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                @csrf
                @method('PUT')

                <x-input-label for="login" :value="__('Login')" />
                <x-text-input id="login" name="login" type="text" class="mt-1 block w-full" :value="old('login', $user->login)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('login')" />


                <x-input-label class="mt-4" for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                <x-input-label class="mt-4" for="role" :value="__('Role')" />
                <select name="role" id="role" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="{{$user->role}}">{{$user->role}}</option>
                    <option value="rh">rh</option>
                    <option value="admin">admin</option>
                </select>

                    <x-input-label class="mt-4" for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />

                    <x-input-label class="mt-4" for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />

                    <button type="submit" class=" px-5 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded m-4">
                        Modifier
                    </button>
            </form>
        </div>
    </div>
</x-app-layout>
