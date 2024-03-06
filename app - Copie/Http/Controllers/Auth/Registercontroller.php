<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Auth.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|min:3',
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|min:6'
        ]);

        if ($request->input('ogranisator')) {
            $role = 'organisateur';
        } else {
            $role = 'client';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole($role);
        Auth::login($user);

        if ($user->hasRole('client')) {
            // Do something specific for clients if needed
        } elseif ($user->hasRole('admin')) {
            return redirect('admin/dashboard')->with("login", 'true');
        } elseif ($user->hasRole('organisateur')) {
            return redirect()->route('clients')->with("login", 'true');
        } else {
            return redirect('login');
        }
    }
}
