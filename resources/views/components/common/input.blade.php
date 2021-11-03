<label for="{{ $name }}"
    class="text-gray-700 text-sm">{{ ($label ?? ucfirst($name)) . ($required ? '*' : '') }}</label>
<input type="{{ $type }}" {{$attributes}} value="{{ old($name, $value ?? '') }}"
    class="block w-full rounded-md text-sm font-medium focus:ring-2 mt-1 border-gray-300
                        focus:border-indigo-200
                        focus:ring-gray-200"
    {{ $required ? 'required' : '' }} name="{{ $name }}" id="{{ $name }}">
