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
        //next buat data hotel didb

        $validated['owner_id'] = $user->id; //--> ambil id user yg login yg sudah divalidasi
        //next bikin hotelcontroler via terminal

        //nah akhirnya kita nyampe disini,setelah dari file UntukApidanTestLogin,dan next import helper string yakni str,dan tulis sperti berikut

        $validated['slug'] = Str::slug($validated['name']);

        $hotel = Hotel::create($validated);
        //simpan data yg sudah divalidasi ke tabel hotel

        return $hotel;
        //kembalikan hasil hotel yg dibuat
        //jika ngak,maka bakalan null,padahl kan ini tujuan kita ingin mengirim hotel yg dibuat ke fe

    }
}
