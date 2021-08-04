@extends('layouts.app')

@section('content')

<div class="p-5">

	@auth

	<a href="/testimonials/{{ $testimonial->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>

	<a href="/testimonials/img/{{ $testimonial->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>

	@if (!in_array("null", json_decode($testimonial->testimonial_video)))
	<a href="/testimonials/vid/{{ $testimonial->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Video</a> <br><br>
	@else
	<a href="/testimonials/vid/{{ $testimonial->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Add Video</a> <br><br>
	@endif

	<form action="/testimonials/{{ $testimonial->id }}" method="POST">
		@csrf
		@method('DELETE')
		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline delete-confirm" type="submit">DELETE
		</button>
	</form>

	@endauth

	<div class="flex grid gap-4 grid-cols-2 rounded-lg p-3" style="color: #003d13; ">
		<div class="flex text-center grid justify-items-center">
			<?php foreach (json_decode($testimonial->testimonial_filename) as $picture) { ?>
				<img src="{{ asset('/testimonial_images/'.$picture) }}" style="border-radius: 50%; max-height:450px; max-width:450px" />
			<?php } ?>

			<br>

			<div class="rounded-lg p-2 px-32 text-white font-bold" style="background-color: #003d13;">
				<h1>{{ $testimonial->testimonial_fname }} {{ $testimonial->testimonial_lname }}</h1>
				<h1 class="text-sm font-normal">{{ $testimonial->testimonial_title }}</h1>
			</div>

		</div>

		<div class="box3 sb14">
			<h1>{{ $testimonial->testimonial_testimony }}</h1>
		</div>

	</div>

	@if(!in_array("null", json_decode($testimonial->testimonial_video)))
	<div class="flex justify-end ">
		<button class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-10">Watch video!</button>
	</div>
	@endif

	<!--Modal-->
	<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
		<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

		<div class="modal-container bg-white w-11/12 rounded shadow-lg z-50 overflow-y-auto">

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
					<p class="text-2xl font-bold">{{ $testimonial->testimonial_fname }} {{ $testimonial->testimonial_lname }}'s Testimony</p>
					<div class="modal-close cursor-pointer z-50">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
					</div>
				</div>

				<!--Body-->
				@if(!in_array("null", json_decode($testimonial->testimonial_video)))
				<div class="flex justify-center">
					<?php foreach (json_decode($testimonial->testimonial_video) as $video) { ?>
						<video class="" controls>
							<source src="{{ asset('/testimonial_videos/'.$video) }}" type="video/mp4">
						</video>
					<?php } ?>
				</div>

				@endif

			</div>
		</div>
	</div>

</div>

@endsection