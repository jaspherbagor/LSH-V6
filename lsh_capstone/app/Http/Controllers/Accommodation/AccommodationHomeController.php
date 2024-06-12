<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationRate;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationHomeController extends Controller
{
    public function index()
    {
        // Retrieve accommodation info for the authenticated user
        $accommodation_info = Accommodation::where('id', Auth::guard('accommodation')->user()->id)->first();

        $total_completed_orders = 0;
        $total_pending_orders = 0;
        $recent_orders = collect();

        if ($accommodation_info) {
            // Retrieve rooms for the accommodation
            $room_infos = Room::where('accommodation_id', $accommodation_info->id)->get();

            // Initialize collections to gather order details
            $order_detail_infos = collect();

            // Collect all order details associated with the rooms
            foreach ($room_infos as $room_info) {
                $order_detail_infos = $order_detail_infos->merge(OrderDetail::where('room_id', $room_info->id)->get());
            }

            // Collect all order numbers
            $order_nos = $order_detail_infos->pluck('order_no')->unique();

            if ($order_nos->isNotEmpty()) {
                // Retrieve the total count of completed orders
                $total_completed_orders = Order::where('status', 'Completed')
                                            ->whereIn('order_no', $order_nos)
                                            ->where('remark', 'active')
                                            ->count();

                // Retrieve the total count of pending orders
                $total_pending_orders = Order::where('status', 'Pending')
                                            ->whereIn('order_no', $order_nos)
                                            ->where('remark', 'active')
                                            ->count();

                // Retrieve the 5 most recent completed orders
                $recent_orders = Order::whereIn('order_no', $order_nos)
                                    ->where('status', 'Completed')
                                    ->where('remark', 'active')
                                    ->orderBy('id', 'desc')
                                    ->take(5)
                                    ->get();
            }
        }

        // Now $total_completed_orders, $total_pending_orders, and $recent_orders are safely set and can be used


        // Retrieve the total count of reviews (accommodation rates) submitted by the authenticated customer
        $total_reviews = AccommodationRate::where('accommodation_id', Auth::guard('accommodation')->user()->id)
                                        ->where('remark', 'active')
                                        ->count();

        return view('accommodation.home', compact('total_completed_orders', 'total_pending_orders', 'recent_orders', 'total_reviews'));
    }
}
