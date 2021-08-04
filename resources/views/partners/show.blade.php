@extends('layouts.app')

@section('content')

<div class="p-5">

	@auth

	<a href="/partners/{{ $partner->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>
	<a href="/partners/img/{{ $partner->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>
	<form action="/partners/{{ $partner->id }}" method="POST">

		@csrf
		@method('DELETE')

		<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline delete-confirm" type="submit">DELETE

		</button>

	</form>

	@endauth


	<h1 class="text-6xl italic font-bold tracking-widest mb-2 text-center" style="color: #003d13;font-variant: small-caps;">{{ $partner->partner_name }}</h1>

	<h1 class="text-3xl italic tracking-widest mb-10 text-center" style="color: #003d13;font-variant: small-caps;">{{ $partner->partner_category }}</h1>

	<div class="flex justify-around items-center rounded-lg p-10 bg-gray-50 shadow-2xl mx-48 mb-24" style="color: #003d13; ">
		<div class="flex text-center grid justify-items-center w-1/4">
			<?php foreach (json_decode($partner->partner_filename) as $picture) { ?>
				<img class="object-cover w-full" src="{{ asset('/partner_images/'.$picture) }}" style="max-height:200px; max-width:200px" />
			<?php } ?>

		</div>

		<div class="w-3/4 ml-6">
			@if($partner->partner_tagline)
			<h1 class="text-3xl font-semibold tracking-wider text-center mb-2" style="color: #003d13;font-variant: small-caps;">"{{ $partner->partner_tagline }}"</h1>
			@endif
			<h1>{{ $partner->partner_description }}</h1>
		</div>

	</div>

	<h1 class="text-3xl italic tracking-widest mb-10 text-center" style="color: #003d13;font-variant: small-caps;">CONTACT US</h1>

	<div class="mx-60">
	<p class="text-center text-gray-500">If you have any questions or concerns, please send us an email <span class="font-bold text-black">{{ $partner->partner_email }}</span>@if($partner->partner_landline_number || $partner->partner_mobile_number) or call <span class="font-bold text-black">{{ $partner->partner_landline_number }}@if($partner->partner_landline_number && $partner->partner_mobile_number) / @endif{{ $partner->partner_mobile_number }}</span>@endif. We would be delighted to address any questions you may have and schedule a meeting with you. </p>

	<br>
	<div class="flex justify-around items-center">
		<div>
			<p class="text-center font-bold">{{ $partner->partner_contact_person_fname }} {{ $partner->partner_contact_person_lname }}</p>
			<p class="text-center text-sm text-gray-500">Contact Person</p>
		</div>

		@if($partner->partner_link)
		<div>
			
			<p class="text-center text-gray-500">Visit our website at <a href="" class="text-center font-bold text-black">{{ $partner->partner_link }}</a></p>
			
		</div>
		@endif
		
	</div>
	
	</div>

</div>

@endsection