<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $coach = Role::create(['name' => 'coach']);
        $member = Role::create(['name' => 'member']);

        $user = User::create([
            'name' => 'Admin SC Kimia',
            'email' => 'admin@sckimia.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($admin);
    }
}
