@extends('layouts.app')

@section('content')

	<div class="p-5 flex flex-wrap content-center">
					      		
		<div class="w-full max-w-xs">
			<form action="/partners/{{ $partner->id }}" method="POST">
				@method("PUT")
				@include('layouts.errors')
				@csrf

				<div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_name">
			        Company Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_name" name="partner_name" type="text" placeholder="Company Name" value="{{ $partner->partner_name }}">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_description">
			        Company Description
			      </label>
			      <textarea class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_description" name="partner_description">{{ $partner->partner_description }}</textarea>
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_contact_person_fname">
			        Company Contact Person First Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_contact_person_fname" name="partner_contact_person_fname" type="text" placeholder="First Name" value="{{ $partner->partner_contact_person_fname }}">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_contact_person_lname">
			        Company Contact Person Last Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_contact_person_lname" name="partner_contact_person_lname" type="text" placeholder="Last Name" value="{{ $partner->partner_contact_person_lname }}">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_email">
			        Company Email
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_email" name="partner_email" type="email" placeholder="Company Email" value="{{ $partner->partner_email }}">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_mobile_number">
			        Mobile No.
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_mobile_number" name="partner_mobile_number" type="text" placeholder="Contact No." value="{{ $partner->partner_mobile_number }}">
			    </div>
			    
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_landline_number">
			        Landline No.
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_landline_number" name="partner_landline_number" type="text" placeholder="Landline No." value="{{ $partner->partner_landline_number }}">
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="partner_image">Choose your image</label>
			    	<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="partner_image" name="partner_image" value="{{ $partner->partner_image }}">
			    </div>

				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
				</button>

			</form>
		</div>
	</div>



@endsection