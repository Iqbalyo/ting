<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Str; // ini buat ngelola string,ini disebut helper

class HotelService
{
    public function store(User $user, array $validated)

    //     public            | bisa dipanggil dari luar
    // function          | membuat method
    // store             | method menyimpan hotel
    // (User $user,      | menerima object User yang sedang login
    // array $validated) | menerima data yang sudah divalidasi
    {
        // next buat data hotel didb

        $validated['owner_id'] = $user->id; // --> ambil id user yg login yg sudah divalidasi
        // next bikin hotelcontroler via terminal

        // nah akhirnya kita nyampe disini,setelah dari file UntukApidanTestLogin,dan next import helper string yakni str,dan tulis sperti berikut

        $validated['slug'] = Str::slug($validated['name']);

        $hotel = Hotel::create($validated);
        // simpan data yg sudah divalidasi ke tabel hotel

        return $hotel;
        // kembalikan hasil hotel yg dibuat
        // jika ngak,maka bakalan null,padahl kan ini tujuan kita ingin mengirim hotel yg dibuat ke fe

    }

    // selesai dari // waktu project disini di jam 9.11 7/31/26
    public function index(User $user)
    {
        return $user->hotels()->get();
    }

    // hari selasa 8/4/26 11:23
    // next coba endpoint get di postman untuk melihat apakah data hotel berhasil disimpan,yakni di url api/auth/hotels
    // jika berhasil fitur read selesai skrg masuk ke fitur read detail,karena nanti hotel bisa dilihat detailny

    // 8/4/26
    // next kembali ke api.php

    // 8/4/26 14:44 WIB

    public function show(User $user, Hotel $hotel)
    {
        if ($user->id !== $hotel->owner_id) {
            abort(403, 'You are not authorized to access this hotel.');
        }

        return $hotel;

        // kemudian coba test di postman,api auth hotels/{hotel}

        // liat aja di datase idny

    }

    // kemudian dari controller bagian update,kesini 8/11/26 2.34
    public function update(User $user, Hotel $hotel, array $validated)
    {

        if ($user->id !== $hotel->owner_id) {
            abort(403, 'You are not authorized to access this hotel.');
        }
        if (isset($validated['name'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $hotel->update($validated);

        return $hotel;
    }

    public function destroy(User $user, Hotel $hotel)
    {
        if ($user->id !== $hotel->owner_id) {
            abort(403, 'You are not authorized to acces this hotel');
        }
        $hotel->delete();
    }
}
