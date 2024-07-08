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
<body>
<x-navbar.navbarbs5/>
<div>
    {{ $slot }}
</div>
<script type="module">
    document.addEventListener('DOMContentLoaded', function () {
        $(".form-select2-sm").select2({
            theme: "bootstrap-5",
/*            containerCssClass: "select2--small",
            selectionCssClass: "select2--small",
            dropdownCssClass: "select2--small",*/
        });
    });
</script>
{{ $scripts ?? '' }}
</body>
</html>
