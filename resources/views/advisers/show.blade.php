@extends('layouts.app')

@section('content')

	<div class="p-5">

		@auth
	
		<a href="/advisers/{{ $adviser->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>

		<a href="/advisers/img/{{ $adviser->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>

		<form action="/advisers/{{ $adviser->id }}" method="POST">

			@csrf
			@method('DELETE')
			
				<button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline delete-confirm" type="submit">DELETE
					
				</button>
		</form>

		@endauth

	</div>

@endsection