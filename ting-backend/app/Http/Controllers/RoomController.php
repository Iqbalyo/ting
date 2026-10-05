<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest; 
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Services\RoomService;
use Illuminate\Http\JsonResponse;
use JsonException;

class RoomController extends Controller
{
    //
    public function __construct(protected RoomService $roomService)
    {
        
    }

    public function store(StoreRoomRequest $request, Hotel $hotel) : JsonResponse
    {
        $room = $this->roomService->store(
            $request->user(),
            $hotel,
            $request->validated(),
        );

        return response()->json([
            'message' => 'Room created successfully',
            'data' => $room,
        ], 201);
    }

    public function index(Hotel $hotel): JsonResponse
    {
        $rooms = $this->roomService->index($hotel);
        return response()->json([
            'message' => "Rooms retrieved successfully",
            'data' => $rooms,
        ], 200);
    }
}
