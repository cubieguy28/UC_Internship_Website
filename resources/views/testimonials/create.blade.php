@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap justify-center">

	<div class="w-full max-w-xs">

		<h1 class="text-3xl font-bold tracking-wider text-center mb-2" style="color: #003d13; font-variant: small-caps;">Create Testimonial</h1>

		<form action="/testimonials" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
			<!-- @include('layouts.errors') -->
			@csrf

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_fname">
					First Name
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_fname" name="testimonial_fname" type="text" placeholder="First Name" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_lname">
					Last Name
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_lname" name="testimonial_lname" type="text" placeholder="Last Name" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_title">
					Title
				</label>
				<select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_title" name="testimonial_title">
					<option class="py-1" disabled selected value>Select an option</option>
					<option class="py-1">BSIT Graduate</option>
					<option class="py-1">BSCS Graduate</option>
				</select>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_testimony">
					Testimony
				</label>
				<textarea class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="testimonial_testimony" name="testimonial_testimony" placeholder="Write testimony here..." required></textarea>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="testimonial_filename">Choose your image (Maximum: 5MB)</label>
				<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="testimonial_filename[]" name="testimonial_filename[]" required>
			</div>

			<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
			</button>

		</form>

	</div>
</div>



@endsection