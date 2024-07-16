<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} | {{ @$title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <x-layouts.navbar />

    {{ $slot }}

    <x-layouts.footer />
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
