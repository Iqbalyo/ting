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

Next LOGIN API
Flow :
saat user mengirimkan
{
    "email": "admin1@gmail.com",
    "password": "12345678"
}

be akan melakukan
- menerima request-> validasi input->cari user berdasarkan email->verifikasi pw->generate token sanctum-> return user + token

Frontend
    │
    ▼
POST /api/login
    │
    ▼
Laravel
    │
    ├── cek email
    ├── cek password
    ├── create token
    │
    ▼
Response

kita menggunakan struktur
validation->form request
bisnis logic-> service layer

biar ringan dan tidak berantakan dan fokus ke tugas masing2

misal
loginrequest -> validasi input seperti email dll

AuthService -> proses login -> cari user berdasarkan email dll

AuthController -> menerima request dll

Next 
 bikin LoginRequest karena,
 Request masuk
↓
Validasi dulu
↓
Baru business logic

kamudian tambahkan validasi email dan pw di LoginRequest

Next bikin Service di folder
app/Service/AuthService.php

- Menggapa kita menggunakan service layer? 
    1. biar ringan,jika banyak function,dan kita tidak tau kedepan apakah dia bertambah,tentu akan makin banyak baris yg dibuat dan hal itu kurang efektif dan efesien
    2. Jadi service adalah tempat bisnis logic dan controller hanya melakukan panggilan dan mengembalikan hasilnya

Jika sudah bikin file AuthService,ksongin aja dulu ,kita bikin AuthController dulu .Kenapa ? Karena kita lagi membangun aplikasi dari luar ke dalam.

biar kita bisa lihat alurnya,jadi biar ngak2 lompat2
alur yg dimaksud adlah
Client
   ↓
Route
   ↓
Controller
   ↓
Service
   ↓
Response


Setelah bikin AuthController,langusng import dependencies injection untuk AuthService

Service Container
        │
        ▼
new AuthService()
        │
        ▼
Disuntikkan ke Controller

mulai bikin bisnis logic di authservice,dimulai dari 

dimulai dari login,Hash password serta response

jadi flow nya
User kirim email + password
        ↓
LoginRequest (validasi)
        ↓
AuthService
        ↓
Cari user
        ↓
Cek password (Hash::check)
        ↓
Generate token (Sanctum)
        ↓
Return user + token
        ↓
Frontend simpan token

kenapa kita menuliskan 
'user' => $user,
'token' => $token,

karena token untuk auth,jika hanya token front end ngak tau userny siapa,nama,roleny ngapain
front end tau dari nama user dari mana?ya dari user,makany kita juga perlu bkin user

lanjut route
ingat route bukan hanya url,ia adalah endpoint,method,middleware,siapa saja yg boleh masuk dan controler mana yg di pangil

dilogin kita tidak membtuhkan  auth:sanctum karena,kalo dikasih middleware auth santcum,nantinya,harus punyatoken,padahal token belum dibuat,gimana mau login?  
