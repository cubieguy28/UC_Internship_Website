@extends('layouts.app')

@section('content')

	<div class="p-5">

		<a href="/testimonials/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Testimony</a> <br><br>

		@foreach($testimonials as $testimonial)
		    <!-- <h1>ID = <a href="/testimonials/{{ $testimonial -> id }}">{{ $testimonial->id }}</a></h1> -->
		    
		    <h1>
		    	<a href="/testimonials/{{ $testimonial -> id }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded-full text-xs">Edit ID({{ $testimonial->id }})</a>
		    </h1>

		    <?php foreach (json_decode($testimonial->testimonial_filename)as $picture) { ?>
                 <img src="{{ asset('/testimonial_images/'.$picture) }}" style="height:120px; width:200px"/>
         	<?php } ?>

		    <h1>First Name = {{ $testimonial->testimonial_fname }}</h1>

		    <h1>Last Name = {{ $testimonial->testimonial_lname }}</h1>		    
		    
		    <h1>Title = {{ $testimonial->testimonial_title }}</h1>
		    
		    <h1>Testimony = {{ $testimonial->testimonial_testimony }}</h1>

		    <span>---------------------------------------------------------------------------</span>
		    
    	@endforeach

	</div>



@endsection