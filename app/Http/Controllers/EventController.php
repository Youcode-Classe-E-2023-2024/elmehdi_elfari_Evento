<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $EventCount = Event::count();
        $events = Event::where('users_id', Auth::id())->get();
        return view('Dashboard.client', compact('events', 'EventCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'number_places' => 'required|numeric',
            'categories_id' => 'required|integer|exists:categories,id',
            'status' => 'required|in:manuel,auto',
        ]);

        $imagePath = null;
        $imageExt = null;
        $imageName = Str::random(20);

        if ($request->hasFile('image')) {
            $imageExt = $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('EventsImg', $imageName . '.' . $imageExt);
        }

        $categoriesId = (int)$validated['categories_id'];
        $status = trim($validated['status']);

        Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date_start' => $validated['date_start'],
            'date_end' => $validated['date_end'],
            'location' => $validated['location'],
            'image' => $imagePath,
            'number_places' => $validated['number_places'],
            'categories_id' => $categoriesId,
            'status' => $status,
            'users_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Event added successfully!!');
    }




    /**
     * Display the specified resource.
     */
    public function show(Event $Event)
    {

        return view('Dashboard.show', compact('Event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('Dashboard.edit', compact('categories', 'event'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $Event)
    {
        $validated =  $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'location' => 'required',
            'image' => 'nullable',
            'number_places' => 'required|numeric',
            'categories_id' => 'required|numeric',
            'status' => 'required',

        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('EventsImg', 'public');
        } else {
            $validated['image'] = $request->input('image');
        }
        $usersId = Auth::id();

        $Event->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date_start' => $validated['date_start'],
            'date_end' => $validated['date_end'],
            'location' => $validated['location'],
            'image' => $validated['image'],
            'number_places' => $validated['number_places'],
            'categories_id' => $validated['categories_id'],
            'status' => $validated['status'],
            'users_id' => $usersId,
        ]);
        return redirect()->back()->with('success', 'Event updated successfuly !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $Event)
    {
        $Event->delete();
        return redirect()->back()->with('success', 'Event deleted successfuly !!');
    }


    public function search()
    {
        $search = $_GET['query'];
        //dd($search); clean

        $validatedEvents = Event::where('title', 'LIKE', '%' . $search . '%')->get();
        //dd($validatedEvents);
        return view('Dashboard.search', compact('validatedEvents'));
    }

    public function softDeleteEvent($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->back()->with('success', 'Event soft deleted successfully!');
    }


    public function detail($eventId)
    {
        $event = Event::find($eventId);

        if (!$event) {
            abort(404);
        }

        return view('detail', ['event' => $event]);
    }

    public function reserve($eventId)
    {
        $event = Event::find($eventId);

        if (!$event) {
            abort(404);
        }

        $event->update(['available_places' => $event->available_places - 1]);

        return response()->json(['message' => 'Place reserved successfully']);
    }
}
