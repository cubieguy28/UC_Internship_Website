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

		
			
		
		<div class="slideshow-container">		
	
			<?php foreach (json_decode($event->event_filename)as $picture) { ?>
				<div class="mySlides fade">
      			
                 <img src="{{ asset('/event_images/'.$picture) }}"/>
                  
              </div>
		
         	<?php } ?>

         	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  			<a class="next" onclick="plusSlides(1)">&#10095;</a>

         </div>

         <h1 class="text-3xl font-bold tracking-wider mt-8 text-center" style="color: #003d13;">{{ $event->event_name }}</h1>
         <h1 class="text-xl italic tracking-wider text-center" style="color: #003d13;">{{ $event->event_category }}</h1>

         <h1 class="text-xs italic tracking-wider text-center">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }} | {{\Carbon\Carbon::createFromFormat('H:i:s',$event->event_time)->format('h:i A')}}</h1>



					    	

     	<div class="font-bold text-left px-24">
     		<h1 class="italic text-xl">About this event:</h1>	
     		<p>{{ $event->event_description }}</p> 
     		<br>
     		<h1 class="italic text-xl">Speaker of this event:</h1>
     		@if($event->event_speaker_fname && $event->event_speaker_lname == "N/A")
     		<p>N/A</p>
     		@else
     		<p>{{ $event->event_speaker_fname }} {{ $event->event_speaker_lname }}</p>
     		@endif
     		<p></p>
     		<br> 
     		<h1 class="italic text-xl">No. of Participants:</h1>
     		<h1>{{ $event->event_participant }}</h1>
		</div>

	</div>

@endsection