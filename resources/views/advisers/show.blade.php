@extends('layouts.app')

@section('content')

<div class="p-5">

	@auth

	<a href="/advisers/{{ $adviser->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>

	<a href="/advisers/img/{{ $adviser->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>

	<form action="/advisers/{{ $adviser->id }}" method="POST">

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
		        </div>
		        
		      </div>
		    </div>
		  </div>
	</form>

	@endauth

</div>

@endsection