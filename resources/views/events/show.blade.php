@extends('layouts.app')

@section('content')

	<div class="p-5">
	
		<a href="/events/{{ $event->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>

		<a href="/events/img/{{ $event->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>

		<form action="/events/{{ $event->id }}" method="POST">

			@csrf
			@method('DELETE')
			
				<button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline delete-confirm" type="submit">DELETE
					
				</button>
			

		</form>
	
			<?php foreach (json_decode($event->event_filename)as $picture) { ?>
                 <img src="{{ asset('/event_images/'.$picture) }}" style="height:120px; width:200px"/>
         	<?php } ?>
		    
		    <h1>Event Name = {{ $event->event_name }}</h1>
		    
		    <h1>Event Description = {{ $event->event_description }}</h1>

		    <h1>Event Speaker First Name = {{ $event->event_speaker_fname }}</h1>

		    <h1>Event Speaker Last Name = {{ $event->event_speaker_lname }}</h1>

		    <h1>Event Category = {{ $event->event_category }}</h1>

		    <h1>Event Date = {{ $event->event_date }}</h1>

		    <h1>Event Time = {{ $event->event_time }}</h1>

		    <h1>Event Participants = {{ $event->event_participant }}</h1>

	</div>

@endsection