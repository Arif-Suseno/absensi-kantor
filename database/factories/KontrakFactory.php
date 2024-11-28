<?php

namespace Database\Factories;

use App\Models\Kontrak;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kontrak>
 */
class KontrakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $kontrak = Kontrak::class; 
    public function definition(): array
    {
        return [
            "nama" => fake()->randomElement(['Permanen','Kontrak Sementara', 'Kontrak Magang',]),
            "jenis_kontrak" => fake()->randomElement(['Permanen', 'Sementara', 'Magang']),
            'durasi_kontrak' => fake()->randomElement([3,6,12,24,null]),
            "tanggal_mulai" => fake()->date(),
            "tanggal_selesai" => fake()->optional()->date(),
            "deskripsi" => fake()->sentence()
        ];
    }
}
