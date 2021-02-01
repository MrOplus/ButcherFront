<x-app-layout>
    <x-slot name="header">
        Server Configurations
    </x-slot>
    @if(isset($message))
        <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
            <div class="bg-green-400 shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-white">
                        {{$message}}
                    </h3>
                </div>
            </div>
            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   After Applying Configurations, your previous configurations will be lost!<br>
                    <form action="{{route('config-apply')}}" method="POST">
                        @csrf
                        <input
                            type="submit"
                            class="ml-3 bg-white py-3 px-6 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            name="_apply" value="I Understand the risk,Apply!" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
