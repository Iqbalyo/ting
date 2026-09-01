<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::firstOrCreate(
            [
                'email' => 'admin1@gmail.com',

            ],
            [
                'name' => 'Super admin',
                'phone' => 'null',
                'password' => Hash::make('12345678'),
            ]
        );

        $user->assignRole('admin');
    }
}
