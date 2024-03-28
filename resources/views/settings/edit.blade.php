<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Réglages') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg inline-block">
                <div class="max-w-xl flex flex row gap-20">
                    @include('settings.partials.edit-departments')
                    @include('settings.partials.list-departments')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>