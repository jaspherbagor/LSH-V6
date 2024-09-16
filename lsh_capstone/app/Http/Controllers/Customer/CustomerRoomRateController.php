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

    // Method to handle form submission for adding a new review
    public function review_store(Request $request, $id)
    {
        // Validate the request data for review heading, rate, and review description
        $request->validate([
            'review_heading' => 'required', // Review heading is required
            'rate' => 'required', // Rate is required
            'review_description' => 'required' // Review description is required
        ]);

        // Create a new RoomRate object and populate its fields
        $review_data = new RoomRate();
        $review_data->customer_id = Auth::guard('customer')->user()->id; // Set the authenticated customer ID
        $review_data->room_id = $id; // Set the accommodation ID
        $review_data->rate = $request->rate; // Set the rate
        $review_data->review_heading = $request->review_heading; // Set the review heading
        $review_data->review_description = $request->review_description; // Set the review description
        $review_data->save(); // Save the new review data to the database

        // Redirect back with a success message indicating that the review was submitted successfully
        return redirect()->back()->with('success', 'Review for room has been submitted successfully!');
    }

    // Method to display the form for editing a specific review
    public function review_edit($id)
    {
        // Retrieve the review data for the specific accommodation based on the ID
        $review_data = RoomRate::where('id', $id)->first();
        
        // Render the 'customer.review_edit' view and pass the review data to it
        return view('customer.room_review_edit', compact('review_data'));
    }

    // Method to handle form submission for updating an existing review
    public function review_update(Request $request, $id)
    {
        // Retrieve the review data for the specific accommodation based on the ID
        $review_data = RoomRate::where('id', $id)->first();

        // Update the review data with the new data from the request
        $review_data->rate = $request->rate;
        $review_data->review_heading = $request->review_heading;
        $review_data->review_description = $request->review_description;
        $review_data->update(); // Save the updated review data to the database

        // Redirect back with a success message indicating that the review was updated successfully
        return redirect()->back()->with('success', 'Review has been successfully updated!');
    }

    // Method to handle deleting a specific review
    public function review_delete($id)
    {
        // Retrieve the review data for the specific review ID
        $review_data = RoomRate::where('id', $id)->first();

        // Delete the review from the database
        $review_data->delete();

        // Redirect back with a success message indicating that the review was deleted successfully
        return redirect()->back()->with('success', 'Room review has been successfully deleted!');
    }



}
