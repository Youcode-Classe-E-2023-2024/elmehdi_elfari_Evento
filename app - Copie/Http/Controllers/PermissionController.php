<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function ask(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $user->asked_Permission = true;
            $user->save();

            return redirect()->back();
        }

        // Handle the case where the user is not authenticated
        return redirect()->route('login');
    }
}

