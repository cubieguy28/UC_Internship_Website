<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store()
    {
        // Create new event
        $validated_fields = request()->validate([
            'event_name' => 'required',
            'event_date' => 'required',
            'event_description' => 'required',
            'event_speaker_fname' => 'required',
            'event_speaker_lname' => 'required',
            'event_category' => 'required',
            'event_time' => 'required',
            'event_participant' => 'required',

        ]);

        $event = Event::create($validated_fields);

        return redirect('/events');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Event $event)
    {

        $validated_fields = request()->validate([
            'event_name' => 'required',
            'event_date' => 'required',
            'event_description' => 'required',
            'event_speaker_fname' => 'required',
            'event_speaker_lname' => 'required',
            'event_category' => 'required',
            'event_time' => 'required',
            'event_participant' => 'required',

        ]);

        $event->update($validated_fields);
        
        return redirect('/events/');
    }   

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/events');
    }

}
