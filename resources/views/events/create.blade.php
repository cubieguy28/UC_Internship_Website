@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap justify-center">

	<div class="w-full max-w-xs">

		<h1 class="text-3xl font-bold tracking-wider text-center mb-2" style="color: #003d13; font-variant: small-caps;">Create Event</h1>

		<form action="/events" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
			<!-- @include('layouts.errors') -->
			@csrf

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_name">
					Event Name
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_name" name="event_name" type="text" placeholder="Name" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_description">
					Event Description
				</label>
				<textarea class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_description" name="event_description" required placeholder="Write event description here..."></textarea>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_speaker_fname">
					Event Speaker First Name (Optional)
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_speaker_fname" name="event_speaker_fname" type="text" placeholder="Event Speaker First Name">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_speaker_lname">
					Event Speaker Last Name (Optional)
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_speaker_lname" name="event_speaker_lname" type="text" placeholder="Event Speaker Last Name">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_category">
					Event Category
				</label>
				<select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_category" name="event_category" required>
					<option class="py-1" disabled selected value>Select an option</option>
					<option class="py-1">Company Visits</option>
					<option class="py-1">Interviews</option>
					<option class="py-1">Meetings</option>
					<option class="py-1">Orientations</option>
					<option class="py-1">Programs</option>
					<option class="py-1">Recruitments</option>
					<option class="py-1">Revalida-Recognition</option>
					<option class="py-1">Seminar-Workshop</option>
					<option class="py-1">Talks</option>
					<option class="py-1">Trainings</option>
					<option class="py-1">Others</option>
				</select>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_date">Event Date</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" id="event_date" name="event_date" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_time">Event Time (Optional)</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="time" id="event_time" name="event_time">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_participant">Event Participants (Optional)</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="event_participant" name="event_participant">
			</div>

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