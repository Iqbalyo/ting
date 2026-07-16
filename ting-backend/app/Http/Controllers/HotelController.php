<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HotelService;
use App\Http\Requests\StoreHotelRequest;

class HotelController extends Controller
{
    //
    public function __construct(
        private HotelService $hotelservice
    ) {}

    public function store(StoreHotelRequest $request) 
    {
        //ambil dulu data yg udah divalidasi
        $validated = $request->validated();
        //ambil semua data yg lolos validasi

        //next panggil hotel service
        $hotel = $this->hotelservice->store($request->user(), $validated);

        //$request->user() = ambil user yg sedang login
        //user() bacany panggil method user

        return response()->json([
            'hotel' => $hotel,
        ]);
     
        
    }
}

//dari hotel service lanjut kesini