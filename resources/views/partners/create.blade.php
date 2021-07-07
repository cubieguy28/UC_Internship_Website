@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap content-center">
					      		
			<div class="w-full max-w-xs">

			  <form action="/partners" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
			  	@include('layouts.errors')
				@csrf

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_name">
			        Company Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_name" name="partner_name" type="text" placeholder="Company Name">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_description">
			        Company Description
			      </label>
			      <textarea class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_description" name="partner_description"></textarea>
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_contact_person_fname">
			        Company Contact Person First Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_contact_person_fname" name="partner_contact_person_fname" type="text" placeholder="First Name">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_contact_person_lname">
			        Company Contact Person Last Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_contact_person_lname" name="partner_contact_person_lname" type="text" placeholder="Last Name">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_email">
			        Company Email
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_email" name="partner_email" type="email" placeholder="Company Email">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_mobile_number">
			        Mobile No.
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_mobile_number" name="partner_mobile_number" type="text" placeholder="Contact No.">
			    </div>
			    
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="partner_landline_number">
			        Landline No.
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="partner_landline_number" name="partner_landline_number" type="text" placeholder="Landline No.">
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="partner_filename">Choose your image</label>
			    	<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="partner_filename[]" name="partner_filename[]">
			    </div>

				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
				</button>

			  </form>

			</div>
</div>



@endsection