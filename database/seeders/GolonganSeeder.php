<?php

namespace Database\Seeders;

use App\Models\Golongan; #
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Golongan::create([
            'gol' =>  'IA',
            'name' => 'Juru Muda',

        ]);

        Golongan::create([
            'gol' => 'IB',
            'name' => 'Juru Muda Tingkat 1',
        ]);

        Golongan::create([
            'gol' => 'IC',
            'name' => 'Juru',
        ]);

        Golongan::create([
            'gol' => 'ID',
            'name' => 'Juru Tingkat 1',
        ]);

        Golongan::create([
            'gol' => 'IIA',
            'name' => 'Pengatur Muda',
        ]);

        Golongan::create([
            'gol' => 'IIB',
            'name' => 'Pengatur Muda Tingkat 1',
        ]);

        Golongan::create([
            'gol' => 'IIC',
            'name' => 'Pengatur',
        ]);

        Golongan::create([
            'gol' => 'IID',
            'name' => 'Pengatur Tingkat 1',
        ]);

        Golongan::create([
            'gol' => 'IIIA',
            'name' => 'Penata Muda',
        ]);

        Golongan::create([
            'gol' => 'IIIB',
            'name' => 'Penata Muda Tingkat 1',
        ]);

        Golongan::create([
            'gol' => 'IIIC',
            'name' => 'Penata',
        ]);

        Golongan::create([
            'gol' => 'IIID',
            'name' => 'Penata Tingkat 1',
        ]);

        Golongan::create([
            'gol' =>'IVA',
            'name' => 'Pembina',
        ]);

        Golongan::create([
            'gol' =>'IVB',
            'name' => 'Pembina Tingkat1',
        ]);

        Golongan::create([
            'gol' =>'IVC',
            'name' => 'Pembina Utama Muda',
        ]);

        Golongan::create([
            'gol' =>'IVD',
            'name' => 'Pembina Utama Madya',
        ]);

        Golongan::create([
            'gol' =>'IVE',
            'name' => 'Pembina Utama',
        ]);

    }

}
