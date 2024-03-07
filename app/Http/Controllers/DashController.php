<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;

class DashController extends Controller
{
    public function index()
    {
        $categoriesCount = Category::count();

        $validatedEventCount = Event::where('validated', 1)->count();

        $invalidEventCount = Event::where('validated', 0)->count();

        return view('Dashboard.dashboard', compact('categoriesCount', 'validatedEventCount', 'invalidEventCount'));
    }
}
