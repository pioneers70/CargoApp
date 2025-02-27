<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/img/main.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'CargoAPP' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div>
    {{$slot}}
</div>
</body>
</html>
