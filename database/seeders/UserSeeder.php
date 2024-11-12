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
        // Nonaktifkan pengecekan foreign key
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // Truncate tabel users
    DB::table('users')->truncate();

    // Aktifkan kembali pengecekan foreign key
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::factory()->count(20)->create();
}
}