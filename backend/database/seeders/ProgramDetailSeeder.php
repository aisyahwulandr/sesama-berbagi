<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Import class Seeder
use App\Models\ProgramDetail; // Import model ProgramDetail

class ProgramDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramDetail::create([
            'cover_image' => 'https://via.placeholder.com/800x400',
            'title' => 'Bantuan Pendidikan',
            'description' => 'Membantu anak-anak kurang mampu mendapatkan pendidikan.',
            'fundraiser_name' => 'Yayasan Pendidikan Harapan',
            'fundraiser_organization' => 'Yayasan Pendidikan Indonesia',
            'status' => 'Sedang Berlangsung',
        ]);
    }
}
