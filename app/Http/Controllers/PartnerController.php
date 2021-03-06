<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::paginate(6);
        return view('partners.index', compact('partners'));
    }

    public function show(Partner $partner)
    {

        return view('partners.show', compact('partner'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'partner_name' => 'required',
            'partner_description' => 'required',
            'partner_category' => 'required',
            'partner_contact_person_fname',
            'partner_contact_person_lname',
            'partner_email',
            'partner_mobile_number',
            'partner_landline_number',
            'partner_tagline',
            'partner_link',
            'partner_filename' => 'required',
            'partner_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:5048'

        ]);

        $Upload_model = new Partner;
        $Upload_model->partner_name = $request->input('partner_name');
        $Upload_model->partner_description = $request->input('partner_description');
        $Upload_model->partner_category = $request->input('partner_category');
        $Upload_model->partner_contact_person_fname = $request->input('partner_contact_person_fname');
        $Upload_model->partner_contact_person_lname = $request->input('partner_contact_person_lname');
        $Upload_model->partner_email = $request->input('partner_email');
        $Upload_model->partner_mobile_number = $request->input('partner_mobile_number');
        $Upload_model->partner_landline_number = $request->input('partner_landline_number');
        $Upload_model->partner_tagline = $request->input('partner_tagline');
        $Upload_model->partner_link = $request->input('partner_link');

        if ($request->hasfile('partner_filename')) {
            foreach ($request->file('partner_filename') as $image) {
                $name = $image->hashName();
                $image->move('partner_images/', $name);  // your folder path
                $data[] = $name;
            }
        }

        $Upload_model->partner_filename = json_encode($data);
        $Upload_model->save();

        return redirect('/partners');
    }

    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    public function editImg(Partner $partner)
    {
        return view('partners.edit-img', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {

        $this->validate($request, [
            'partner_name' => 'required',
            'partner_description' => 'required',
            'partner_category' => 'required',
            'partner_contact_person_fname',
            'partner_contact_person_lname',
            'partner_email',
            'partner_mobile_number',
            'partner_landline_number',
            'partner_tagline',
            'partner_link',
        ]);

        $Upload_model = Partner::find($partner->id);
        $Upload_model->partner_name = $request->input('partner_name');
        $Upload_model->partner_description = $request->input('partner_description');
        $Upload_model->partner_category = $request->input('partner_category');
        $Upload_model->partner_contact_person_fname = $request->input('partner_contact_person_fname');
        $Upload_model->partner_contact_person_lname = $request->input('partner_contact_person_lname');
        $Upload_model->partner_email = $request->input('partner_email');
        $Upload_model->partner_mobile_number = $request->input('partner_mobile_number');
        $Upload_model->partner_landline_number = $request->input('partner_landline_number');
        $Upload_model->partner_tagline = $request->input('partner_tagline');
        $Upload_model->partner_link = $request->input('partner_link');

        $Upload_model->update();

        return redirect('/partners/'.$partner->id);
    }

    public function updateImg(Request $request, Partner $partner)
    {
        $this->validate($request, [
            'partner_filename' => 'required',
            'partner_filename.*' => 'image|mimes:jpeg,png,jpg,svg|max:5048'

        ]);

        $Upload_model = Partner::find($partner->id);

        if ($request->hasfile('partner_filename')) {

            foreach (json_decode($Upload_model->partner_filename, true) as $image) {

                $destination = 'partner_images/' . $image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            foreach ($request->file('partner_filename') as $image) {
                $name = $image->hashName();
                $image->move('partner_images/', $name);  // your folder path
                $data[] = $name;
            }
        }

        $Upload_model->partner_filename = json_encode($data);
        $Upload_model->update();

        return redirect('/partners/'.$partner->id);
    }

    public function destroy(Partner $partner)
    {
        $Upload_model = Partner::find($partner->id);

        foreach (json_decode($Upload_model->partner_filename, true) as $image) {

            $destination = 'partner_images/' . $image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        $partner->delete();
        return redirect('/partners');
    }
}
