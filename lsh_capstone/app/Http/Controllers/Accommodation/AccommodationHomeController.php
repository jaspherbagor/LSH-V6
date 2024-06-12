<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccommodationHomeController extends Controller
{
    public function index()
    {
        return view('accommodation.home');
    }
}
