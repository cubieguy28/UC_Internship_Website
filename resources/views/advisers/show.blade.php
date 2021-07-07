@extends('layouts.app')

@section('content')

	<div class="p-5">
	
		<a href="/advisers/{{ $adviser->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>
		<form action="/advisers/{{ $adviser->id }}" method="POST">

			@csrf
			@method('DELETE')
			
				<button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">DELETE
					
				</button>
			

		</form>
	
		<h1>Image = <? if{{ $adviser->adviser_image }} ?? null ?></h1>
		    
	    <h1>First Name = {{ $adviser->adviser_fname }}</h1>
	    
	    <h1>Last Name = {{ $adviser->adviser_lname }}</h1>

	    <h1>Designation = {{ $adviser->adviser_designation }}</h1>

	</div>

@endsection