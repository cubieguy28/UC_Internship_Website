@extends('layouts.app')

@section('content')

	<div class="p-5">

		<h1 class="text-3xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13;">ACTIVITIES</h1>

		<a href="/events/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Event</a> <br><br>

		@foreach($events as $event)
		    
		    <h1>
		    	<a href="/events/{{ $event -> id }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded-full text-xs">Edit ID({{ $event->id }})</a>
		    </h1>
		    
		    
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

		    <span>---------------------------------------------------------------------------</span>
		    
    	@endforeach


	</div>

@endsection