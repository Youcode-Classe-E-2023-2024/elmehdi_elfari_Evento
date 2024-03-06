<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Category::count();
        return view('dashboard.dashboard', compact('categoriesCount'));
    }
}
