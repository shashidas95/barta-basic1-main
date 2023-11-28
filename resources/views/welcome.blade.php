<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>

    </style>

</head>

<body>

    {{-- {{ 'Hello world' }} --}}
    {{-- {{ session('name') }}
{{ dd(session()->all()) }} --}}
    {{-- {{ dd(session('team')) }} --}}
    {{-- {{ dd(session('team.1')) }} --}}
    {{-- {{ dd(session()->get('team.1')) }} --}}

    {{-- {{ dd(session('theme', 'dark')) }} --}}
    {{-- {{ dd(session()->all()) }} --}}
    {{-- {{ dd(session()->has('name')) }} --}}
    {{-- {{ dd(session()->missing('fax')) }} --}}
    {{-- {{ dd(session()->pull('name')) }} --}}
    {{-- {{ session()->increment('visitors', 5)}} --}}
</body>

</html>
