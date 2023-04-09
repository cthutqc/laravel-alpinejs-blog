<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="leading-none flex min-h-screen flex-col justify-between text-black">
    <x-header />
        <x-container>
            {{$slot}}
        </x-container>
    <x-footer />
</body>
</html>
