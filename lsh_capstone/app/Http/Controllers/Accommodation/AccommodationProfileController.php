<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccommodationProfileController extends Controller
{
    // Method to display the accommodation profile page
    public function index()
    {
        // Render the 'accommodation.profile' view for the accommodation profile page
        return view('accommodation.profile');
    }

    // Method to handle accommodation profile form submission
    public function profile_submit(Request $request)
    {
        // Retrieve the authenticated accommodation's data based on their email
        $accommodation_data = Accommodation::where('email', Auth::guard('accommodation')->user()->contact_email)->first();

        // Validate the request data for name and email
        $request->validate([
            'name' => 'required', // Name is required
            'email' => 'required|email' // Email is required and must be valid
        ]);

        // Check if a new password is provided in the request
        if ($request->password != '') {
            // Validate the request data for password and confirmed password
            $request->validate([
                'password' => 'required', // Password is required if provided
                'retype_password' => 'required|same:password' // Confirmed password must match the original password
            ]);

            // Hash the new password and update the accommodation's password
            $accommodation_data->password = Hash::make($request->password);
        }

        // Check if a photo file is provided in the request
        if ($request->hasFile('photo')) {
            // Validate the photo file (type and size restrictions)
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120' // Photo file must be an image and within the size limit
            ]);

            // If the accommodation already has a photo, delete the existing photo file
            if ($accommodation_data->photo != NULL) {
                unlink(public_path('uploads/' . $accommodation_data->photo));
            }

            // Retrieve the extension of the uploaded photo file
            $ext = $request->file('photo')->extension();
            
            // Generate a unique file name for the photo using the current timestamp
            $final_name = time() . '.' . $ext;
            
            // Move the uploaded photo file to the specified directory with the new file name
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            // Update the accommodation's photo file name in the database
            $accommodation_data->photo = $final_name;
        }

        // Update the accommodation's profile information with the new data from the request
        $accommodation_data->name = $request->name;
        $accommodation_data->contact_email = $request->contact_email;
        $accommodation_data->contact_number = $request->contact_number;
        $accommodation_data->address = $request->address;
        $accommodation_data->map = $request->map;
        $accommodation_data->update(); // Save the updated accommodation data to the database

        // Redirect back with a success message indicating that the profile information was saved successfully
        return redirect()->back()->with('success', 'Profile information is saved successfully.');
    }
}
