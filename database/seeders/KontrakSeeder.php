<?php

namespace Database\Seeders;

use App\Models\Kontrak;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KontrakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Atasi error
        // DB::table('kontrak')->truncate();
        // Menambah data lewat factory
        Kontrak::factory()
                ->count(10)
                ->create();
    }
}
