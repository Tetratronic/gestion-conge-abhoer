<section>
    <table class="min-w-2xl divide-y divide-gray-200 text-center border mt-2">
        <thead class="bg-gray-50" >
            <tr >
                <th class="text-center py-2 text-xs text-gray-500 uppercase">Divisions/service</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach($departments as $department)
                <tr>
                    <td class="px-4 whitespace-nowrap flex flex-row gap-3 align-center justify-center">
                        {{$department->name}}
                        <form method="POST" action="{{ route('departments.destroy', $department->id )}}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Confirmer ?')" type='submit' class="mt-1.5 bg-transparent text-white font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="red">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>