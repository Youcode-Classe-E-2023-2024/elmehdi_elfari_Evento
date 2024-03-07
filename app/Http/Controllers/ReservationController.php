<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reserve(Event $event)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to reserve a ticket.');
        }

        if ($event->status == 'active' && $event->available_places > 0) {

            $event->decrement('available_places');

            $user = Auth::user();
            $user->reservations()->create(['event_id' => $event->id]);

            return redirect()->back()->with('success', 'Ticket reserved successfully!');
        } else {
            return redirect()->back()->with('error', 'Sorry, this event is not available for reservation.');
        }
    }
}
