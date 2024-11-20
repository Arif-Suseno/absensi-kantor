<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::factory()
                    ->count(10)
                    ->create();
    }
}
