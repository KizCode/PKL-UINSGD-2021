<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithoutEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'level' == 'User',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try {
            $admin = User::create(array_merge([
                'name' => 'admin',
                'email' => 'adminuin@gmail.com',
                'password' => bcrypt('12345678'),
            ], $default_user_value));

            $main = User::create(array_merge([
                'name' => 'main',
                'email' => 'main@gmail.com',
                'password' => bcrypt('12345678'),
            ], $default_user_value));

            $role_admin = Role::create(['name' => 'admin']);
            $role_admin = Role::create(['name' => 'main']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $admin->assignRole('admin');
            $main->assignRole('main');

            DB::commit();

        } catch (\Throwable$th) {
            DB::rollback();
        }

    }
}
