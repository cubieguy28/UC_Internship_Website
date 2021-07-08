<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adviser;
use Illuminate\Support\Facades\File;

class AdviserController extends Controller
{
    public function index()
    {
        $advisers = Adviser::all();
        return view('advisers.index', compact('advisers'));
    }

    public function show(Adviser $adviser)
    {
        
        return view('advisers.show', compact('adviser'));
    }

    public function create()
    {
        return view('advisers.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'adviser_fname' => 'required',
            'adviser_lname' => 'required',
            'adviser_designation' => 'required',
            'adviser_filename' => 'required',
            'adviser_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:3048'
        ]);

        $Upload_model = new Adviser;
        $Upload_model->adviser_fname = $request->input('adviser_fname');
        $Upload_model->adviser_lname = $request->input('adviser_lname');
        $Upload_model->adviser_designation = $request->input('adviser_designation');

        if($request->hasfile('adviser_filename'))
        {
            foreach($request->file('adviser_filename') as $image)
            {
                $name=$image->hashName();
                $image->move('adviser_images/', $name);  // your folder path
                $data[] = $name;
            }
        }
        
        $Upload_model->adviser_filename = json_encode($data);
        $Upload_model->save();

        return redirect('/advisers');
    }

    public function edit(Adviser $adviser)
    {
        return view('advisers.edit', compact('adviser'));
    }

    public function update(Request $request, Adviser $adviser)
    {

        $this->validate($request, [
            'adviser_fname' => 'required',
            'adviser_lname' => 'required',
            'adviser_designation' => 'required',
            'adviser_filename' => 'required',
            'adviser_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:3048'
        ]);

        $Upload_model = Adviser::find($adviser->id);
        $Upload_model->adviser_fname = $request->input('adviser_fname');
        $Upload_model->adviser_lname = $request->input('adviser_lname');
        $Upload_model->adviser_designation = $request->input('adviser_designation');

        if($request->hasfile('adviser_filename'))
        {
            foreach (json_decode($Upload_model->adviser_filename, true) as $image) {

            $destination = 'adviser_images/'.$image;
            if(File::exists($destination)){
            File::delete($destination);
            }
            }

            foreach($request->file('adviser_filename') as $image)
            {
                $name=$image->hashName();
                $image->move('adviser_images/', $name);  // your folder path
                $data[] = $name;
            }
        }
        
        $Upload_model->adviser_filename = json_encode($data);
        $Upload_model->update();
        
        return redirect('/advisers/');
    }   

    public function destroy(Adviser $adviser)
    {
        $Upload_model = Adviser::find($adviser->id);

        foreach (json_decode($Upload_model->adviser_filename, true) as $image) {

            $destination = 'adviser_images/'.$image;
            if(File::exists($destination)){
            File::delete($destination);
            }
        }

        $adviser->delete();
        return redirect('/advisers');
    }

}
