<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    {{-- Link cdn icon font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-custom-gradient">
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    <main>
    <div class="container h-full mx-auto px-2 pt-2 md:px-3 md:pt-3 lg:pt-4 xl:px-0 xl:pt-5">
            {{ $slot }}
        </div>
    </main>
</body>

</html>
