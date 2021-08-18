<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breakout;
use Illuminate\Support\Facades\File;

class BreakoutController extends Controller
{
    public function index()
    {
        $breakouts = Breakout::get();

        return view('webinars.index', compact('breakouts'));
    }

    public function create()
    {
        return view('breakouts.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'breakout_title' => 'required',
            'breakout_fname' => 'required',
            'breakout_lname' => 'required',
            'breakout_designation' => 'required',
            'breakout_filename' => 'required',
            'breakout_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:5048'

        ]);

        $Upload_model = new Breakout;
        $Upload_model->breakout_title = $request->input('breakout_title');
        $Upload_model->breakout_fname = $request->input('breakout_fname');
        $Upload_model->breakout_lname = $request->input('breakout_lname');
        $Upload_model->breakout_designation = $request->input('breakout_designation');

        if ($request->hasfile('breakout_filename')) {
            foreach ($request->file('breakout_filename') as $image) {
                $name = $image->hashName();
                $image->move('breakout_images/', $name);  // your folder path
                $data[] = $name;
            }
        }

        $Upload_model->breakout_filename = json_encode($data);
        $Upload_model->save();

        return redirect('/webinars');
    }

    public function edit(Breakout $breakout)
    {
        return view('breakouts.edit', compact('breakout'));
    }

    public function editImg(Breakout $breakout)
    {
        return view('breakouts.edit-img', compact('breakout'));
    }

    public function update(Request $request, Breakout $breakout)
    {

        $this->validate($request, [
            'breakout_title' => 'required',
            'breakout_fname' => 'required',
            'breakout_lname' => 'required',
            'breakout_designation' => 'required',
            'breakout_filename' => 'required',
            'breakout_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:5048'

        ]);

        $Upload_model = Breakout::find($breakout->id);
        $Upload_model->breakout_title = $request->input('breakout_title');
        $Upload_model->breakout_fname = $request->input('breakout_fname');
        $Upload_model->breakout_lname = $request->input('breakout_lname');
        $Upload_model->breakout_designation = $request->input('breakout_designation');

        $Upload_model->update();

        return redirect('/webinars');
    }

    public function updateImg(Request $request, Breakout $breakout)
    {
        $this->validate($request, [
            'breakout_filename' => 'required',
            'breakout_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:5048'

        ]);

        $Upload_model = Breakout::find($breakout->id);

        if ($request->hasfile('breakout_filename')) {

            foreach (json_decode($Upload_model->breakout_filename, true) as $image) {

                $destination = 'breakout_images/' . $image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            foreach ($request->file('breakout_filename') as $image) {
                $name = $image->hashName();
                $image->move('breakout_images/', $name);  // your folder path
                $data[] = $name;
            }
        }

        $Upload_model->breakout_filename = json_encode($data);
        $Upload_model->update();

        return redirect('/breakouts/'.$breakout->id);
    }

    public function destroy(Breakout $breakout)
    {
        $Upload_model = Breakout::find($breakout->id);

        foreach (json_decode($Upload_model->breakout_filename, true) as $image) {

            $destination = 'breakout_images/' . $image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        $breakout->delete();
        return redirect('/webinars');
    }
}
