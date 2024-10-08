<?php
// Namespace declaration: specifies that this controller belongs to the 'App\Http\Controllers\Customer' namespace
namespace App\Http\Controllers\Customer;

// Importing necessary classes, models, and facades
use App\Http\Controllers\Controller; // Importing base controller class
use Illuminate\Http\Request; // Importing the Request class
use Illuminate\Support\Facades\Hash; // Importing the Hash facade for hashing passwords
use Illuminate\Support\Facades\Auth; // Importing the Auth facade for authentication
use Illuminate\Support\Facades\Mail; // Importing the Mail facade for sending emails
use App\Mail\WebsiteMail; // Importing the WebsiteMail class for sending emails
use App\Models\Accommodation;
use App\Models\Customer; // Importing the Customer model

// Controller for handling customer authentication-related requests
class CustomerAuthController extends Controller
{
    // Method to display the login page
    public function login()
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        } elseif(Auth::guard('accommodation')->check()) {
            return redirect()->route('accommodation_home');
        }
        // If the admin is authenticated, log them out and redirect to the customer login page
        elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('customer_login');
        }
        // Render the 'front.login' view for the login page
        return view('front.login');
    }

    // Method to handle login form submission
    public function login_submit(Request $request)
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        // Validate the request data for email and password
        $request->validate([
            'email' => 'required|email', // Email is required and must be valid
            'password' => 'required' // Password is required
        ]);

        // Define the credentials for authentication
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1 // Ensure customer account is active
        ];

        // Define the credentials for authentication
        $accommodation_credential = [
            'contact_email' => $request->email,
            'password' => $request->password,
            'status' => 'approved',
            'remark' => 'active',
        ];

        // Attempt to authenticate the customer with the provided credentials
        if (Auth::guard('customer')->attempt($credential)) {
            // Redirect to the customer home page if authentication is successful
            return redirect()->route('customer_home');
        } elseif(Auth::guard('accommodation')->attempt($accommodation_credential)) {
            return redirect()->route('accommodation_home');
        }
        
        else {
            // Redirect back to the login page with an error message if authentication fails
            return redirect()->route('customer_login')->with('error', 'Invalid credentials!');
        }
    }

    // Method to display the signup page
    public function signup()
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        } elseif(Auth::guard('accommodation')->check()){
            return redirect()->route('accommodation_home');
        }

        // Render the 'front.signup' view for the signup page
        return view('front.signup');
    }

    

    // Method to handle signup form submission
    public function signup_submit(Request $request)
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        // Validate the request data for signup
        $request->validate([
            'name' => 'required', // Name is required
            'email' => 'required|email|unique:customers', // Email is required, must be valid, and must be unique among customers
            'id_type' => 'required',
            'id_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120',
            'selfie' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120',
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
        
        // Create a verification link for the customer
        $verification_link = url('signup-verify/' . $request->email . '/' . $token);

        
        // Create a new Customer object and populate its fields
        $obj = new Customer();

        // Check if a photo file is provided in the request
        if ($request->hasFile('id_image') || $request->hasFile('selfie')) {
            // Validate the photo file (type and size restrictions)
            $request->validate([
                'id_image' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120', // Photo file must be an image and within the size limit
                'selfie' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:5120' // Photo file must be an image and within the size limit
            ]);

            // Retrieve the extension of the uploaded photo file
            $id_image_ext = $request->file('id_image')->extension();

            // Retrieve the extension of the uploaded photo file
            $selfie_image_ext = $request->file('selfie')->extension();
            
            // Generate a unique file name for the photo using the current timestamp
            $final_id_image_name = 'ID'.time() . '.' . $id_image_ext;

            // Generate a unique file name for the photo using the current timestamp
            $final_selfie_image_name = 'Selfie'.time() . '.' . $selfie_image_ext;
            
            // Move the uploaded photo file to the specified directory with the new file name
            $request->file('id_image')->move(public_path('uploads/'), $final_id_image_name);

            $request->file('selfie')->move(public_path('uploads/'), $final_selfie_image_name);

            // Update the customer's photo file name in the database
            $obj->id_image = $final_id_image_name;

            $obj->selfie = $final_selfie_image_name;
        }

        $obj->name = $request->name; // Set the customer's name
        $obj->email = $request->email; // Set the customer's email address
        $obj->id_type = $request->id_type;
        $obj->password = $password; // Set the hashed password
        $obj->token = $token; // Set the verification token
        $obj->status = 0; // Set the customer status to unverified (0)
        $obj->save(); // Save the new customer to the database

        // Define the subject for the verification email
        $subject = 'Confirm Your Sign-Up: Welcome to Labason Safe Haven!';
        
        // Create the email message content with the verification link
        $message = '<p>Dear <strong>' . $request->name . '</strong>, </p>';
        $message .= '<p>Thank you for joining Labason Safe Haven! Please click the link below to confirm your sign-up:</p> <br>';
        $message .= '<a href="' . $verification_link . '">' . $verification_link . '</a>';
        $message .= '<p>Explore exclusive offers and seamless booking experiences with us. Need help? Contact us at contact@labason.space.</p>';
        $message .= '<p>Welcome Aboard!</p>';
        $message .= '<p>Best, </p>';
        $message .= '<p>Labason Safe Haven Team</p>';

        // Send the verification email to the customer
        Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        // Redirect back with a success message prompting the customer to check their email for verification
        return redirect()->back()->with('success', 'Please check your email and click the link to complete the signup process.');
    }

    // Method to handle customer signup verification
    public function signup_verify($email, $token)
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        // Find the customer with the given email and token
        $customer_data = Customer::where('email', $email)->where('token', $token)->first();

        // If the customer data is found, verify the customer
        if ($customer_data) {
            $customer_data->token = ''; // Clear the verification token
            $customer_data->status = 1; // Set the customer status to verified (1)
            $customer_data->update(); // Save the changes to the database

            // Redirect to the login page with a success message
            return redirect()->route('customer_login')->with('success', 'Your account is verified successfully!');
        } else {
            // Redirect to the login page if the customer data is not found
            return redirect()->route('customer_login');
        }
    }

    // Method to log out the authenticated customer
    public function logout()
    {
        // Log out the authenticated customer
        Auth::guard('customer')->logout();
        // Redirect to the customer login page
        return redirect()->route('customer_login');
    }

    // Method to display the forget password page
    public function forget_password()
    {
        // Render the 'front.forget_password' view for the forget password page
        return view('front.forget_password');
    }

    // Method to handle forget password form submission
    public function forget_password_submit(Request $request)
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        // Validate the request data for email
        $request->validate([
            'email' => 'required|email' // Email is required and must be valid
        ]);

        // Find the customer with the given email
        $customer_data = Customer::where('email', $request->email)->first();

        $accommodation_data = Accommodation::where('contact_email', $request->email)->first();
        

        // Generate a unique reset token for the customer
        $token = hash('sha256', time());

        if($customer_data) {
            // Set the reset token for the customer
            $customer_data->token = $token;
            $customer_data->update(); // Save the changes to the database
        } elseif($accommodation_data) {
            // Set the reset token for the customer
            $accommodation_data->token = $token;
            $accommodation_data->update(); // Save the changes to the database
        } else {
            return redirect()->back()->with('error', 'Email address not found!');
        }

        // Generate a password reset link for the customer
        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        
        // Define the subject for the password reset email
        $subject = 'Reset Password';
        
        // Create the email message content with the password reset link
        $message = 'Please click on the following link to reset the password: <br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        // Send the password reset email to the customer
        Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        // Redirect to the customer login page with a success message prompting the customer to check their email
        return redirect()->route('customer_login')->with('success', 'Please check your email and follow the steps there.');
    }

    // Method to display the reset password page
    public function reset_password($token, $email)
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        // Find the customer with the given token and email
        $customer_data = Customer::where('token', $token)->where('email', $email)->first();
        
        $accommodation_data = Accommodation::where('token', $token)->where('contact_email', $email)->first();

        if ($customer_data) {
            // Render the 'front.reset_password' view for the reset password page
            return view('front.reset_password', compact('token', 'email'));
        } elseif($accommodation_data) {
            // Render the 'front.reset_password' view for the reset password page
            return view('front.reset_password', compact('token', 'email'));
        } else {
            // If the data is not found, redirect to the customer login page
            return redirect()->route('customer_login');
        }

    }

    // Method to handle reset password form submission
    public function reset_password_submit(Request $request)
    {
        // If the customer is already authenticated, redirect to the customer home page
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        // Validate the request data for password and confirmed password
        $request->validate([
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])/',
            ], // Password is required
            'retype_password' => 'required|same:password' // Confirmed password must match the original password
        ]);

        // Find the customer with the given token and email
        $customer_data = Customer::where('token', $request->token)->where('email', $request->email)->first();

        $accommodation_data = Accommodation::where('token', $request->token)->where('contact_email', $request->email)->first();

        if($customer_data) {
            // Set the new password and clear the token
            $customer_data->password = Hash::make($request->password); // Hash the new password
            $customer_data->token = ''; // Clear the token
            $customer_data->update(); // Save the changes to the database
        } elseif($accommodation_data) {
            // Set the new password and clear the token
            $accommodation_data->password = Hash::make($request->password); // Hash the new password
            $accommodation_data->token = ''; // Clear the token
            $accommodation_data->update(); // Save the changes to the database
        } else {
            return redirect()->route('customer_forget_password')->with('error', 'Something went wrong. Please try again!');
        }
        
        // Redirect to the customer login page with a success message
        return redirect()->route('customer_login')->with('success', 'Password is reset successfully');
    }
}
