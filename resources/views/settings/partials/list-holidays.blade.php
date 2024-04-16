<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Liste des Vacances') }}
        </h2>
    <table class="min-w-8xl divide-y divide-gray-200 text-center border mt-2">
        <thead class="bg-gray-50" >
        <tr >
            <th class="text-center py-2 text-xs text-gray-500 uppercase">Nom</th>
            <th class="text-center py-2 text-xs text-gray-500 uppercase">Date</th>
        </tr>
        </thead>
        <tbody class="">
        @foreach($holidays as $holiday)
            <tr>
                <td class="px-4  gap-3 align-center justify-center">
                    {{$holiday->name}}
                </td>
                <td class="px-4  gap-3 align-center justify-center">
                    {{$holiday->date}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
