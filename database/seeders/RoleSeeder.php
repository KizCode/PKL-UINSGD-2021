<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 1,
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        Role::create([
            'id' => 2,
            'name' => 'user',
            'guard_name' => 'web',
        ]);
    }

}
