<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Accommodation;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    
    public function confirm($id)
    {
        $order_detail_info = OrderDetail::where('id', $id)->first();

        $room_info = Room::where('id', $order_detail_info->id)->first();
        $accommodation_info = Accommodation::where('id', $room_info->accommodation_id)->first();
        $order_info = Order::where('order_no', $order_detail_info->order_no)->first();
        $customer_info = Customer::where('id', $order_info->customer_id)->first();

        $order_detail_info->status = 'completed';
        $order_detail_info->update();

        $subject = 'Your booking has been confirmed';
        $message = '<p>Dear <strong>' . $customer_info->name . '</strong>,</p>';
        $message .= '<p>We are delighted to inform you that your booking with booking number: <strong>'.$order_detail_info->order_no . '</strong> at <strong>'. $room_info->room_name . '</strong> of <strong>'. $accommodation_info->name .'</strong> has been approved! Thank you for choosing us for your upcoming stay.</p>';

        $message .= '<p>Your booking has been confirmed, and we are eagerly awaiting your arrival at ' .$accommodation_info->name. '. At Labason Safe Haven, we are dedicated to providing you with a comfortable and memorable experience.</p>';
        $message .= '<p>If you have any special requests or requirements, please feel free to let us know, and we will do our best to accommodate them.</p>';
        $message .= '<p>Once again, thank you for choosing Labason Safe Haven. We look forward to welcoming you and providing you with exceptional hospitality.</p>';
        $message .= 'Warm regards, <br>';
        $message .= '<strong>Celine Lerios</strong> <br>';
        $message .= '<strong>Chief Operating Officer</strong><br>';
        $message .= '<strong>Labason Safe Haven</strong><br>';

        // Get the customer's email address and send the email message
        $customer_email = $customer_info->email;
        Mail::to($customer_email)->send(new WebsiteMail($subject, $message));

        return redirect()->back()->with('success', 'Booking has been confirmed!');
    }

    public function decline($id)
    {
        $order_detail_info = OrderDetail::where('id', $id)->first();

        $room_info = Room::where('id', $order_detail_info->id)->first();
        $accommodation_info = Accommodation::where('id', $room_info->accommodation_id)->first();
        $order_info = Order::where('order_no', $order_detail_info->order_no)->first();
        $customer_info = Customer::where('id', $order_info->customer_id)->first();

        $order_detail_info->status = 'declined';
        $order_detail_info->update();

        $subject = 'Your booking has been declined';
        $message = '<p>Dear <strong>' . $customer_info->name . '</strong>,</p>';
        $message .= '<p>We regret to inform you that there was an issue processing your booking with booking number: <strong>'.$order_detail_info->order_no . '</strong> at <strong>'. $room_info->room_name . '</strong> of <strong>'. $accommodation_info->name .'</strong>. Unfortunately, the reference number provided for the payment method does not match our records.</p>';

        $message .= '<p>To proceed with your booking, please ensure that the reference number provided matches the one associated with your payment transaction. Once you have verified the reference number, please reply to this email with the correct information, or contact our customer support team at <strong>contact@labason.space</strong> for further assistance.</p>';
        $message .= '<p>We apologize for any inconvenience this may have caused and appreciate your prompt attention to this matter. Our team is here to assist you and ensure a smooth booking process.</p>';
        $message .= '<p>Thank you for choosing Labason Safe Haven. We value your trust and look forward to resolving this issue promptly so we can welcome you to our establishment.</p>';
        $message .= 'Warm regards, <br>';
        $message .= '<strong>Celine Lerios</strong> <br>';
        $message .= '<strong>Chief Operating Officer</strong><br>';
        $message .= '<strong>Labason Safe Haven</strong><br>';

        // Get the customer's email address and send the email message
        $customer_email = $customer_info->email;
        Mail::to($customer_email)->send(new WebsiteMail($subject, $message));

        return redirect()->back()->with('success', 'Booking has been declined!');
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
