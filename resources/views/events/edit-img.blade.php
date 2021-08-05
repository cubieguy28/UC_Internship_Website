@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap justify-center">

	<div class="w-full max-w-xs">

		<h1 class="text-3xl font-bold tracking-wider text-center mb-2" style="color: #003d13; font-variant: small-caps;">Change Image</h1>

		<form action="/events/img/{{ $event->id }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
			@method("PUT")
			@csrf

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_filename">Choose your images (Maximum: 5MB per Image)</label>
				<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="event_filename[]" name="event_filename[]" multiple="multiple" required>
			</div>

			<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
			</button>

		</form>
	</div>
</div>



@endsection