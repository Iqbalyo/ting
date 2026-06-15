# Ting Development Journal

## Week 1
Setup and fondation

- Laravel setup
- Next setup
- Spatie install
- Users migration
- Hotel migration
- RoleSeeder

## Autorization
Current Step:
Review DatabaseSeeder
-Roleseeder sudah di buat dan sudah didaftarkan di user.php

Next bikin AdminUserSeeder,kenapa?karena biasanya kita butuh akun bawaan

Roleseeder -> tugasny membuat admin,partner,customer
AdminUserSeeder -> membuat user admin,jadi One Seeder, One Responsibility,Ini akan terasa manfaatnya ketika project sudah puluhan seeder.
nanti logikanya : adminuserseeder 
1. Buat user admin
2. Cari role admin
3. Assign role admin ke user
4. Tambahkan phone di adminuser,dan daftarkan di databaseSeeder
5. dan test php artisan migrate:fresh
6. Isi PermissionSeeder
7. Bikin RolePersmissionSeeder agar terhubung.
9. selesai bkin fitur admin di rolepermissionseeder
10. daftarkan ke databaseeder dan pastikan berurutan mulai dari
 RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            AdminUserSeeder::class,
            harus berurutan,kalo gk bakalan error

✅ User Table
✅ Hotel Table
✅ Spatie Permission
✅ Roles
✅ Permissions
✅ Role-Permission Mapping
✅ Admin Seeder
✅ User-Role Relation
✅ Authorization Check

## Phase 2 Authentication API
1. Saat user Login,backend memverifikasi email dan pw benar
Setelah login berhasil, bagaimana backend tahu bahwa request berikutnya berasal dari user yang sama??
Nah disinilah Authentication mulai bekerja
Jadi simpleny authentication itu kayak ,siapa kamu?
Yg login atau logout dan lain2

## Kenapa butuh disini kita akan menggunakan Sanctum? 
karena project fe dan be terpisah,
be tidak bisa menggandalkan session seperti Laravel blade

karena itula kita butuh cara mengidentifikasi user antar request API,
dan Sanctum menyediakannya

- Instal Sanctum
cukup dengan composer require laravel/sanctum,udh otomatis install dan publish karena ini salah satu fitur Laravel 13,tidak perlu php artisan sanctum:install

- test migrate:status
- Konfigurasi User model HasApiTokens
- Masuk ke User di model, import trait Laravel\Sanctum\HasApiTokens
- terus masukkan use HasApiTokens di dalam class Authenticatable

Jadi sekarang
- User -> HasRoles(spatie) -> ini namanya authorization -> perannya 'boleh ngapain aja'

dan juga 
- User -> HasApiTokens (Sanctum) -> Authentication -> ibaratkany perannya nanya, 'siapa kamu?'