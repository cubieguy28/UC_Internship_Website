@extends('layouts.app')

@section('content')

	<div class="p-5">

		<h1 class="text-3xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13;">ALUMNI TESTIMONIALS</h1>

		<a href="/testimonials/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Testimony</a> <br><br>
		  
		<div class="flex grid gap-10 grid-cols-2 px-24" style="color: #003d13;">
			@foreach($testimonials as $testimonial)
			    <!-- <h1>ID = <a href="/testimonials/{{ $testimonial -> id }}">{{ $testimonial->id }}</a></h1> -->
			    
        		<div class="rounded-lg p-3 bg-gray-100 flex text-center grid justify-items-center">  
			    	<div class="grid justify-items-center">
				    <h1>
				    	<a href="/testimonials/{{ $testimonial -> id }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded-full text-xs">Edit ID({{ $testimonial->id }})</a>
				    </h1>

				    <?php foreach (json_decode($testimonial->testimonial_filename)as $picture) { ?>

				    		<button>
								<img class="" src="{{ asset('/testimonial_images/'.$picture) }}" style="border-radius: 50%; width: 300px; height: 300px;"/>	
				    		</button> 				
		                 
		         	<?php } ?>

		         	<br>

		         	<div class="rounded-lg p-2 px-32 text-white font-bold" style="background-color: #003d13;">
		         		<h1>{{ $testimonial->testimonial_fname }} {{ $testimonial->testimonial_lname }}</h1>	    
				    
				    	<h1 class="text-sm font-normal">{{ $testimonial->testimonial_title }}</h1>
		         	</div>

				    
				    
				    

				    </div>

			    </div>
			    
				    <!-- <h1>{{ $testimonial->testimonial_testimony }}</h1> -->
				    

			    
	    	@endforeach

		      <div class="popup" onclick="myFunction()">
		        Click here
		        <div class="popuptext" id="myPopup">

		        <div class="flex grid gap-4 grid-cols-2 rounded-lg p-3 bg-gray-100" style="color: #003d13;">
		        	<div class="flex text-center grid justify-items-center"> 
		        		<img src="testpic.png" style="border-radius: 50%; width: 300px; height: 300px;">
		        	</div>
		        	<h1>My description</h1>
		        </div>
		        
		    	</div>
		      </div>

		      <script>
		        function myFunction() {
		          var popup = document.getElementById("myPopup");
		          popup.classList.toggle("show");
		        }
		      </script>

		</div>

	</div>

@endsection