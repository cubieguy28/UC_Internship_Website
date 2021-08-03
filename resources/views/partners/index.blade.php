@extends('layouts.app')

@section('content')

	<div class="p-5">

		<h1 class="text-3xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13;">INDUSTRY PARTNERS</h1>

		@auth

		<a href="/partners/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Partner</a> <br><br>

		@endauth

		<div class="flex grid gap-10 grid-cols-2 px-24" style="color: #003d13;">

			@if (count($partners) == 0)

                <p>No results.</p>

            @endif
            
			@foreach($partners as $partner)
				<div class="rounded-lg flex text-center grid justify-items-center">  
			    	<div class="grid justify-items-center">

					    <div class="flex grid gap-2 grid-cols-2 rounded-lg p-3" style="color: #003d13; ">
				        	<div class="flex grid justify-items-center rounded-lg bg-gray-100"> 
				        		
				        		<?php foreach (json_decode($partner->partner_filename)as $picture) { ?>
				        				
		                 			<img class="mt-6" src="{{ asset('/partner_images/'.$picture) }}" style="height:150px; width:150px"/>
			                 			
			         			<?php } ?>			         			

			     				<br>

				        	</div>

				        		<div class="text-left m-2">
					        		<h1 class="font-bold">{{ $partner->partner_name }}</h1>
									<p class="text-sm">
									    {{ \Illuminate\Support\Str::limit($partner->partner_description, 200, $end='...') }}									    
									</p>

									<a href="/partners/{{ $partner -> id }}" onclick="myFunctionRead()" id="myBtn" class="text-xs italic">Read more</a>



					        	</div>
								
				        </div>

			    </div>

			</div>
	    	@endforeach
    	</div>


	</div>

@endsection