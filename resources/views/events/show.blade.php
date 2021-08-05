@extends('layouts.app')

@section('content')

	@auth
	<div class="p-5">

	<a href="/events/{{ $event->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>

	<a href="/events/img/{{ $event->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>

	<form action="/events/{{ $event->id }}" method="POST">

		@csrf
		@method('DELETE')

		<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline modal-open">DELETE
		</button>

		<!-- MODAL DELETE -->
		<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
		    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
		    
		    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
		      
		      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
		        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
		          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
		        </svg>
		        <span class="text-sm">(Esc)</span>
		      </div>

		      <!-- Add margin if you want to see some of the overlay behind the modal-->
		      <div class="modal-content py-4 text-left px-6">
		        <!--Title-->
		        <div class="flex justify-between items-center pb-3">
		          <p class="text-2xl font-bold">Delete Confirmation</p>
		          <div class="modal-close cursor-pointer z-50">
		            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
		              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
		            </svg>
		          </div>
		        </div>

		        <!--Body-->
		        <p>Are you sure you want to delete this?</p>

		        <!--Footer-->
		        <div class="flex justify-end pt-2">
		          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline mr-4" type="submit">DELETE
					</button>
		          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400 font-bold">CLOSE</button>
		        </div>
		        
		      </div>
		    </div>
		  </div>
	</form>

	</div>
	@endauth

	<div class="flex justify-around items-center bg-black shadow-lg">
		<a class="prev hover:bg-gray-700 h-screen flex items-center" onclick="plusSlides(-1)">&#10094;</a>

		<div class="slideshow-container">

			<?php foreach (json_decode($event->event_filename) as $picture) { ?>
				<div class="mySlides fade">

					<img src="{{ asset('/event_images/'.$picture) }}" class="max-h-full object-contain h-screen w-screen" />

				</div>

			<?php } ?>

		</div>

		<a class="next hover:bg-gray-700 h-screen flex items-center" onclick="plusSlides(1)">&#10095;</a>
	</div>

	<div class="mt-4 p-5">

		<h1 class="text-5xl font-bold tracking-widest text-center" style="color: #003d13; font-variant: small-caps;">"{{ $event->event_name }}"</h1>
		<h1 class="text-xl italic tracking-wider text-center mb-2" style="color: #003d13;">{{ $event->event_category }}</h1>

		<h1 class="text-xs italic tracking-wider text-center">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}@if($event->event_time) | {{\Carbon\Carbon::createFromFormat('H:i:s',$event->event_time)->format('h:i A')}}@endif</h1>

		<div class="font-bold text-left px-24 flex justify-between mt-32">
			<div class="w-3/4">
				<h1 class="italic text-3xl">About this event:</h1>
				<p class="">{{ $event->event_description }}</p>
			</div>
			<div>
				<h1 class="italic text-xl">Speaker of this event:</h1>
				<p>{{ $event->event_speaker_fname }} {{ $event->event_speaker_lname }}</p>
				<br>
				@if($event->event_participant)
				<h1 class="italic text-xl">No. of Participants:</h1>
				<h1>{{ $event->event_participant }}</h1>
				@endif
			</div>
		</div>

	</div>

@endsection