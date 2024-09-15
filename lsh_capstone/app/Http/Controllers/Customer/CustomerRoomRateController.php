<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\RoomRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerRoomRateController extends Controller
{
    public function index()
    {
        $room_rates = RoomRate::where('customer_id', Auth::guard('customer')->user()->id)->get();
        return view('customer.room_review_view', compact('room_rates'));
    }
}
