    <div class="w-1/5 h-screen bg-gray-300  shadow-md">
        <div class="p-2 text-center text-lg font-bold border-b flex items-center">
            <img src="{{ Vite::asset('public/images/logo3.png') }}" alt="" class="w-10 h-10 rounded-full">
            <h1>GSI</h1>
        </div>
        <ul class="ml-4 mt-2">
            <x-navlink href="/dashboard_admin" :active="request()->is('dashboard_admin')">Dashboard Admin</x-navlink>
            <x-navlink href="/manajemen_absensi" :active="request()->is('manajemen_absensi')">Manajemen Absensi</x-navlink>
            <x-navlink href="/data_karyawan" :active="request()->is('data_karyawan')">Data Karyawan</x-navlink>
            <x-navlink href="/persetujuan_izin&cuti" :active="request()->is('persetujuan_izin&cuti')">Persetujuan Izin & Cuti</x-navlink>
            <x-navlink href="/profile_admin" :active="request()->is('pengajuan_izin&cuti')">Profile Admin</x-navlink>
        </ul>
        <ul class="ml-4 mt-2">
            <x-navlink href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-navlink>
            <x-navlink href="/absensi" :active="request()->is('absensi')">Absensi</x-navlink>
            <x-navlink href="/riwayat" :active="request()->is('riwayat')">Riwayat</x-navlink>
            <x-navlink href="/pengajuan_izin&cuti" :active="request()->is('pengajuan_izin&cuti')">Pengajuan Izin & Cuti</x-navlink>
            <x-navlink href="/profile_admin" :active="request()->is('pengajuan_izin&cuti')">Profile</x-navlink>
        </ul>
    </div>
