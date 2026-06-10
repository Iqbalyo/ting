# Ting Development Journal

## Week 1

- Laravel setup
- Next setup
- Spatie install
- Users migration
- Hotel migration
- RoleSeeder

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