<x-app-layout>
    <x-slot name="header">
        <x-appbar :zone="$entry->record->zone->id" :record="$entry->record->id" >
            Edit Entry | {{$entry->record->name}}.{{$entry->record->zone->name}}
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Entry</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Entry Information<br>

                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{route('edit-zone-record-entry',$entry->id)}}" method="POST">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="type" class="block text-sm font-medium text-gray-700">Record Type</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input readonly type="text" value="{{$entry->type}}" name="value" id="value" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"  placeholder="192.168.1.1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="grid-cols-1">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="value" class="block text-sm font-medium text-gray-700">
                                                        Value
                                                    </label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input required type="text" value="{{$entry->value}}" name="value" id="value" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"  placeholder="192.168.1.1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-cols-1">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="ttl" class="block text-sm font-medium text-gray-700">
                                                        TTL
                                                    </label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input required type="number" value="{{$entry->ttl}}" name="ttl" id="ttl" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"  placeholder="60">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-cols-1">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="weight" class="block text-sm font-medium text-gray-700">
                                                        Weight
                                                    </label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input required type="number" value="{{$entry->weight}}" name="weight" id="weight" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300" placeholder="60">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-cols-1">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="order" class="block text-sm font-medium text-gray-700">
                                                        Order
                                                    </label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input required type="number" value="{{$entry->order}}" name="order" id="order" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded sm:text-sm border-gray-300"  placeholder="1">
                                                    </div>
                                                </div>
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
    </div>
</x-app-layout>
