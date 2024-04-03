<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'pengguna'
        ]);

        Role::create([
            'name' => 'konselor'
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'jujunani20@gmail.com',
            'password' => 123456
        ])->assignRole('admin');
    }
}
