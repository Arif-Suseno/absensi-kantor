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
        ]]);
}
}