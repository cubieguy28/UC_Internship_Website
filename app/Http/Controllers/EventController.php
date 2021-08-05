<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{

    public function index()
    {        
        $events = Event::orderBy('event_date', 'desc')->paginate(12);
        return view('events.index', compact('events'));
    }

    public function indexWelcome()
    {
        $events = Event::orderBy('event_date', 'desc')->limit(4)->get();
        return view('welcome', compact('events'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $events = Event::where('event_name', 'like', '%'.$search.'%')->latest()->paginate(12);
        return view('events.index', compact('events'));
    }

    public function filter(Request $request)
    {
        $category = $request->get('filter-by-category');
        $year = $request->get('filter-by-year');
        $events = Event::where('event_category', 'like', '%'.$category.'%')
        ->Where('event_date', 'like', '%'.$year.'%')
        ->latest()->paginate(12);
        return view('events.index', compact('events'));
    }

    public function sort(Request $request)
    {
        $sort = $request->get('sort');
        if($sort == 'Date from earliest'){
            $events =Event::orderBy('event_date', 'asc')->paginate(12);
        }else{
            $events =Event::orderBy('event_date', 'desc')->paginate(12);
        }

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

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'event_name' => 'required',
            'event_date' => 'required',
            'event_description' => 'required',
            'event_speaker_fname' => 'required',
            'event_speaker_lname' => 'required',
            'event_category' => 'required',
            'event_time',
            'event_participant',
            'event_filename' => 'required',
            'event_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:3048'
        ]);

        $Upload_model = new Event;
        $Upload_model->event_name = $request->input('event_name');
        $Upload_model->event_date = $request->input('event_date');
        $Upload_model->event_description = $request->input('event_description');
        $Upload_model->event_speaker_fname = $request->input('event_speaker_fname');
        $Upload_model->event_speaker_lname = $request->input('event_speaker_lname');
        $Upload_model->event_category = $request->input('event_category');
        $Upload_model->event_time = $request->input('event_time');
        $Upload_model->event_participant = $request->input('event_participant');

        if($request->hasfile('event_filename'))
        {
            foreach($request->file('event_filename') as $image)
            {

                $name=$image->hashName();
                $image->move('event_images/', $name);  // your folder path
                $data[] = $name;
                $counter = count($data);
                
            }
        }
        $Upload_model->image_counter = $counter;
        $Upload_model->event_filename = json_encode($data);
        $Upload_model->save();

        return redirect('/events');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function editImg(Event $event)
    {
        return view('events.edit-img', compact('event'));
    }

    public function update(Request $request, Event $event)
    {

        $this->validate($request, [
            'event_name' => 'required',
            'event_date' => 'required',
            'event_description' => 'required',
            'event_speaker_fname' => 'required',
            'event_speaker_lname' => 'required',
            'event_category' => 'required',
            'event_time',
            'event_participant',
        ]);

        $Upload_model = Event::find($event->id);
        $Upload_model->event_name = $request->input('event_name');
        $Upload_model->event_date = $request->input('event_date');
        $Upload_model->event_description = $request->input('event_description');
        $Upload_model->event_speaker_fname = $request->input('event_speaker_fname');
        $Upload_model->event_speaker_lname = $request->input('event_speaker_lname');
        $Upload_model->event_category = $request->input('event_category');
        $Upload_model->event_time = $request->input('event_time');
        $Upload_model->event_participant = $request->input('event_participant');

        $Upload_model->update();
        
        return redirect('/events/'.$event->id);
    }

    public function updateImg(Request $request, Event $event)
    {

        $this->validate($request, [
            'event_filename' => 'required',
            'event_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:3048'
        ]);

        $Upload_model = Event::find($event->id);

        if($request->hasfile('event_filename'))
        {

            foreach (json_decode($Upload_model->event_filename, true) as $image) {

            $destination = 'event_images/'.$image;
            if(File::exists($destination)){
            File::delete($destination);
            }
            }

            foreach($request->file('event_filename') as $image)
            {
                $name=$image->hashName();
                $image->move('event_images/', $name);  // your folder path
                $data[] = $name;
                $counter = count($data);
            }
        }
        $Upload_model->image_counter = $counter;
        $Upload_model->event_filename = json_encode($data);
        $Upload_model->update();
        
        return redirect('/events/'.$event->id);
    }     

    public function destroy(Event $event)
    {
        $Upload_model = Event::find($event->id);

        foreach (json_decode($Upload_model->event_filename, true) as $image) {

            $destination = 'event_images/'.$image;
            if(File::exists($destination)){
            File::delete($destination);
            }
        }

        $event->delete();
        return redirect('/events');
    }

}
