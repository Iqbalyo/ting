<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo([
            'hotel.view',
            'hotel.create',
            'hotel.update',
            'hotel.delete',

            'user.view',
            'user.create',
            'user.update',
            'user.delete',

            'booking.view',
            'booking.create',
             'booking.update',
             'booking.cancel',
        ]);

        $partnerRole = Role::findByName('partner');
        $partnerRole->givePermissionTo([
            'hotel.view',
            'hotel.create',
            'hotel.update',
            
            'booking.view'
        ]);

        $customerRole = Role::findByName('customer');
        $customerRole->givePermissionTo([
            'hotel.view',

            'booking.view',
            'booking.create',
            'booking.cancel',
        ]);
    }
}
