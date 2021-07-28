@extends('layouts.app')

@section('content')

	<div class="p-5">

		<h1 class="text-3xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13;">ACTIVITIES</h1>

		<a href="/events/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Event</a> <br><br>

		<!-- @foreach($events as $event)
		    
		    <h1>
		    	<a href="/events/{{ $event -> id }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded-full text-xs">Edit ID({{ $event->id }})</a>
		    </h1>
		    
		    <div class="carousel js-flickity" data-flickity='{ "cellAlign": "left", "contain": true }'>
		    <?php foreach (json_decode($event->event_filename)as $picture) { ?>
			    
			    	
					    <div class="carousel-cell">
			        	<img src="{{ asset('/event_images/'.$picture) }}"/>
			         	</div>
		         	  	
	         	
         	<?php } ?>
         	</div>
         	
		    
		    <h1>Event Name = {{ $event->event_name }}</h1>
		    
		    <h1>Event Description = {{ $event->event_description }}</h1>

		    <h1>Event Speaker First Name = {{ $event->event_speaker_fname }}</h1>

		    <h1>Event Speaker Last Name = {{ $event->event_speaker_lname }}</h1>

		    <h1>Event Category = {{ $event->event_category }}</h1>

		    <h1>Event Date = {{ $event->event_date }}</h1>

		    <h1>Event Time = {{ $event->event_time }}</h1>

		    <h1>Event Participants = {{ $event->event_participant }}</h1>
		    
    	@endforeach -->

    	<div class="flex items-center grid gap-4 grid-cols-4 mb-16" style="color: #003d13;">

    	@foreach($events as $event)

            <div class="grid grid-cols-2 rounded-lg p-3 bg-gray-100">

                <div class="col-span-full">
                    <div class="absolute p-1 bg-gray-100 rounded-lg text-xs mt-2 ml-2 italic">
                    			    
			    		@if($event->image_counter == 1) 
			    			<p>{{ $event->image_counter }} photo</p>
			    		
			    		@else
                        <p>{{ $event->image_counter }} photos</p>
                        @endif
                        
                    </div>
                    <a href="/events/{{ $event -> id }}">
                        <?php foreach (json_decode($event->event_filename)as $picture) { ?>		    
			    	
						    <div class="carousel-cell">
				        	<img src="{{ asset('/event_images/'.$picture) }}"/>
				         	</div>

				         	@break
		         	  	
         				<?php } ?>
                    </a>
                              
                </div>

                <div class="col-span-full font-bold mt-2">
                    <span>{{ $event->event_name }}</span>
                </div>

                <div class="col-start-1 text-xs italic mt-2">
                    <span>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</span>
                </div>

                <div class="col-start-2 text-right text-xs italic mt-2">
                    <span>{{ $event->event_category }}</span>
                </div> 

            </div>

        @endforeach

        

        </div>

        {{ $events->links() }}
	</div>

@endsection