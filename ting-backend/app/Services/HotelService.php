<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\User;

class HotelService
{
    public function store(User $user, array $validated)

    //     public            | bisa dipanggil dari luar
    // function          | membuat method
    // store             | method menyimpan hotel
    // (User $user,      | menerima object User yang sedang login
    // array $validated) | menerima data yang sudah divalidasi

    {
        //next buat data hotel didb

        $validated['owner_id'] = $user->id; //--> ambil id user yg login yg sudah divalidasi
        //next bikin hotelcontroler via terminal

        $hotel = Hotel::create($validated);
        //simpan data yg sudah divalidasi ke tabel hotel

        return $hotel;
        //kembalikan hasil hotel yg dibuat
        //jika ngak,maka bakalan null,padahl kan ini tujuan kita ingin mengirim hotel yg dibuat ke fe

    }
}
