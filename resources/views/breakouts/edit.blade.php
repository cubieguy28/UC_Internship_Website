@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap justify-center">

	<div class="w-full max-w-xs">

		<h1 class="text-3xl font-bold tracking-wider text-center mb-2" style="color: #003d13; font-variant: small-caps;">Add Breakout Session</h1>

		<form action="/breakouts/{{ $breakout->id }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
			@include('layouts.errors')
			@csrf

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="breakout_title">
					Title
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="breakout_title" name="breakout_title" type="text" placeholder="Title" required value="{{ $breakout->breakout_title }}">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="breakout_fname">
					First Name
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="breakout_fname" name="breakout_fname" type="text" placeholder="First Name" required value="{{ $breakout->breakout_fname }}">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="breakout_lname">
					Last Name
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="breakout_lname" name="breakout_lname" type="text" placeholder="Last Name" required value="{{ $breakout->breakout_lname }}">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="breakout_designation">
					Designation
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="breakout_designation" name="breakout_designation" type="text" placeholder="Designation" required value="{{ $breakout->breakout_designation }}">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="breakout_filename">Choose your image (Maximum: 5MB)</label>
				<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="breakout_filename[]" name="breakout_filename[]" required>
			</div>

			<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
			</button>

		</form>

	</div>
</div>



@endsection