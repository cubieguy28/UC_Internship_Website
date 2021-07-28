@extends('layouts.app')

@section('content')

	<div class="p-5">
	
		<a href="/testimonials/{{ $testimonial->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a><br><br>

		<a href="/testimonials/img/{{ $testimonial->id }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Change Image</a><br><br>

		<form action="/testimonials/{{ $testimonial->id }}" method="POST">
			@csrf
			@method('DELETE')
			<button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline delete-confirm" type="submit">DELETE
			</button>
		</form>

		        <div class="flex grid gap-4 grid-cols-2 rounded-lg p-3" style="color: #003d13; ">
		        	<div class="flex text-center grid justify-items-center"> 
		        		<?php foreach (json_decode($testimonial->testimonial_filename)as $picture) { ?>
                 			<img src="{{ asset('/testimonial_images/'.$picture) }}" style="border-radius: 50%; height:450px; width:450px"/>
         				<?php } ?>

         				<br>

         				<div class="rounded-lg p-2 px-32 text-white font-bold" style="background-color: #003d13;">
		         		<h1>{{ $testimonial->testimonial_fname }} {{ $testimonial->testimonial_lname }}</h1>	    		    
				    	<h1 class="text-sm font-normal">{{ $testimonial->testimonial_title }}</h1>
		         	</div>

		        	</div>

		        	<div class="box3 sb14"><h1>{{ $testimonial->testimonial_testimony }}</h1></div>

		        </div>
		        

	</div>

@endsection