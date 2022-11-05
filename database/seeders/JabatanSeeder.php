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
            'jabatan' => 'Dosen',
        ]);

        Jabatan::create([
            'id' => 2,
            'jabatan' => 'Staff',
        ]);

    }
}
