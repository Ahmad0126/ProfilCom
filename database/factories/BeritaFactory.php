<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul = fake()->unique()->realText(50);
        $user = User::inRandomOrder()->get()->first();
        $kategori = Kategori::inRandomOrder()->get()->first();
        return [
            'judul' => $judul,
            'keterangan' => fake()->realText(1000),
            'id_kategori' => $kategori->id,
            'id_user' => $user->id,
            'slug' => Str::of($judul)->slug('-'),
            'gambar' => 'upload/konten/default.jpg',
            'tanggal' => fake()->dateTimeBetween('-10 years')->format('Y-m-d'),
        ];
    }
}
