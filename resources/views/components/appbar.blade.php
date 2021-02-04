@props(['zone' => '-1' , 'record'=>'-1' ])

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{$slot}}
    @if($record > 0)
        @if(!request()->routeIs('add-record-entry'))
            <a class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{route('add-zone-record-entry',$record)}}">New Entry</a>
        @endif
    @endif
    @if($zone > 0)
        @if(!request()->routeIs('add-zone-records'))
            <a class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{route('add-zone-record',$zone)}}">New Record</a>
        @endif
    @endif
    @if($zone > 0 )
        @if(!request()->routeIs('show-zone-records'))
            <a class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{route('show-zone-records',$zone)}}">Show Records</a>
        @endif
    @endif
</h2>
