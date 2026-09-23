<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;

class RoomService
{
    /**
     * Create a new class instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    public function store(User $user, Hotel $hotel, array $validated)
    {
        if ($user->id !== $hotel->owner_id) {
            abort(403, 'You are not authorized to manage this hotel');
        }

        $validated['hotel_id'] = $hotel->id;

        return Room::create($validated);
    }
}
