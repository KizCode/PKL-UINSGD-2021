<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = User::updateOrCreate(array_merge([
            'nip' => '2',
            'name' => 'admin',
            'jabatan_id' => 1,
            'golongan_id' => 1,
            'level' => 'Admin',
            'email' => 'adminuin@role.test',
            'password' => bcrypt('12345678'),
        ]));

        $user = User::updateOrCreate(array_merge([
            'nip' => '12345678901',
            'name' => 'user',
            'jabatan_id' => 2,
            'golongan_id'=> 2,
            'level' => 'User',
            'email' => 'useruin@role.test',
            'password' => bcrypt('12345678'),
        ]));

        $user->assignRole('user');
        $admin->assignRole('admin');

    }
}
