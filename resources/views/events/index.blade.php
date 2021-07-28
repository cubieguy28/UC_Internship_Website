@extends('layouts.app')

@section('content')

	<div class="p-5">

		<h1 class="text-3xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13;">ACTIVITIES</h1>

		<a href="/events/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Event</a> <br><br>

		<div class="px-24">
        

    	<div class="flex items-center grid gap-4 grid-cols-4 mb-16" style="color: #003d13;">

    	@foreach($events as $event)

            <div class="grid grid-cols-2 rounded-lg p-3 bg-gray-100" style="height: 250px;">

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
	</div>

@endsection