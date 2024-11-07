    <div class="w-1/5 h-auto bg-gray-300  shadow-md">
        <div class="p-2 text-center text-lg font-bold border-b flex items-center">
            <img src="{{ Vite::asset('public/images/logo3.png') }}" alt="" class="w-10 h-10 rounded-full">
            <h1>GSI</h1>
        </div>
        <ul class="ml-4 mt-2">
            <x-navlink href="/dashboard_admin" :active="request()->is('dashboard_admin')"><i class="fas fa-th-large mr-2"></i>Dashboard Admin</x-navlink>
            <x-navlink href="/manajemen_absensi" :active="request()->is('manajemen_absensi')"><i class="fas fa-calendar-check mr-2"></i>Manajemen Absensi</x-navlink>
            <x-navlink href="/data_karyawan" :active="request()->is('data_karyawan')"><i class="fa-solid fa-users mr-2"></i>Data Karyawan</x-navlink>
            <x-navlink href="/persetujuan_izin&cuti" :active="request()->is('persetujuan_izin&cuti')"><i class="fa-solid fa-envelope mr-2"></i>Persetujuan Izin & Cuti</x-navlink>
            <x-navlink href="/profile_admin" :active="request()->is('pengajuan_izin&cuti')"><i class="fa-solid fa-id-card mr-2"></i>Profile Admin</x-navlink>
        </ul>
        <ul class="ml-4 mt-2">
            <x-navlink href="/dashboard" :active="request()->is('dashboard')"><i class="fas fa-th-large mr-2"></i>Dashboard</x-navlink>
            <x-navlink href="/absensi" :active="request()->is('absensi')"><i class="fas fa-calendar-check mr-2"></i>Absensi</x-navlink>
            <x-navlink href="/riwayat" :active="request()->is('riwayat')"><i class="fa-solid fa-clock-rotate-left mr-2"></i>Riwayat</x-navlink>
            <x-navlink href="/pengajuan_izin&cuti" :active="request()->is('pengajuan_izin&cuti')"><i class="fa-solid fa-envelope mr-2"></i>Pengajuan Izin & Cuti</x-navlink>
            <x-navlink href="/profile_admin" :active="request()->is('pengajuan_izin&cuti')"><i class="fa-solid fa-id-badge mr-2"></i>Profile</x-navlink>
        </ul>
    </div>
