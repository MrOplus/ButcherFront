<x-app-layout>
    <x-slot name="header">
        <x-appbar :zone="$record->zone->id">
            Edit Record > {{$record->name}}.{{$record->zone->name}}
        </x-appbar>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
            <div>
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Record</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Record information<br>
                                    Record Types hint:<br>
                                    All : returns all records as a single RR<br>
                                    Load Balance : creates a FIFO Queue<br>
                                    Random : return random record from all record
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{route('edit-zone-record',$record->id)}}" method="POST">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="zone_name" class="block text-sm font-medium text-gray-700">
                                                    Record Name (use @ for root)
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input required readonly type="text" value="{{$record->name}}" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="@">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="grid-cols-1">
                                                <label for="A" class="block text-sm font-medium text-gray-700">A Record Settings</label>
                                                <x-record-setting :record="'A'" :type="$record->A" />
                                            </div>
                                            <div class="grid-cols-1">
                                                <label for="AAAA" class="block text-sm font-medium text-gray-700">AAAA Record Settings</label>
                                                <x-record-setting :record="'AAAA'" :type="$record->AAAA" />
                                            </div>
                                            <div class="grid-cols-1">
                                                <label for="TXT" class="block text-sm font-medium text-gray-700">TXT Record Settings</label>
                                                <x-record-setting :record="'TXT'" :type="$record->TXT" />
                                            </div>
                                            <div class="grid-cols-1">
                                                <label for="CNAME" class="block text-sm font-medium text-gray-700">CNAME Record Settings</label>
                                                <x-record-setting :record="'CNAME'" :type="$record->CNAME" />
                                            </div>
                                            <div class="grid-cols-1">
                                                <label for="NS" class="block text-sm font-medium text-gray-700">NS Record Settings</label>
                                                <x-record-setting :record="'NS'" :type="$record->NS" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /End replace -->
    </div>

</x-app-layout>
