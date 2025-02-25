<?php

namespace Database\Factories;

use App\Models\Cabang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cabang>
 */
class CabangFactory extends Factory
{
    protected $model = Cabang::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => 'Cabang '.fake()->city(),
            'alamat' => fake()->address(),
            'fasilitas' => 'Outlet',
            'kode' => 'M-'.fake()->randomNumber(6, true),
            'latitude' => fake()->latitude(-7.540167876264023, -7.581008435630235),
            'longitude' => fake()->longitude(110.78164594005521, 110.84002245247045),
        ];
    }
}
