<?php

namespace Munib\UserProfile\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Or any user logic
        return view('userprofile::profile', compact('user'));
    }
}
