@extends('layouts.app')

@section('content')

<div class="p-5">

	@auth

	<a href="/partners/{{ $partner->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>
	<a href="/partners/img/{{ $partner->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>
	<form action="/partners/{{ $partner->id }}" method="POST">

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
		@if($partner->partner_contact_person_fname || $partner->partner_contact_person_lname)
		<div>
			<p class="text-center font-bold">{{ $partner->partner_contact_person_fname }} {{ $partner->partner_contact_person_lname }}</p>
			<p class="text-center text-sm text-gray-500">Contact Person</p>
		</div>
		@endif

		@if($partner->partner_link)
		<div>
			
			<p class="text-center text-gray-500">Visit our website at <a target="_blank" href="{{ $partner->partner_link }}" class="text-center font-bold text-black">{{ $partner->partner_link }}</a></p>
			
		</div>
		@endif
		
	</div>
	
	</div>

</div>

@endsection