<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationOrderController extends Controller
{
    public function orders()
    {
       // Get the logged-in accommodation ID
        $accommodation_id = Auth::guard('accommodation')->user()->id;

        // Retrieve the room IDs belonging to this accommodation
        $room_ids = Room::where('remark', 'active')->where('accommodation_id', $accommodation_id)->pluck('id');

        // Retrieve the order details for these rooms
        $order_details = OrderDetail::whereIn('room_id', $room_ids)->where('remark', 'active')->get();

        return view('accommodation.orders', compact('order_details'));
    } 


    public function pending_orders()
    {
       // Get the logged-in accommodation ID
        $accommodation_id = Auth::guard('accommodation')->user()->id;

        // Retrieve the room IDs belonging to this accommodation
        $room_ids = Room::where('remark', 'active')->where('accommodation_id', $accommodation_id)->pluck('id');

        // Retrieve the order details for these rooms
        $pending_orders = OrderDetail::whereIn('room_id', $room_ids)->where('status', 'pending')->where('remark', 'active')->get();

        return view('accommodation.pending_orders', compact('pending_orders'));
    } 







    // Method to display an invoice for a specific order
    public function invoice($id)
    {
        // Retrieve the order data based on the provided order ID
        $order = Order::where('id', $id)->first();

        // Retrieve the order details associated with the order ID
        $order_detail = OrderDetail::where('order_id', $id)->get();

        // Retrieve the customer data associated with the order
        $customer_data = Customer::where('id', $order->customer_id)->first();

        // Return the 'admin.invoice' view with the order, order details, and customer data
        return view('accommodation.invoice', compact('order', 'order_detail', 'customer_data'));
    }
}
