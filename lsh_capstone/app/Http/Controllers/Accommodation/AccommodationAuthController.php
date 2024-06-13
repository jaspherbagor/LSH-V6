<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationAuthController extends Controller
{
    public function logout()
    {
        Auth::guard('accommodation')->logout();
        return redirect()->route('admin_login');
    }

    
}
