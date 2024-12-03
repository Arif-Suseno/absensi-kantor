<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Kontrak;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $user = User::class; 
    public function definition(): array
    {
        $jabatanIds = Jabatan::pluck('id');
        $kontrakIds = Kontrak::pluck('id');
        return [
            'kontrak_id' => $kontrakIds->random(),
            'jabatan_id' => $jabatanIds->random(),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt(fake()->password(8, 12)), 
            'gender' => fake()->randomElement(['Laki-laki','Perempuan']),
            'agama' => fake()->randomElement(['Islam','Kristen','Hindu','Buddha','Katolik','Konghucu']),
            'tanggal_lahir' =>fake()->date(),
            'tempat_lahir' => fake()->city(),
            'no_hp' => fake()-> numerify('083#########'),
            'alamat' => fake()->address(),
            'image'=> fake()->randomElement(['image1.png','image2.png','image3.png']),
            'jam_kerja' => fake()->randomElement(['08:00 - 12.00', '13:00 - 17.00']),
            'role' => fake()->randomElement(['Admin', 'Karyawan']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
