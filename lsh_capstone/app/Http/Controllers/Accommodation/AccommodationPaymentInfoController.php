<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationPaymentInfoController extends Controller
{
    public function index()
    {
        $accommodationId = Auth::guard('accommodation')->user()->id;
        
        // Check if the payment info exists
        $payment_info = Payment::where('accommodation_id', $accommodationId)->first();
        
        // If no payment info found, create a new one with default values
        if (!$payment_info) {
            $payment_info = Payment::create([
                'accommodation_id' => $accommodationId,
                'gcash_qr' => 'default_gcash_qr.png',
                'gcash_name' => 'Input your gcash name',
                'gcash_number' => 'ex. 09123456789',
                'maya_qr' => 'default_maya_qr.png',
                'maya_name' => 'Input your maya name',
                'maya_number' => 'ex. 09123456789',
            ]);
        }

        return view('accommodation.payment_info', compact('payment_info'));
    }

    public function update(Request $request)
    {
        $accommodationId = Auth::guard('accommodation')->user()->id;
        $payment_info = Payment::where('accommodation_id', $accommodationId)->first();


        // Check if a new photo is uploaded
        if ($request->hasFile('gcash_qr')) {
            // Validate the new photo
            $request->validate([
                'gcash_qr' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            // Remove the existing photo file
            //unlink(public_path('uploads/' . $payment_info->gcash_qr));

            // Get the extension of the new photo
            $gcash_ext = $request->file('gcash_qr')->extension();
            // Generate a unique name for the new photo
            $gcash_final = time() . '.' . $gcash_ext;

            // Move the new photo to the uploads directory
            $request->file('gcash_qr')->move(public_path('uploads/'), $gcash_final);

            // Update the photo attribute of the payment info
            $payment_info->gcash_qr = $gcash_final;
        }    

        if ($request->hasFile('maya_qr')) {
            // Validate the new photo
            $request->validate([
                'maya_qr' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            // Remove the existing photo file
            //unlink(public_path('uploads/' . $payment_info->may_qr));

            // Get the extension of the new photo
            $maya_ext = $request->file('maya_qr')->extension();
            // Generate a unique name for the new photo
            $maya_final = time() . '.' . $maya_ext;

            // Move the new photo to the uploads directory
            $request->file('maya_qr')->move(public_path('uploads/'), $maya_final);

            // Update the photo attribute of the payment info
            $payment_info->maya_qr = $maya_final;
        }

        $payment_info->gcash_name = $request->input('gcash_name');
        $payment_info->gcash_number = $request->input('gcash_number');
        $payment_info->maya_name = $request->input('maya_name');
        $payment_info->maya_number = $request->input('maya_number');

        $payment_info->save();

        return redirect()->back()->with('success', 'Payment information updated successfully.');
    }


}
