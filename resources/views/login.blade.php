<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    {{-- Link cdn icon font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-[#1a1a2e] text-white flex items-center justify-center h-screen">
    <form action="{{ url('/login') }}" method="POST"
        class="relative w-11/12 p-4 bg-opacity-20 border border-gray-300 shadow-2xl shadow-sky-900  z-10 rounded-lg backdrop-blur-md md:p-8 md:w-1/2">
        @csrf
        <h1 class="text-2xl font-bold text-center mb-6 md:text-4xl">Login</h1>
        <div class="mb-4">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full mt-1 p-2 bg-gray-600 border-2 border-gray-400 bg-opacity-10 rounded text-white focus:outline-none focus:ring-2 focus:ring-gray-600 focus:shadow focus:shadow-gray-400 md:p-3"
                placeholder="Email" />
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password"
                class="w-full mt-1 p-2 bg-gray-600 border-2 border-gray-400 bg-opacity-10 rounded text-white focus:outline-none focus:ring-2 focus:ring-gray-600 focus:shadow focus:shadow-gray-400 md:p-3"
                placeholder="Password" />
            @error('password')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-8">
            <label class="block">Role :</label>
            <select name="role"
                class="mt-1 p-1 bg-gray-600 border-2 border-gray-400 bg-opacity-10 rounded text-white focus:outline-none focus:ring-2 focus:ring-gray-600 focus:shadow focus:shadow-gray-400 focus:bg-gray-700 md:p-2">
                <option value="Karyawan">Karyawan</option>
                <option value="Admin">Admin</option>
            </select>
            @error('role')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit"
            class="w-full py-3 bg-sky-900 text-white rounded font-bold border border-sky-700 shadow-md shadow-sky-700 transform transition duration-300  hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Login
        </button>
        <div class="flex justify-between mt-4 text-sm opacity-60">
            <a href="#" class="underline text-blue-400 hover:text-white">Forgot Password?</a>
            <a href="#" class="underline text-blue-400 hover:text-white">Register</a>
        </div>
    </form>

    <div class="absolute bottom-8 left-4 flex space-x-2">
        <div class="w-6 h-6 bg-[#1a1a2e] rounded-full cursor-pointer"
            onclick="setTheme('#1A1A2E', '#FFFFFF', '#0F3460')"></div>
        <div class="w-6 h-6 bg-[#461220] rounded-full cursor-pointer"
            onclick="setTheme('#461220', '#FFFFFF', '#E94560')"></div>
        <div class="w-6 h-6 bg-[#192A51] rounded-full cursor-pointer"
            onclick="setTheme('#192A51', '#FFFFFF', '#967AA1')"></div>
    </div>

    <script>
        const setTheme = (background, color, primaryColor) => {
            document.body.style.background = background;
            document.body.style.color = color;
        };
    </script>
</body>

</html>
