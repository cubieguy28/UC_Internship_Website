@extends('layouts.app')

@section('content')

	<div class="p-5">

		<a href="/advisers/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Adviser</a> <br><br>

		@foreach($advisers as $adviser)
		    
		    <h1>
		    	<a href="/advisers/{{ $adviser -> id }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded-full text-xs">Edit ID({{ $adviser->id }})</a>
		    </h1>
		    
		    
		    <?php foreach (json_decode($adviser->adviser_filename)as $picture) { ?>
                 <img src="{{ asset('/adviser_images/'.$picture) }}" style="height:120px; width:200px"/>
         	<?php } ?>
		    
		    <h1>First Name = {{ $adviser->adviser_fname }}</h1>
		    
		    <h1>Last Name = {{ $adviser->adviser_lname }}</h1>

		    <h1>Designation = {{ $adviser->adviser_designation }}</h1>

		    <span>---------------------------------------------------------------------------</span>
		    
    	@endforeach


	</div>

@endsection