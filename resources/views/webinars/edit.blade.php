@extends('layouts.app')

@section('content')

<div class="p-5 flex flex-wrap justify-center">

	<div class="w-full max-w-xs">

		<h1 class="text-3xl font-bold tracking-wider text-center mb-2" style="color: #003d13; font-variant: small-caps;">Edit Webinar</h1>

		<form action="/webinars/{{ $webinar->id }}" method="POST">

		@csrf
		@method('DELETE')

			<div class="flex justify-center	">	
		<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline modal-open">DELETE
		</button>
</div>
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
		        </div>
		        
		      </div>
		    </div>
		  </div>

	</form>

		<form action="/webinars/{{ $webinar->id }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
			@method("PUT")
			
			<!-- @include('layouts.errors') -->
			@csrf

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="webinar_title">
					Webinar Title
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="webinar_title" name="webinar_title" type="text" placeholder="Webinar Title" value="{{ $webinar->webinar_title }}" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="event_date">Webinar Date</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" id="webinar_date" name="webinar_date" value="{{ $webinar->webinar_date }}" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="webinar_time">Webinar Time</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="time" id="webinar_time" name="webinar_time" required value="{{ $webinar->webinar_time}}">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="webinar_link">Meeting Link</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="webinar_link" name="webinar_link" required value="{{ $webinar->webinar_link }}">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="webinar_id">Meeting ID</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="webinar_id" name="webinar_id" required value="{{ $webinar->webinar_id }}">
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="webinar_code">Meeting Passcode</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="webinar_code" name="webinar_code" value="{{ $webinar->webinar_code }}" required>
			</div>


			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="speaker_fname">
					First Name
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="speaker_fname" name="speaker_fname" type="text" placeholder="First Name" value="{{ $webinar->speaker_fname }}" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="speaker_lname">
					Last Name
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="speaker_lname" name="speaker_lname" type="text" placeholder="Last Name" value="{{ $webinar->speaker_lname }}" required>
			</div>

			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" for="speaker_designation">
					Designation
				</label>
				<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="speaker_designation" name="speaker_designation" type="text" placeholder="Designation" value="{{ $webinar->speaker_designation }}" requried>
			</div>

			<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
				Submit
			</button>

		</form>

	</div>
</div>



@endsection