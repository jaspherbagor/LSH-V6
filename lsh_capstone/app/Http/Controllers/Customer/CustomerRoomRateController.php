<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use App\Models\RoomRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerRoomRateController extends Controller
{
    // public function booked_rooms()
    // {
    //     $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
    //     $order_details = OrderDetail::where('order_no', $orders)
    //     return view('customer.booked_rooms');
    // }

    public function index()
    {
        $room_rates = RoomRate::where('customer_id', Auth::guard('customer')->user()->id)->get();
        return view('customer.room_review_view', compact('room_rates'));
    }

    public function add_review($id) {
        $room_info = Room::where('id', $id)->first();
        $accommodation_info = Accommodation::where('id', $room_info->accommodation_id)->first();
        return view('customer.room_review_add', compact('room_info', 'accommodation_info'));
    }



}
