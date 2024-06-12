<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccommodationHomeController extends Controller
{
    public function index()
    {
        
        return view('accommodation.home', compact('total_completed_orders', 'total_pending_orders', 'recent_orders', 'total_reviews'));
    }
}
