@props(['record','type'])
<select id="{{$record}}" name="{{$record}}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    <option value="loadbalance" @if($type == "loadbalance") selected @endif >Load Balance</option>
    <option value="all" @if($type == "all") selected @endif>All</option>
    <option value="random" @if($type == "random") selected @endif>Random</option>
</select>
