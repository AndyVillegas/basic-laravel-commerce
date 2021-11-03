<form action="{{$action}}" class="flex flex-col" method="GET">
    <input id="q" type="text"
        class="border-gray-300 focus:border-indigo-300
    focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm"
        placeholder="{{ __('Search') }}..." name="q" value="{{ Request::get('q') }}">
</form>
