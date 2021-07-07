@extends('layouts.app')

@section('content')

	<div class="p-5">

		<a href="/partners/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Partner</a> <br><br>

		@foreach($partners as $partner)
		    
		    <h1>
		    	<a href="/partners/{{ $partner -> id }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded-full text-xs">Edit ID({{ $partner->id }})</a>
		    </h1>
		    
		    
		    <h1>Image = <? if{{ $partner->partner_image }} ?? null ?></h1>
		    
		    <h1>Name = {{ $partner->partner_name }}</h1>
		    
		    <h1>Description = {{ $partner->partner_description }}</h1>

		    <h1>Contact Person First Name = {{ $partner->partner_contact_person_fname }}</h1>

		    <h1>Contact Person Last Name = {{ $partner->partner_contact_person_lname }}</h1>
		    
		    <h1>Email = {{ $partner->partner_email }}</h1>

		    <h1>Mobile No. = {{ $partner->partner_mobile_number }}</h1>

		    <h1>Landline No. = {{ $partner->partner_landline_number }}</h1>

		    <span>---------------------------------------------------------------------------</span>
		    
    	@endforeach


	</div>

@endsection