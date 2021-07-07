<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adviser;

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

    public function store()
    {
        // Create new event
        $validated_fields = request()->validate([
            'adviser_fname' => 'required',
            'adviser_lname' => 'required',
            'adviser_designation' => 'required',

        ]);

        $adviser = Adviser::create($validated_fields);

        return redirect('/advisers');
    }

    public function edit(Adviser $adviser)
    {
        return view('advisers.edit', compact('adviser'));
    }

    public function update(Adviser $adviser)
    {

        $validated_fields = request()->validate([
            'adviser_fname' => 'required',
            'adviser_lname' => 'required',
            'adviser_designation' => 'required',

        ]);

        $adviser->update($validated_fields);
        
        return redirect('/advisers/');
    }   

    public function destroy(Adviser $adviser)
    {
        $adviser->delete();
        return redirect('/advisers');
    }

}
