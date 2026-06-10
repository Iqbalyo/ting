<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
      $user = User::firstOrCreate (
        [
            'email' => 'admin1@gmail.com',
          
        ],
        [
            'name' => 'Super admin',
            'phone' => 'null',
            'password' => Hash::make('12345678')
        ]
        );

        $user->assignRole('admin');
    }
}
