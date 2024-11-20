<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Absensi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absensi>
 */
class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $absnsi = Absensi::class;
    public function definition(): array
    {
        $userIds = User::pluck('id');
        return [
                'user_id' => $userIds->random(),
                'tanggal' => fake()->date(),
                'waktu_masuk' => fake()->time(),
                'waktu_keluar' => fake()->time(),
                'status' => fake()->randomElement(['Hadir','Sakit','Izin','Cuti','Alpa'])
        ];
    }
}
