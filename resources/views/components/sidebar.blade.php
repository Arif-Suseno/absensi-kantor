<div class="sidebar hidden">
    {{-- Link yang berasal component navlink --}}
    <ul class="flex flex-col gap-2 w-8/12 h-full bg-gray-300 absolute md:w-4/12 lg:w-3/12 xl:w-2/12">
        <x-navlink href="/dashboard" :active="request()->is('dashboard_admin')"><i class="fas fa-th-large px-2"></i> Dashboard
            Admin</x-navlink>
        <x-navlink href="/manajemen_absensi" :active="request()->is('manajemen_absensi')"><i class="fas fa-calendar-check px-2"></i>Manajemen
            Absensi</x-navlink>
        <x-navlink href="/data_karyawan" :active="request()->is('data_karyawan')"><i class="fa-solid fa-users px-2"></i>Data Karyawan</x-navlink>
        <x-navlink href="/jabatan" :active="request()->is('jabatan')"><i class="fa-solid fa-user-tie px-2"></i>
            Jabatan</x-navlink>
        <x-navlink href="/kontrak" :active="request()->is('kontrak')"><i class="fa-solid fa-file-contract px-2"></i>
            Kontrak</x-navlink>
        <x-navlink href="/persetujuan_izin&cuti" :active="request()->is('persetujuan_izin&cuti')"><i class="fa-solid fa-envelope px-2"></i> Persetujuan
            Izin & Cuti</x-navlink>
        <x-navlink href="/profile_admin" :active="request()->is('pengajuan_izin&cuti')"><i class="fa-solid fa-id-card px-2"></i> Profile
            Admin</x-navlink>
        <x-navlink href="/dashboard_karyawan" :active="request()->is('dashboard')"><i class="fas fa-th-large px-2"></i>Dashboard</x-navlink>
        <x-navlink href="/absensi" :active="request()->is('absensi')"><i class="fas fa-calendar-check px-2"></i>Absensi</x-navlink>
        <x-navlink href="/riwayat" :active="request()->is('riwayat')"><i
                class="fa-solid fa-clock-rotate-left px-2"></i>Riwayat</x-navlink>
        <x-navlink href="/pengajuan_izin&cuti" :active="request()->is('pengajuan_izin&cuti')"><i class="fa-solid fa-envelope px-2"></i>Pengajuan
            Izin & Cuti</x-navlink>
        <x-navlink href="/profile" :active="request()->is('profile')"><i class="fa-solid fa-id-badge px-2"></i>Profile</x-navlink>
    </ul>
</div>
