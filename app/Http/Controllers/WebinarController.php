<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use Illuminate\Support\Facades\File;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::orderBy('webinar_date', 'asc')->get();

        return view('webinars.index', compact('webinars'));
    }

    public function create()
    {
        return view('webinars.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'webinar_date' => 'required',
            'webinar_title' => 'required',
            'webinar_time' => 'required',
            'webinar_link' => 'required',
            'webinar_id' => 'required',
            'webinar_code' => 'required',
            'speaker_fname' => 'required',
            'speaker_lname' => 'required',
            'speaker_designation' => 'required',
            'speaker_filename' => 'required',
            'speaker_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:5048'

        ]);

        $Upload_model = new Webinar;
        $Upload_model->webinar_date = $request->input('webinar_date');
        $Upload_model->webinar_time = $request->input('webinar_time');
        $Upload_model->webinar_link = $request->input('webinar_link');
        $Upload_model->webinar_id = $request->input('webinar_id');
        $Upload_model->webinar_code = $request->input('webinar_code');
        $Upload_model->webinar_title = $request->input('webinar_title');
        $Upload_model->speaker_fname = $request->input('speaker_fname');
        $Upload_model->speaker_lname = $request->input('speaker_lname');
        $Upload_model->speaker_designation = $request->input('speaker_designation');

        if ($request->hasfile('speaker_filename')) {
            foreach ($request->file('speaker_filename') as $image) {
                $name = $image->hashName();
                $image->move('webinar_images/', $name);  // your folder path
                $data[] = $name;
            }
        }

        $Upload_model->speaker_filename = json_encode($data);
        $Upload_model->save();

        return redirect('/webinars');
    }

    public function edit(Webinar $webinar)
    {
        return view('webinars.edit', compact('webinar'));
    }

    public function editImg(Webinar $webinar)
    {
        return view('webinars.edit-img', compact('webinar'));
    }

    public function update(Request $request, Webinar $webinar)
    {

        $this->validate($request, [
            'webinar_date' => 'required',
            'webinar_title' => 'required',
            'webinar_time' => 'required',
            'webinar_link' => 'required',
            'webinar_id' => 'required',
            'webinar_code' => 'required',
            'speaker_fname' => 'required',
            'speaker_lname' => 'required',
            'speaker_designation' => 'required',

        ]);

        $Upload_model = Webinar::find($webinar->id);
        $Upload_model->webinar_date = $request->input('webinar_date');
        $Upload_model->webinar_title = $request->input('webinar_title');
        $Upload_model->webinar_time = $request->input('webinar_time');
        $Upload_model->webinar_link = $request->input('webinar_link');
        $Upload_model->webinar_id = $request->input('webinar_id');
        $Upload_model->webinar_code = $request->input('webinar_code');
        $Upload_model->speaker_fname = $request->input('speaker_fname');
        $Upload_model->speaker_lname = $request->input('speaker_lname');
        $Upload_model->speaker_designation = $request->input('speaker_designation');

        $Upload_model->update();

        return redirect('/webinars');
    }

    public function updateImg(Request $request, Webinar $webinar)
    {
        $this->validate($request, [
            'speaker_filename' => 'required',
            'speaker_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:5048'

        ]);

        $Upload_model = Webinar::find($webinar->id);

        if ($request->hasfile('speaker_filename')) {

            foreach (json_decode($Upload_model->speaker_filename, true) as $image) {

                $destination = 'webinar_images/' . $image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            foreach ($request->file('speaker_filename') as $image) {
                $name = $image->hashName();
                $image->move('webinar_images/', $name);  // your folder path
                $data[] = $name;
            }
        }

        $Upload_model->speaker_filename = json_encode($data);
        $Upload_model->update();

        return redirect('/webinars/'.$webinar->id);
    }

    public function destroy(Webinar $webinar)
    {
        $Upload_model = Webinar::find($webinar->id);

        foreach (json_decode($Upload_model->speaker_filename, true) as $image) {

            $destination = 'webinar_images/' . $image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        $webinar->delete();
        return redirect('/webinars');
    }
}
