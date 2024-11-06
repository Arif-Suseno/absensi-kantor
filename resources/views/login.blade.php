<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-[#1a1a2e] text-white flex items-center justify-center h-screen">

    <div class="relative w-88 p-8 bg-opacity-20 border border-gray-300 shadow-2xl rounded-lg backdrop-blur-md">
        <form class="space-y-4">
            <h1 class="text-4xl font-bold text-center">Login</h1>
            <input type="text" class="w-full px-4 py-3 bg-gray-600 bg-opacity-10 rounded text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Username" />
            <input type="password" class="w-full px-4 py-3 bg-gray-600 bg-opacity-10 rounded text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Password" />
            <!-- <input type="" class="w-full px-4 py-3 bg-gray-600 bg-opacity-10 rounded text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" name="satu" /> -->
            <select name="" id="">
            <option value="1">BOss</option>
            <option value="2">gawe</option>
            </select>

            <button type="submit" class="w-full py-3 bg-[#0f3460] text-white rounded font-bold transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Login
            </button>
        </form>
        <div class="flex justify-between mt-4 text-sm opacity-60">
            <a href="#" class="hover:underline">Forgot Password?</a>
            <a href="#" class="hover:underline">Register</a>
        </div>
        <div class="absolute top-0 left-0 w-32 h-32 bg-[#0f3460] rounded-full transform -translate-x-1/2 -translate-y-1/2 opacity-70"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 bg-[#0f3460] rounded-full transform translate-x-1/2 translate-y-1/2 opacity-70"></div>
    </div>

    <div class="absolute bottom-8 left-4 flex space-x-2">
        <div class="w-6 h-6 bg-[#1a1a2e] rounded-full cursor-pointer" onclick="setTheme('#1A1A2E', '#FFFFFF', '#0F3460')"></div>
        <div class="w-6 h-6 bg-[#461220] rounded-full cursor-pointer" onclick="setTheme('#461220', '#FFFFFF', '#E94560')"></div>
        <div class="w-6 h-6 bg-[#192A51] rounded-full cursor-pointer" onclick="setTheme('#192A51', '#FFFFFF', '#967AA1')"></div>
    </div>

    <script>
        const setTheme = (background, color, primaryColor) => {
            document.body.style.background = background;
            document.body.style.color = color;
        };
    </script>
</body>
</html>