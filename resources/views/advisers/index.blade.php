@extends('layouts.app')

@section('content')

	<div class="p-5">			

		<h1 class="text-3xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13;">ABOUT</h1>

		@auth

		<a href="/advisers/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Adviser</a> <br><br>

		@endauth

		<div class="flex grid gap-4 grid-cols-2 px-24" style="color: #003d13;">

		<div class="rounded-lg p-3 flex text-center grid justify-items-center">  
	    	<div class="grid justify-items-center">

		    	<div class="grid gap-4 grid-cols-2">
		    		<div class="mt-6">
		    			<div class="bg-gray-300">
			    			<img src="testpic.png">
			    		</div>

			    		<br>

			    		<div class="bg-gray-300">
			    			<img src="testpic.png">
			    		</div>
		    		</div>

		    		<div>
		    			<div class="bg-gray-300">
			    			<img src="testpic.png">
			    		</div>

			    		<br>

			    		<div class="bg-gray-300">
			    			<img src="testpic.png">
			    		</div>
		    			
		    		</div>
		    		
		    	</div>

		    </div>

	    </div>

	    <div class="flex text-center grid justify-items-center">  
	    	<div class="grid justify-items-center text-left">

		    <h1 class="text-2xl italic font-bold tracking-wider text-center p-2" style="color: #003d13;">INTERNSHIP PROGRAM</h1>
         		<h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h1>

         		<h1 class="text-2xl italic font-bold tracking-wider text-center p-2" style="color: #003d13;">OBJECTIVES</h1>
         		<h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</h1>	 	    		    

		    </div>

	    </div>

	</div>


	<h1 class="text-3xl italic font-bold tracking-wider my-10 text-center" style="color: #003d13;">INTERNSHIP ADVISERS</h1>


		<div class="flex grid gap-10 grid-cols-3 px-24" style="color: #003d13;">

			@if (count($advisers) == 0)

                <p>No results.</p>

            @endif

			@foreach($advisers as $adviser)

			<div class="rounded-lg p-10 flex text-center grid justify-items-center border-2 border-black">  
			    <div class="grid justify-items-center">		    
			    
			    <?php foreach (json_decode($adviser->adviser_filename)as $picture) { ?>
			    	<a href="/advisers/{{ $adviser -> id }}">
	                 <img src="{{ asset('/adviser_images/'.$picture) }}" style="height:250px; width:250px"/>
	                 </a>
	         	<?php } ?>

	         	<br>

			    <div class="font-bold">
		         		<h1>{{ $adviser->adviser_fname }} {{ $adviser->adviser_lname }}</h1>	    		    
				    	<h1 class="text-sm font-normal">{{ $adviser->adviser_designation }}</h1>
		         </div>
			
		    	</div>
		    </div>

	    	@endforeach
    	</div>


	</div>

@endsection