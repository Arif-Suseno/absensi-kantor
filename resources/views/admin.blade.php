<!DOCTYPE html>
<html>
<head>
    <title>Absensi Wajah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white h-screen shadow-md">
            <div class="p-4 text-center text-lg font-bold border-b">
                Absensi Wajah
            </div>
            <ul class="mt-4">
                <li class="p-4 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-th-large mr-2"></i>
                    Home
                </li>
                <li class="p-4 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-calendar-check mr-2"></i>
                    Absensi
                </li>
                <li class="p-4 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-user-graduate mr-2"></i>
                    Karyawan
                </li>
                <li class="p-4 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-database mr-2"></i>
                    Admin
                    <ul class="ml-6 mt-2">
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Dashboard Admin</li>
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Manajemen Absensi</li>
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Data Karyawan</li>
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Pengajuan Izin/Cuti</li>
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Profil Karyawan</li>
                    </ul>
                </li>
                <li class="p-4 hover:bg-gray-200 cursor-pointer">
                    <i class="fas fa-file-alt mr-2"></i>
                    Karyawan
                    <ul class="ml-6 mt-2">
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Dashboard Karyawan</li>
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Absensi Harian</li>
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Riwayat Absensi</li>
                        <li class="p-2 hover:bg-gray-200 cursor-pointer">Pengajuan Izin/Cuti</li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="text-2xl font-bold">
                    Selamat Datang admin Di Aplikasi Absensi Wajah SMKN1 SINTUK TOBOH GADANG
                </div>
                <div class="flex items-center">
                    <div class="mr-4">Management Menu</div>
                    <div class="bg-blue-500 text-white px-4 py-2 rounded">Home</div>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow-md mb-6">
                <div class="flex justify-between items-center mb-4">
                    <div>Klik Proses Presensi untuk melakukan Presensi Wajah</div>
                    <div class="flex">
                        <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded mr-2">Buat Database Wajah</button>
                        <button class="bg-purple-500 text-white px-4 py-2 rounded">Proses Presensi</button>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-red-100 p-4 rounded shadow-md text-center">
                        <i class="fas fa-calendar-day text-red-500 text-2xl mb-2"></i>
                        <div class="text-lg font-bold">Presensi Hari ini</div>
                        <div class="text-2xl font-bold">0</div>
                        <div>Dari Total 3 Siswa</div>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded shadow-md text-center">
                        <i class="fas fa-chalkboard text-yellow-500 text-2xl mb-2"></i>
                        <div class="text-lg font-bold">Total Data Kelas</div>
                        <div class="text-2xl font-bold">3</div>
                        <div>kelas tersedia</div>
                    </div>
                    <div class="bg-green-100 p-4 rounded shadow-md text-center">
                        <i class="fas fa-user-graduate text-green-500 text-2xl mb-2"></i>
                        <div class="text-lg font-bold">Data Siswa</div>
                        <div class="text-2xl font-bold">3</div>
                        <div>Keseluruhan Siswa</div>
                    </div>
                    <div class="bg-purple-100 p-4 rounded shadow-md text-center">
                        <i class="fas fa-chalkboard-teacher text-purple-500 text-2xl mb-2"></i>
                        <div class="text-lg font-bold">Data Guru</div>
                        <div class="text-2xl font-bold">2</div>
                        <div>Keseluruhan Guru</div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow-md">
                <div class="flex">
                    <img alt="Students in a classroom with computers" class="w-1/2 rounded mr-4" src="https://storage.googleapis.com/a1aa/image/T1NzSsBlkVKIAFf1e5PDsfQOe32cmr03hGx1HhzO22Zi1UmOB.jpg" />
                    <div>
                        <div class="text-lg font-bold mb-2">Detail Informasi Data Pelajaran</div>
                        <div class="text-2xl font-bold mb-2">Jumlah Mata Pelajaran</div>
                        <div class="text-5xl font-bold mb-2">5</div>
                        <div class="text-2xl font-bold">Tahun Ajaran</div>
                        <div class="text-5xl font-bold">2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
