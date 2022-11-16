<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'id' => 1,
            'name' => 'Anggota',
        ]);

        Jabatan::create([
            'id' => 2,
            'name' => 'Staff',
        ]);

        Jabatan::create([
            'id' => 3,
            'name' => 'Dosen',
        ]);

    }
}
