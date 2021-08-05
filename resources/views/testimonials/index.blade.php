@extends('layouts.app')

@section('content')

<div class="p-5">

	<h1 class="text-5xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13; font-variant: small-caps;">Alumni Testimonials</h1>

	@auth

	<a href="/testimonials/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Testimony</a> <br><br>

	@endauth

	<div class="flex flex-wrap justify-around px-24" style="color: #003d13;">

		@if (count($testimonials) == 0)

		<p>No results.</p>

		@endif

		@foreach($testimonials as $testimonial)

		<div class="rounded-lg p-3 flex text-center grid justify-items-center">
			<div class="grid justify-items-center">

				<?php foreach (json_decode($testimonial->testimonial_filename) as $picture) { ?>

					<a href="/testimonials/{{ $testimonial -> id }}">
						<img class="object-cover w-full" src="{{ asset('/testimonial_images/'.$picture) }}" style="border-radius: 50%; max-width: 300px; max-height: 300px;" />
					</a>

				<?php } ?>

				<br>

				<div class="rounded-lg p-2 px-32 text-white font-bold" style="background-color: #003d13;">
					<h1>{{ $testimonial->testimonial_fname }} {{ $testimonial->testimonial_lname }}</h1>
					<h1 class="text-sm font-normal">{{ $testimonial->testimonial_title }}</h1>
				</div>

			</div>

		</div>

		@endforeach

	</div>

	<br>

	{!! $testimonials->appends(\Request::except('page'))->render() !!}

</div>

@endsection