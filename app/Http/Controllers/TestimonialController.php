<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials'));
    }

    public function show(Testimonial $testimonial)
    {
        
        return view('testimonials.show', compact('testimonial'));
    }

    public function create()
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
                'testimonial_fname' => 'required',
                'testimonial_lname' => 'required',
                'testimonial_title' => 'required',
                'testimonial_testimony' => 'required',
                'testimonial_filename' => 'required',
                'testimonial_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:3048'
        ]);

        $Upload_model = new Testimonial;
        $Upload_model->testimonial_fname = $request->input('testimonial_fname');
        $Upload_model->testimonial_lname = $request->input('testimonial_lname');
        $Upload_model->testimonial_title = $request->input('testimonial_title');
        $Upload_model->testimonial_testimony = $request->input('testimonial_testimony');

        if($request->hasfile('testimonial_filename'))
        {
            foreach($request->file('testimonial_filename') as $image)
            {
                $name=$image->hashName();
                $image->move('testimonial_images/', $name);  // your folder path
                $data[] = $name;
            }
        } 
        
        $Upload_model->testimonial_filename = json_encode($data);
        $Upload_model->save();

        return redirect('/testimonials');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('testimonials.edit', compact('testimonial'));
    }

        public function editImg(Testimonial $testimonial)
    {
        return view('testimonials.edit-img', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {

        $this->validate($request, [
                'testimonial_fname' => 'required',
                'testimonial_lname' => 'required',
                'testimonial_title' => 'required',
                'testimonial_testimony' => 'required',
        ]);

        $Upload_model = Testimonial::find($testimonial->id);
        $Upload_model->testimonial_fname = $request->input('testimonial_fname');
        $Upload_model->testimonial_lname = $request->input('testimonial_lname');
        $Upload_model->testimonial_title = $request->input('testimonial_title');
        $Upload_model->testimonial_testimony = $request->input('testimonial_testimony');

        $Upload_model->update();
        
        return redirect('/testimonials');
        // return redirect()->back()->with('status', 'Updated Successfully'); redirect back to same page
    }  

    public function updateImg(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
                'testimonial_filename' => 'required',
                'testimonial_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:3048'
        ]);

        $Upload_model = Testimonial::find($testimonial->id);

        if($request->hasfile('testimonial_filename'))
        {
            
            foreach (json_decode($Upload_model->testimonial_filename, true) as $image) {

            $destination = 'testimonial_images/'.$image;
            if(File::exists($destination)){
            File::delete($destination);
            }
            }
            
            foreach($request->file('testimonial_filename') as $image)
            {
                $name=$image->hashName();
                $image->move('testimonial_images/', $name);  // your folder path
                $data[] = $name;
            }
        }
        
        $Upload_model->testimonial_filename = json_encode($data);
        $Upload_model->update();
        
        return redirect('/testimonials');
    }

    public function destroy(Testimonial $testimonial)
    {
        $Upload_model = Testimonial::find($testimonial->id);

        foreach (json_decode($Upload_model->testimonial_filename, true) as $image) {

            $destination = 'testimonial_images/'.$image;
            if(File::exists($destination)){
            File::delete($destination);
            }
        }
        
        $testimonial->delete();
        return redirect('/testimonials');
    }

}
