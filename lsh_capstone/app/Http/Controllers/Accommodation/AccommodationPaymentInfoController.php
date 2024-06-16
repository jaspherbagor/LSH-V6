<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccommodationPaymentInfoController extends Controller
{
    public function index()
    {
        return view('accommodation.payment_info');
    }

    
}
