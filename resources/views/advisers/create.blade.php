@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap content-center">
					      		
			<div class="w-full max-w-xs">

			  <form action="/advisers" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
			  	@include('layouts.errors')
				@csrf

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="adviser_fname">
			        First Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="adviser_fname" name="adviser_fname" type="text" placeholder="First Name">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="adviser_lname">
			        Last Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="adviser_lname" name="adviser_lname" type="text" placeholder="Last Name">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="adviser_designation">
			        Designation
			      </label>
			      <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="adviser_designation" name="adviser_designation">
			      	<option class="py-1">BSIT Instructor</option>
				    <option class="py-1">BSCS Instructor</option>
			      </select>
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="adviser_image">Choose your image</label>
			    	<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="adviser_image" name="adviser_image">
			    </div>

				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
				</button>

			  </form>

			</div>
</div>



@endsection