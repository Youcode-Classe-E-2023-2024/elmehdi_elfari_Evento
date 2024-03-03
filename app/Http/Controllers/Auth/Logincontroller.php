<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{

    public function create()
    {
        return view("Auth.login");
    }

    function authenticate(Request $request)
    {
        $formFields = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if (auth()->attempt($formFields, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('login')->with("login", 'true');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])
            ->onlyInput();
    }
}
