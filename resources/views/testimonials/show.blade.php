@extends('layouts.app')

@section('content')

	<div class="p-5">
	
		<a href="/testimonials/{{ $testimonial->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>
		<form action="/testimonials/{{ $testimonial->id }}" method="POST">

			@csrf
			@method('DELETE')
			
				<button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">DELETE
					
				</button>
			

		</form>
	
		<?php foreach (json_decode($testimonial->testimonial_filename)as $picture) { ?>
                 <img src="{{ asset('/testimonial_images/'.$picture) }}" style="height:120px; width:200px"/>
         	<?php } ?>

	    <h1>First Name = {{ $testimonial->testimonial_fname }}</h1>

	    <h1>Last Name = {{ $testimonial->testimonial_lname }}</h1>		    
	    
	    <h1>Title = {{ $testimonial->testimonial_title }}</h1>
	    
	    <h1>Testimony = {{ $testimonial->testimonial_testimony }}</h1>

	</div>

@endsection