<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {

        return view('Dashboard.client');
    }
}
