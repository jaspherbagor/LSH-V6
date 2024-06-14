<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\AccommodationRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationReviewController extends Controller
{
    public function index()
    {
        $reviews = AccommodationRate::where('accommodation_id', Auth::guard('accommodation')->user()->id)->where('remark',  'active')->get();

        return view('accommodation.review', compact('reviews'));
    }
}
