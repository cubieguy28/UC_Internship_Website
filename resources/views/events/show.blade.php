@extends('layouts.app')

@section('content')

	@auth
	<div class="p-5">

	<a href="/events/{{ $event->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>

	<a href="/events/img/{{ $event->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>

	<form action="/events/{{ $event->id }}" method="POST">

		@csrf
		@method('DELETE')

		<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline delete-confirm" type="submit">DELETE

		</button>

	</form>

	</div>
	@endauth

	<div class="flex justify-around items-center bg-black shadow-lg">
		<a class="prev hover:bg-gray-700" onclick="plusSlides(-1)">&#10094;</a>

		<div class="slideshow-container">

			<?php foreach (json_decode($event->event_filename) as $picture) { ?>
				<div class="mySlides fade">

					<img src="{{ asset('/event_images/'.$picture) }}" class="max-h-full object-contain h-screen w-screen" />

				</div>

			<?php } ?>

		</div>

		<a class="next hover:bg-gray-700" onclick="plusSlides(1)">&#10095;</a>
	</div>

	<div class="mt-4 p-5">

		<h1 class="text-5xl font-bold tracking-widest text-center" style="color: #003d13; font-variant: small-caps;">"{{ $event->event_name }}"</h1>
		<h1 class="text-xl italic tracking-wider text-center mb-2" style="color: #003d13;">{{ $event->event_category }}</h1>

		<h1 class="text-xs italic tracking-wider text-center">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}@if($event->event_time) | {{\Carbon\Carbon::createFromFormat('H:i:s',$event->event_time)->format('h:i A')}}@endif</h1>

		<div class="font-bold text-left px-24 flex justify-between mt-44">
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