<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Berita::factory(100)->create();

        /*
        \App\Models\Konfig::factory()->create([
            'logo' => fake()->imageUrl(),
            'favicon' => fake()->imageUrl(),
            'nama_website' => 'Company, Inc.',
            'judul' => fake()->sentence(5),
            'subjudul' => fake()->paragraph(),
            'gambar_visi' => fake()->imageUrl(),
            'visi_misi' => fake()->paragraph(),
            'telepon' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'alamat ' =>  fake()->address(),
            'profil' => fake()->paragraph(5),
            'breadcrumb' => fake()->imageUrl(),
        ]); */

        \App\Models\Cabang::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
