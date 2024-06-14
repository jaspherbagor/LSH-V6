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


    public function declined_orders()
    {
       // Get the logged-in accommodation ID
        $accommodation_id = Auth::guard('accommodation')->user()->id;

        // Retrieve the room IDs belonging to this accommodation
        $room_ids = Room::where('remark', 'active')->where('accommodation_id', $accommodation_id)->pluck('id');

        // Retrieve the order details for these rooms
        $declined_orders = OrderDetail::whereIn('room_id', $room_ids)->where('status', 'declined')->where('remark', 'active')->get();

        return view('accommodation.declined_orders', compact('declined_orders'));
    } 


    public function completed_orders()
    {
       // Get the logged-in accommodation ID
        $accommodation_id = Auth::guard('accommodation')->user()->id;

        // Retrieve the room IDs belonging to this accommodation
        $room_ids = Room::where('remark', 'active')->where('accommodation_id', $accommodation_id)->pluck('id');

        // Retrieve the order details for these rooms
        $completed_orders = OrderDetail::whereIn('room_id', $room_ids)->where('status', 'completed')->where('remark', 'active')->get();

        return view('accommodation.completed_orders', compact('completed_orders'));
    } 







    // Method to display an invoice for a specific order
    public function invoice($id)
    {

        // Retrieve the order details associated with the order ID
        $order_detail = OrderDetail::where('id', $id)->first();

        //dd($order_detail);
        $order_detail_info = $order_detail->pluck('id');

        $order = Order::where('order_no', $order_detail->order_no)->first();

        // Retrieve the customer data associated with the order
        $customer_data = Customer::where('id', $order->customer_id)->first();

        // Return the 'admin.invoice' view with the order, order details, and customer data
        return view('accommodation.invoice', compact('order', 'order_detail', 'customer_data'));
    }
}
