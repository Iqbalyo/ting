<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HotelService;
use App\Http\Requests\StoreHotelRequest;
use App\Models\Hotel;

class HotelController extends Controller
{
    //bikn constructor
    public function __construct(
        private HotelService $hotelService
    ) {}

    public function store(StoreHotelRequest $request) 
    {
        //ambil dulu data yg udah divalidasi
        $validated = $request->validated();
        //ambil semua data yg lolos validasi

        //next panggil hotel service
        $hotel = $this->hotelService->store($request->user(), $validated);

        //$request->user() = ambil user yg sedang login
        //user() bacany panggil method user

        return response()->json([
            'hotel' => $hotel,
        ]);
     
        
    }

    // waktu project disini di jam 9.11 7/31/26
    //next ke hotelservice tambahkan method index
    public function index(Request $request)
    {
        $hotels = $this->hotelService->index($request->user());

        return response()->json([
            'message' => 'Hotels retrieved successfully',
            'data' => $hotels,
        ]);
    }

    public function show(Request $request, Hotel $hotel)
    {
        $hotel = $this->hotelService->show($request->user(), $hotel);

        return response()->json([
            'message' => 'Hotel retrieved succesfully',
            'data' => $hotel,
        ]);

        //next ke hotelservice buat method show
    }
    
}

//dari hotel service lanjut kesini

//sip controller -> service sudah,langkah berikutny ke api.php