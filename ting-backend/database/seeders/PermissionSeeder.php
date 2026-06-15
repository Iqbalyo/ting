<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //penulisan berikut bakalan error,karena kita gk perlu Variable $hotel,karena kita gk buat object hotelyg kita buat adalah record ditabel,jadi tidak perlu nyimpan hasillny ke variabel
        // $hotel = Permission::firstOrCreate([
        //     'name' => 'hotel.view'
        // ]);
        //jadi yg benar seperti berikut

        Permission::firstOrCreate([
            'name' => 'hotel.view'
        ]);

        Permission::firstOrCreate([
            'name' => 'hotel.create'
        ]);

        Permission::firstOrCreate([
            'name' => 'hotel.update'
        ]);

        Permission::firstOrCreate([
            'name' => 'hotel.delete'
        ]);

        //
        Permission::firstOrCreate([
            'name' => 'user.view'
        ]);
        Permission::firstOrCreate([
            'name' => 'user.create'
        ]);
        Permission::firstOrCreate([
            'name' => 'user.update'
        ]);
        Permission::firstOrCreate([
            'name' => 'user.delete'
        ]);
        //

        Permission::firstOrCreate([
            'name' => 'booking.view'
        ]);
        Permission::firstOrCreate([
            'name' => 'booking.create'
        ]);
        Permission::firstOrCreate([
            'name' => 'booking.update'
        ]);
        Permission::firstOrCreate([
            'name' => 'booking.cancel'
        ]);
    }
}
