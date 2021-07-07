@extends('layouts.app')

@section('content')

	<div class="p-5 flex flex-wrap content-center">
					      		
		<div class="w-full max-w-xs">
			<form action="/testimonials/{{ $testimonial->id }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
				@method("PUT")
				@include('layouts.errors')
				@csrf

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_fname">
			        First Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_fname" name="testimonial_fname" type="text" placeholder="First Name" value="{{ $testimonial->testimonial_fname }}">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_lname">
			        Last Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_lname" name="testimonial_lname" type="text" placeholder="Last Name" value="{{ $testimonial->testimonial_lname }}">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_title">
			        Title
			      </label>
			      <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_title" name="testimonial_title" selected="{{ $testimonial->testimonial_title }}">
			      	<option class="py-1">BSIT Graduate</option>
				    <option class="py-1">BSCS Graduate</option>
			      </select>
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_testimony">
			        Testimony
			      </label>
			      <textarea class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_testimony" name="testimonial_testimony">{{ $testimonial->testimonial_testimony }}</textarea>
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="filename">Choose your image</label>
			    	<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="filename[]" name="filename[]" multiple="multiple">
			    </div>

				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
				</button>

			</form>
		</div>
	</div>



@endsection