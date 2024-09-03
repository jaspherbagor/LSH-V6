<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccommodationAuthController extends Controller
{
    public function logout()
    {
        Auth::guard('accommodation')->logout();
        return redirect()->route('customer_login');
    }

    public function register()
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('accommodation')->check()) {
            return redirect()->route('accommodation_home');
        } elseif(Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        } elseif(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return view('accommodation.register');
    }

    public function register_submit(Request $request)
    {
        // Validate the request data for signup
        $request->validate([
            'name' => 'required', // Name is required
            'contact_email' => 'required|email|unique:accommodations', // Email is required, must be valid, and must be unique among customers
            'contact_number' => 'required',
            'address' => 'required',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])/',
            ], // Password is required
            'confirm_password' => 'required|same:password' // Confirmed password must match the original password
        ]);

        // Generate a unique token for the customer
        $token = hash('sha256', time());
        
        // Hash the customer's password
        $password = Hash::make($request->password);

        // Create a new Accommodation instance and set its properties based on the request data
        $obj = new Accommodation();
        $obj->accommodation_type_id = $request->accommodation_type_id;
        $obj->name = $request->name;
        $obj->address = $request->address;
        $obj->contact_number = $request->contact_number;
        $obj->contact_email = $request->contact_email;
        $obj->map = $request->map;
        $obj->password = $password;
        $obj->token = $token;
        $obj->status = 'pending';
        $obj->remark = 'active';
        // Save the new accommodation to the database
        $obj->save();

        // Define the subject for the verification email
        $subject = 'Registration is waiting for approval';
        
        // Create the email message content with the verification link
        $message = '<p>Dear <strong>' . $request->name . '</strong>, </p>';
        $message .= '<p>Thank you for joining Labason Safe Haven! Your account registration is waiting for admin approval. Please wait for the admin to confirm your registration.</p> <br>';
        $message .= '<p>Best, </p>';
        $message .= '<p>Labason Safe Haven Team</p>';

        // Send the verification email to the customer
        Mail::to($request->contact_email)->send(new WebsiteMail($subject, $message));

        // Redirect back with a success message prompting the customer to check their email for verification
        return redirect()->route('customer_login')->with('success', 'Your account registration is waiting for approval. Please check your email for an update');
    }

    
}
