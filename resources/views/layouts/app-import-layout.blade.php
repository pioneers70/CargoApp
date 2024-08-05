<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'CargoAPP' }}</title>
</head>
<body class="bg-color-delicate min-vh-100">
<x-navbar.navbarbs5/>
<div>
    {{ $slot }}
</div>

{{ $scripts ?? '' }}
</body>
</html>
