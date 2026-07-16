<?php
namespace App\Services;

use App\Models\Hotel;

class HotelService
{
    public function store(array $validated)
    {
        //next buat data hotel didb

        Hotel::create($validated);
        //simpan data yg sudah divalidasi ke tabel hotel
        
    }
}