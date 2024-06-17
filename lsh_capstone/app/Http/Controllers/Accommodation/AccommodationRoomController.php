<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Amenity;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::where('accommodation_id', Auth::guard('accommodation')->user()->id)->get();
        return view('accommodation.room_view', compact('rooms'));
    }

    // Method to display the form for adding a new room
    public function add()
    {
        // Retrieve accommodation based on the provided accommodation ID
        $accommodation = Accommodation::where('id', Auth::guard('accommodation')->user()->id)->first();

        // Retrieve accommodation type associated with the accommodation
        $accommodation_type = AccommodationType::where('id', $accommodation->accommodation_type_id)->first();

        // Retrieve all amenities from the database
        $all_amenities = Amenity::all();

        // Return the 'accommodation.room_add' view with the accommodation, accommodation type, and amenities data
        return view('accommodation.room_add', compact('all_amenities', 'accommodation', 'accommodation_type'));
    }

    
}
