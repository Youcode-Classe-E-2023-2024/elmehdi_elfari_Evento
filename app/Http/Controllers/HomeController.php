<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function welcome()
    {
        $events = Event::all();

        $validatedEvents = $events->where('validated', 1);

        return view('welcome', compact('validatedEvents'));
    }
}
