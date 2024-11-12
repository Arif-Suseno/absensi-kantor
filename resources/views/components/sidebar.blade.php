<div class="sidebar hidden">
    {{-- Link yang berasal component navlink --}}
    <ul class="flex flex-col justify-items-center self-center w-2/2 h-full bg-gray-300 absolute">
        <x-navlink href="/dashboard_admin" :active="request()->is('dashboard_admin')">Dashboard Admin</x-navlink>
        <x-navlink href="/manajemen_absensi" :active="request()->is('manajemen_absensi')">Manajemen Absensi</x-navlink>
        <x-navlink href="/data_karyawan" :active="request()->is('data_karyawan')">Data Karyawan</x-navlink>
        <x-navlink href="/persetujuan_izin&cuti" :active="request()->is('persetujuan_izin&cuti')">Persetujuan Izin & Cuti</x-navlink>
        <x-navlink href="/profile_admin" :active="request()->is('pengajuan_izin&cuti')">Profile Admin</x-navlink>
        <x-navlink href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-navlink>
        <x-navlink href="/absensi" :active="request()->is('absensi')">Absensi</x-navlink>
        <x-navlink href="/riwayat" :active="request()->is('riwayat')">Riwayat</x-navlink>
        <x-navlink href="/pengajuan_izin&cuti" :active="request()->is('pengajuan_izin&cuti')">Pengajuan Izin & Cuti</x-navlink>
        <x-navlink href="/profile_admin" :active="request()->is('pengajuan_izin&cuti')">Profile</x-navlink>
    </ul>
</div>
