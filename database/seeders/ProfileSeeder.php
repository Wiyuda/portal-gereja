<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::create([
            'nama' => 'HKBP BETHEL RESORT PADANG BULAN DISTRIK X-MA',
            'tahun' => 2012,
            'pendiri' => 'Pendiri',
        ]);
    }
}
