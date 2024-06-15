<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::where('accommodation_id', Auth::guard('accommodation')->user()->id)->get();
        return view('accommodation.rooms_view', compact('rooms'));
    }
}
