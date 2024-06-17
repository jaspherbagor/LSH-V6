<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomPhoto;
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

    // Method to store a new room
    public function store(Request $request)
    {
        // Initialize amenities string and index counter
        $amenities = '';  // Initialize empty amenities string
        $i = 0;  // Initialize counter

        // Check if amenities are provided in the request
        if (isset($request->arr_amenities)) {
            // Loop through each amenity and concatenate them into the string
            foreach ($request->arr_amenities as $item) {
                // Append the first amenity or add a comma separator
                if ($i == 0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ',' . $item;
                }
                $i++;  // Increment counter
            }
        }

        // Validate the request data
        $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',  // Validate featured photo
            'room_name' => 'required',  // Validate room name
            'description' => 'required',  // Validate description
            'price' => 'required',  // Validate price
            'total_rooms' => 'required'  // Validate total rooms
        ]);

        // Get the file extension of the uploaded photo
        $ext = $request->file('featured_photo')->extension();

        // Generate a unique name for the photo using the current timestamp
        $final_name = time() . '.' . $ext;

        // Move the photo to the 'uploads' directory
        $request->file('featured_photo')->move(public_path('uploads/'), $final_name);

        // Create a new Room instance
        $obj = new Room();

        // Assign accommodation ID, photo, and other request data to the Room object
        $obj->accommodation_id = Auth::guard('accommodation')->user()->id;
        $obj->featured_photo = $final_name;
        $obj->room_name = $request->room_name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;

        // Save the new Room object to the database
        $obj->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Room is added successfully.');
    }

    // Method to display the edit room form
    public function edit($id)
    {
        // Retrieve all amenities from the database
        $all_amenities = Amenity::all();

        // Retrieve room data based on the provided room ID
        $room_data = Room::where('id', $id)->first();

        // Initialize an array to store existing amenities
        $existing_amenities = [];

        // Check if the room has amenities and split them into an array
        if ($room_data->amenities != '') {
            $existing_amenities = explode(',', $room_data->amenities);
        }

        // Return the 'admin.room_edit' view with the room data, all amenities, and existing amenities
        return view('admin.room_edit', compact('room_data', 'all_amenities', 'existing_amenities'));
    }

    // Method to update a room
    public function update(Request $request, $id)
    {
        // Retrieve the existing room based on the provided room ID
        $obj = Room::where('id', $id)->first();

        // Initialize amenities string and index counter
        $amenities = '';  // Initialize empty amenities string
        $i = 0;  // Initialize counter

        // Check if amenities are provided in the request
        if (isset($request->arr_amenities)) {
            // Loop through each amenity and concatenate them into the string
            foreach ($request->arr_amenities as $item) {
                // Append the first amenity or add a comma separator
                if ($i == 0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ',' . $item;
                }
                $i++;  // Increment counter
            }
        }

        // Validate the request data
        $request->validate([
            'name' => 'required',  // Validate room name
            'description' => 'required',  // Validate room description
            'price' => 'required',  // Validate room price
            'total_rooms' => 'required'  // Validate total rooms
        ]);

        // Check if a new featured photo is uploaded
        if ($request->hasFile('featured_photo')) {
            // Validate the new featured photo
            $request->validate([
                'featured_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            // Remove the existing photo file
            unlink(public_path('uploads/' . $obj->featured_photo));

            // Get the extension of the new photo
            $ext = $request->file('featured_photo')->extension();

            // Generate a unique name for the new photo
            $final_name = time() . '.' . $ext;

            // Move the new photo to the 'uploads' directory
            $request->file('featured_photo')->move(public_path('uploads/'), $final_name);

            // Update the featured photo attribute of the room
            $obj->featured_photo = $final_name;
        }

        // Update other attributes of the room
        $obj->room_name = $request->room_name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;

        // Save the updated room data to the database
        $obj->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Room is updated successfully.');
    }

    // Method to delete a room
    public function delete($id)
    {
        // Retrieve the room data based on the provided room ID
        $single_data = Room::where('id', $id)->first();

        // Remove the photo file associated with the room
        unlink(public_path('uploads/' . $single_data->featured_photo));

        // Delete the room from the database
        $single_data->delete();

        // Retrieve all room photos associated with the room ID
        $room_photo_data = RoomPhoto::where('room_id', $id)->get();

        // Loop through each room photo
        foreach ($room_photo_data as $item) {
            // Remove the photo file and delete the room photo data
            unlink(public_path('uploads/' . $item->photo));
            $item->delete();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Room is deleted successfully.');
    }

    // Method to display the room gallery
    public function gallery($id)
    {
        // Retrieve room data based on the provided room ID
        $room_data = Room::where('id', $id)->first();

        // Retrieve all room photos associated with the room ID
        $room_photos = RoomPhoto::where('room_id', $id)->get();

        // Return the 'admin.room_gallery' view with the room data and room photos
        return view('admin.room_gallery', compact('room_data', 'room_photos'));
    }
}
