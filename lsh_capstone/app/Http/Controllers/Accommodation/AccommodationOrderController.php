<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class AccommodationOrderController extends Controller
{
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
