<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmail = 'admin@lmao.com';
        $adminName = 'Atmin loh yah';
        $adminPassword = 'password';
        $coachEmail = 'coach@gmail.com';
        $coachName = 'Coach';
        $coachPassword = 'password';

        $admin = User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => $adminName,
                'password' => Hash::make($adminPassword),
            ]
        );

        $admin->syncRoles(['admin']);

        $coach = User::firstOrCreate(
            ['email' => $coachEmail],
            [
                'name' => $coachName,
                'password' => Hash::make($coachPassword),
            ]
        );

        $coach->syncRoles(['coach']);
    }
}
