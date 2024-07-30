<?php

namespace App\Http\Controllers\Admin; // Define the namespace for the controller

use App\Http\Controllers\Controller; // Import the base controller class
use App\Mail\WebsiteMail;
use App\Models\Accommodation; // Import the Accommodation model class
use App\Models\AccommodationType; // Import the AccommodationType model class
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Support\Facades\Mail;

class AdminAccommodationController extends Controller
{
    // Method to handle viewing a list of accommodations based on accommodation type
    public function index($accomtype_id)
    {
        // Retrieve the accommodation type based on the provided ID
        $accommodation_type = AccommodationType::where('id', $accomtype_id)->where('remark', 'active')->first();
        // Retrieve all accommodations associated with the given accommodation type ID
        $accommodations = Accommodation::where('accommodation_type_id', $accomtype_id)->where('remark', 'active')->get();
        // Return a view with the accommodations and accommodation type data
        return view('admin.accommodation_view', compact('accommodations', 'accommodation_type'));
    }

    // Method to handle displaying the form for adding a new accommodation
    public function add($accomtype_id)
    {
        // Retrieve the accommodation type based on the provided ID
        $accommodation_type = AccommodationType::where('id', $accomtype_id)->first();
        // Return a view with the accommodation type data for the add form
        return view('admin.accommodation_add', compact('accommodation_type'));
    }

    // Method to handle the form submission and storing a new accommodation
    public function store(Request $request, $accomtype_id)
    {
        // Validate the incoming request data for photo and required fields
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,webp,gif|max:5120',
            'name' => 'required',
            'address' => 'required'
        ]);

        // Get the file extension of the uploaded photo
        $ext = $request->file('photo')->extension();
        // Generate a unique filename for the photo using the current timestamp
        $final_name = time() . '.' . $ext;

        // Move the uploaded photo to the public uploads directory with the new filename
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        // Create a new Accommodation instance and set its properties based on the request data
        $obj = new Accommodation();
        $obj->accommodation_type_id = $accomtype_id;
        $obj->name = $request->name;
        $obj->photo = $final_name;
        $obj->address = $request->address;
        $obj->contact_number = $request->contact_number;
        $obj->contact_email = $request->contact_email;
        $obj->map = $request->map;
        $obj->status = 'pending';
        $obj->remark = 'active';
        // Save the new accommodation to the database
        $obj->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Accommodation is added successfully!');
    }

    // Method to handle displaying the form for editing an existing accommodation
    public function edit($id)
    {
        // Retrieve the accommodation data based on the provided ID
        $accommodation_data = Accommodation::where('id', $id)->first();
        $accommodation_type_data = AccommodationType::where('id', $accommodation_data->accommodation_type_id)->first();
        // Return a view with the accommodation data for the edit form
        return view('admin.accommodation_edit', compact('accommodation_data', 'accommodation_type_data'));
    }

    // Method to handle the form submission and updating an existing accommodation
    public function update(Request $request, $id)
    {
        // Retrieve the existing accommodation based on the provided ID
        $obj = Accommodation::where('id', $id)->first();

        // Check if a new photo file has been uploaded
        if ($request->hasFile('photo')) {
            // Validate the new photo file
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            // Remove the existing photo file from the uploads directory
            //unlink(public_path('uploads/' . $obj->photo));

            // Get the file extension of the new photo
            $ext = $request->file('photo')->extension();
            // Generate a unique filename for the new photo using the current timestamp
            $final_name = time() . '.' . $ext;

            // Move the new photo file to the public uploads directory with the new filename
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            // Update the photo property of the existing accommodation
            $obj->photo = $final_name;
        }

        // Update other properties of the existing accommodation based on the request data
        $obj->name = $request->name;
        $obj->address = $request->address;
        $obj->contact_number = $request->contact_number;
        $obj->contact_email = $request->contact_email;
        $obj->map = $request->map;
        // Save the updated accommodation to the database
        $obj->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Accommodation type is updated successfully!');
    }

    // Method to handle deleting an existing accommodation
    public function delete($id)
    {
        // Retrieve the accommodation data based on the provided ID
        $single_data = Accommodation::where('id', $id)->first();
        // Remove the photo file of the accommodation from the uploads directory
        //unlink(public_path('uploads/' . $single_data->photo));
        // Delete the accommodation record from the database
        $single_data->remark = 'deleted';
        $single_data->update();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Accommodation is deleted successfully!');
    }

    // Method to handle viewing a list of all accommodations
    public function accommodation_all()
    {
        // Retrieve all accommodations from the database
        $accommodation_all = Accommodation::where('remark', 'active')->get();
        // Return a view with the list of all accommodations
        return view('admin.accommodation_all', compact('accommodation_all'));
    }

    public function pending_accommodation()
    {
        $pending_accommodations = Accommodation::where('status', 'pending')->where('remark', 'active')->get();
        return view('admin.pending_accommodation', compact('pending_accommodations'));
    }

    public function approved_accommodation()
    {
        $approved_accommodations = Accommodation::where('status', 'approved')->where('remark', 'active')->get();

        return view('admin.approved_accommodation', compact('approved_accommodations'));
    }

    public function approve($id)
    {
        $accommodation_info = Accommodation::where('id', $id)->first();
        $accommodation_info->status = 'approved';
        $accommodation_info->token = '';
        $accommodation_info->update();

        // Define the subject for the verification email
        $subject = 'Registration has been approved: Welcome to Labason Safe Haven!';
        
        // Create the email message content with the verification link
        $message = '<p>Dear <strong>' . $accommodation_info->name . '</strong>, </p>';
        $message .= '<p>Thank you for joining Labason Safe Haven! Your account registration has been successfully approved. </p>';
        $message .= '<p>Explore exclusive offers and seamless booking experiences with us. Need help? Contact us at contact@labason.space.</p>';
        $message .= '<p>Welcome Aboard!</p>';
        $message .= '<p>Best regard, </p>';
        $message .= '<p>Labason Safe Haven Team</p>';

        // Send the verification email to the customer
        Mail::to($accommodation_info->contact_email)->send(new WebsiteMail($subject, $message));

        // Redirect back with a success message prompting the customer to check their email for verification
        return redirect()->back()->with('success', 'Accommodation has been successfully approved!');
    }

    public function deactivate($id)
    {
        $accommodation_info = Accommodation::where('id', $id)->first();
        $accommodation_info->status = 'deactivated';
        $accommodation_info->update();
        
        return redirect()->back()->with('success', 'Accommodation has been successfully deactivated!');
    }
}
