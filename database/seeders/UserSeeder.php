<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Administrator', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'role' => UserRole::Administrator->value]);
        User::create(['name' => 'Security Officer', 'email' => 'securityofficer@example.com', 'password' => Hash::make('password'), 'role' => UserRole::SecurityOfficer->value]);
        User::factory()
            ->count(8)
            ->create(['role' => UserRole::Reporter->value]);
    }
}
