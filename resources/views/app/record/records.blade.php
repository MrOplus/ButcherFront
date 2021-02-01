<x-app-layout>
    <x-slot name="header">
        <x-appbar :zone="$zone->id">
            {{ $zone->name }} Records
        </x-appbar>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($zone->records()->count() > 0 )
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Record Name
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Entries
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Settings</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                @foreach($zone->records as $record)
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{$record->name}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{$record->entries()->count()}}</div>
                                                        <div class="text-sm text-gray-500"></div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{action([\App\Http\Controllers\EntryController::class,"showEntries"],$record->id)}}" class="text-indigo-600 hover:text-indigo-900">Entries</a> | <a href="{{action([\App\Http\Controllers\RecordsController::class,"editRecord"],$record->id)}}" class="text-indigo-600 hover:text-indigo-900">Settings</a> | <a href="{{action([\App\Http\Controllers\RecordsController::class,"deleteRecord"],$record->id)}}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                                                    </td>
                                            </tr>
                                            @endforeach
                                            <!-- More items... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="leading-loose">You have no active record :/<br/>Try to <a class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{route('add-zone-record',$zone->id)}}">add a new record</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
