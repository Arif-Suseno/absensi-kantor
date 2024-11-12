<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>{{ $title }}</title>
</head>

<body class="text-xs">
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    <main class="mx-2 mt-2 md:mx-4">
        {{ $slot }}
    </main>
</body>

</html>
