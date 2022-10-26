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
            'jabatan_id' => '1',
            'jabatan' => 'Dosen',
        ]);

        Jabatan::create([
            'jabatan_id' => '2',
            'jabatan' => 'Staff',
        ]);

    }
}
