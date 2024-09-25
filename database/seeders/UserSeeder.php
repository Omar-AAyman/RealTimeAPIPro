<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([

            'first_name' => 'Admin',
            'last_name' => 'test',
            'email' => 'admin@admin.com',
            'gender' => 'male',
            'role' => 'super admin',
            'birth_date' => '1999-08-10',
            'status' => 'active',
            'password' => Hash::make('admin@1234'),
        ]);
        $user->assignRole('super admin');
    }
}
