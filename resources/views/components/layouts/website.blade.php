<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-200">
    <x-layouts.header />
    <main>
        @if (isset($errors) && $errors->all())
            <div class="bg-red-400 p-3">
                @foreach ($errors->all() as $error)
                    <p class="text-white">- {{ $error }}</p>
                @endforeach
            </div>
        @endif
        @if (Session::has('message'))
            <div class="bg-blue-400 p-3">
                <p class="text-white">{{ Session::get('message') }}</p>
            </div>
        @endif
        @if (Session::has('success'))
            <div class="bg-green-400 p-3">
                <p class="text-white">{{ Session::get('success') }}</p>
            </div>
        @endif
        {{ $slot }}
    </main>
    <footer></footer>
    @isset($script)
        {{ $script }}
    @endisset
</body>

</html>
