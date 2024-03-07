<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showValidationPage()
    {
        $events = Event::all();
        return view('Dashboard.validet', compact('events'));
    }

    public function validateEvent($id)
    {
        $event = Event::find($id);

        if ($event) {
            $event->validated = !$event->validated;
            $event->save();

            return redirect()->back()->with('success', 'Event validation status updated successfully.');
        } else {

            return redirect()->back()->with('error', 'Event not found.');
        }
    }
}
