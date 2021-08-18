@extends('layouts.app')

@section('content')

<div class="p-5">
	<div class="flex justify-center">
		<img src="/75years.jpg" style="max-height:100px; max-width:100px;">
		<div class="border border-green-800 mx-4" style="max-height:120px;"></div>
		<div class="">
			<h1 class="text-5xl font-bold tracking-wider text-center" style="color: #003d13;font-variant: small-caps;">Upskilling the Faculty</h1>
			<hr>
			<p class="italic text-2xl">Innovative Practices in UC's Digital Learning Space</p>
			<div class="flex items-center">
				<div class="bg-green-300 rounded-lg flex p-1 shadow-lg border border-green-800">
					<p>Webinar via Zoom</p>
					<img src="/zoom.png" style="max-height:25px; max-width:25px;">
				</div>
			</div>
		</div>

		<div class="w-1/4 ml-20">
			<div class="text-center text-white bg-green-300 rounded-lg p-4">
			<p class="text-2xl text-green-900 font-bold">• Key Takeaways •</p>
			<br>
			<div class="flex items-center bg-green-600 rounded-lg p-2 font-semibold">
				<img src="/key_discovery.png" style="max-height:50px; max-width:50px;">
				<p>Discover new digital learning experience using innovative educational solutions</p>
			</div>
			<br>
			<div class="flex items-center bg-green-700 rounded-lg p-2 font-semibold">
				<img src="/key_learn.png" style="max-height:50px; max-width:50px;">
				<p>Learn practical guide to designing and delivering ODL</p>
			</div>
			</div>
		</div>	
	</div>
	
	<br>

	@auth

	<a href="/webinars/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Webinar</a> <br><br>

	@endauth

	<div class="flex justify-center flex-wrap">
		
		@foreach($webinars as $webinar)

		<div class="mx-2 mt-2" style="width:45%;">



			<p class="text-3xl text-center font-bold">{{ \Carbon\Carbon::parse($webinar->webinar_date)->format('M d, Y') }}</p>

			<div class="shadow-xl p-5 rounded-lg">

						<a href="/webinars/{{ $webinar->id }}/edit" class="mr-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a><br><br>

				<p class="text-2xl font-bold italic text-gray-700">Plenary</p>
				<br>
				<div class="flex items-center">
					<?php foreach (json_decode($webinar->speaker_filename) as $picture) { ?>

							<img class="shadow-xl border-4 border-white object-cover w-full" src="{{ asset('/webinar_images/'.$picture) }}" style="max-height:150px; max-width:150px; border-radius: 50%;">

					<?php } ?>
					
					<div class="ml-2">
						<p class="text-2xl font-semibold text-green-300">{{ $webinar->webinar_title }}</p>
						<p class="text-sm text-gray-500">{{ $webinar->speaker_fname }} {{ $webinar->speaker_lname }}, {{ $webinar->speaker_designation }}</p>
					</div>
				</div>

				<br> <hr> <br>

				<p class="text-xl font-bold text-gray-700">Time: {{\Carbon\Carbon::createFromFormat('H:i:s',$webinar->webinar_time)->format('h:i A')}}
				</p>
				<p class="text-xl font-bold text-gray-700">Meeting ID: {{ $webinar->webinar_id }}</p>
				<p class="text-xl font-bold text-gray-700">Meeting Passcode: {{ $webinar->webinar_code }}</p>
				<p class="text-xl font-bold text-gray-700">Join Zoom Meeting</p>
				<a class="hover:text-green-600" target="_blank" href="{{ $webinar->webinar_link }}">{{ \Illuminate\Support\Str::limit($webinar->webinar_link, 50, $end='...') }}</a>
				

				
			</div>
		</div>

		@endforeach
	</div>

<!-- 	<div class="flex justify-center flex-wrap">

		<div class="mx-2 mt-2" style="width:45%;">
			<p class="text-3xl text-center font-bold">Date</p>

			<div class="shadow-xl p-5 rounded-lg">
				
				<img src="/webinar_test.jpg">

			</div>
		</div>

	</div> -->



</div>

@endsection