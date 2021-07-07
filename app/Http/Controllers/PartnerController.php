<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
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

    public function store()
    {
        // Create new event
        $validated_fields = request()->validate([
            'partner_name' => 'required',
            'partner_description' => 'required',
            'partner_contact_person_fname' => 'required',
            'partner_contact_person_lname' => 'required',
            'partner_email' => 'required',
            'partner_mobile_number' => 'required',
            'partner_landline_number' => 'required',

        ]);

        $partner = Partner::create($validated_fields);

        return redirect('/partners');
    }

    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    public function update(Partner $partner)
    {

        $validated_fields = request()->validate([
            'partner_name' => 'required',
            'partner_description' => 'required',
            'partner_contact_person_fname' => 'required',
            'partner_contact_person_lname' => 'required',
            'partner_email' => 'required',
            'partner_mobile_number' => 'required',
            'partner_landline_number' => 'required',


        ]);

        $partner->update($validated_fields);
        
        return redirect('/partners/');
    }   

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect('/partners');
    }

}
