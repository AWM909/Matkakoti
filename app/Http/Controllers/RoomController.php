<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        return view('rooms.index', ['rooms' => Room::orderBy('number')->get()]);
    }

    public function prices()
    {
        $types = Room::selectRaw('private_toilet, count(*) as total, min(price_per_night) as price')
            ->groupBy('private_toilet')
            ->orderByDesc('private_toilet')
            ->get();

        return view('rooms.prices', ['types' => $types]);
    }
}
