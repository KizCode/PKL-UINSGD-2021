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


        $admin = User::create(array_merge([
            'nip' => '2 ',
            'name' => 'admin',
            'level' => 'Admin',
            'email' => 'adminuin@role.test',
            'password' => bcrypt('12345678'),
        ]));

        $user = User::create(array_merge([
            'nip' => '12345678901',
            'name' => 'user',
            'level' => 'User',
            'email' => 'useruin@role.test',
            'password' => bcrypt('12345678'),
        ]));

        $user->assignRole('user');
        $admin->assignRole('admin');

    }
}
