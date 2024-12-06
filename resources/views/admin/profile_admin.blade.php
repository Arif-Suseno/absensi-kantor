<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-lg bg-white rounded-xl shadow-xl p-8 space-y-6">
            <!-- Profile Picture and Header -->
            <div class="text-center">
                <div class="relative inline-block">
                    <!-- Profile Picture -->
                    <img src="{{ Vite::asset('public/images/profile.png') }}" alt="Foto Profil"
                        class="w-40 h-40 rounded-full border-4 border-blue-500 mx-auto object-cover">
                </div>
                <h1 class="text-3xl font-semibold mt-4 text-gray-800">{{ auth()->user()->nama }}</h1>
                <p class="text-gray-500 text-md">{{ auth()->user()->role }}</p>
            </div>

            <hr class="my-6 border-gray-300">

            <!-- Button to toggle details -->
            <div class="text-center">
                <button id="toggleDetailsButton"
                    class="px-4 py-2 rounded-lg bg-blue-500 text-white font-semibold transition-colors duration-300">
                    Details
                </button>
            </div>

            <!-- Detail Information, initially hidden -->
            <div id="detailInfo" class="space-y-4 text-lg mt-4 hidden">
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-700">Email:</span>
                    <span class="text-gray-900">{{ auth()->user()->email }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-700">Gender:</span>
                    <span class="text-gray-900">{{ auth()->user()->gender }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-700">Agama:</span>
                    <span class="text-gray-900">{{ auth()->user()->agama }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-700">TTL:</span>
                    <span class="text-gray-900">{{ auth()->user()->tempat_lahir }},
                        {{ \Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-700">No HP:</span>
                    <span class="text-gray-900">{{ auth()->user()->no_hp }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-700">Alamat:</span>
                    <span class="text-gray-900">{{ auth()->user()->alamat }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle show/hide details -->
    <script>
        document.getElementById('toggleDetailsButton').addEventListener('click', function() {
            var details = document.getElementById('detailInfo');
            var button = document.getElementById('toggleDetailsButton');

            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                button.textContent = 'Hide Details';
                button.classList.replace('bg-blue-500', 'bg-red-500');
            } else {
                details.classList.add('hidden');
                button.textContent = 'Show Details';
                button.classList.replace('bg-red-500', 'bg-blue-500');
            }
        });
    </script>
</x-layout>
