<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container flex">
    <x-sidebar></x-sidebar>
    <main class="p-4">
        {{ $slot }}
    </main>
</div>
</body>
</html>