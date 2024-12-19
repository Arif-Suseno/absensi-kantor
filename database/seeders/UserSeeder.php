<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     // Nonaktifkan pengecekan foreign key
    // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // // Truncate tabel users
    // DB::table('users')->truncate();

    // // Aktifkan kembali pengecekan foreign key
    // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    //     User::factory()->count(20)->create();

        DB::table('users')->insert([
            [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Arif Suseno',
            'email' => 'arifsuseno@gmail.com',
            'password' => bcrypt('123456') ,
            'role' => 'Admin'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Seno',
            'email' => 'seno@gmail.com',
            'password' => bcrypt('654321'),            
            'role' => 'Karyawan'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Aditya',
            'email' => 'a6r@gmail.com',
            'password' => bcrypt('000000') ,
            'role' => 'Admin'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Ditya',
            'email' => 'R9@gmail.com',
            'password' => bcrypt('111111') ,
            'role' => 'Admin'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Fani',
            'email' => 'fani@gmail.com',
            'password' => bcrypt('123456') ,
            'role' => 'Admin'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Peni',
            'email' => 'peni@gmail.com',
            'password' => bcrypt('280906') ,
            'role' => 'Karyawan'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Dey',
            'email' => 'dey@gmail.com',
            'password' => bcrypt('170706') ,
            'role' => 'Admin'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Dea',
            'email' => 'dea@gmail.com',
            'password' => bcrypt('170706') ,
            'role' => 'Karyawan'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Daffa halim',
            'email' => 'dap@gmail.com',
            'password' => bcrypt('dap123') ,
            'role' => 'Admin'
        ],
        [
            'jabatan_id' => '1',
            'kontrak_id' => '1',
            'nama' => 'Halim',
            'email' => 'lim@gmail.com',
            'password' => bcrypt('lim123') ,
            'role' => 'Karyawan'
        ],
    ]);
}
}