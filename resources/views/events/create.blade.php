@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap content-center">
					      		
			<div class="w-full max-w-xs">

			  <form action="/events" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
			  	@include('layouts.errors')
				@csrf

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="event_name">
			        Event Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_name" name="event_name" type="text" placeholder="Name">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="event_description">
			        Event Description
			      </label>
			      <textarea class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_description" name="event_description"></textarea>
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="event_speaker_fname">
			        Event Speaker First Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_speaker_fname" name="event_speaker_fname" type="text" placeholder="Event Speaker Last Name">
			    </div>

				<div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="event_speaker_lname">
			        Event Speaker Last Name
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_speaker_lname" name="event_speaker_lname" type="text" placeholder="Event Speaker Last Name">
			    </div>

			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="event_category">
			        Event Category
			      </label>
			      <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event_category" name="event_category">
			      	<option class="py-1">Company Visits</option>
				    <option class="py-1">Interviews</option>
				    <option class="py-1">Meetings</option>
				    <option class="py-1">Orientations</option>
				    <option class="py-1">Seminar-Workshop</option>
				    <option class="py-1">Talks</option>
				    <option class="py-1">Trainings</option>
				    <option class="py-1">Others</option>
			      </select>
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="event_date">Event Date</label>
  					<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" id="event_date" name="event_date">
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="event_time">Event Time</label>
  					<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="time" id="event_time" name="event_time">
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="event_participant">Event Participants</label>
  					<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="event_participant" name="event_participant">
			    </div>

			    <div class="mb-4">
			    	<label class="block text-gray-700 text-sm font-bold mb-2" for="event_image">Choose your image</label>
			    	<input type="file" class="w-full text-gray-700 px-3 py-2 border rounded" id="event_image" name="event_image">
			    </div>

				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
				</button>

			  </form>

			</div>
</div>



@endsection