<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Editer les departements') }}
        </h2>
    </header>

    <form method="post" action="{{ route('departments.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('POST')
        <div>
            <x-input-label for="name" :value="__('Ajouter une nouvelle division')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-large rounded-lg px-5 py-2.5 " type="submit">{{ __('Nouvelle Division') }}</button>
        </div>
    </form>
</section>
