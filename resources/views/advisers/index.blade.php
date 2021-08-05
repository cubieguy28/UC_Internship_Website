@extends('layouts.app')

@section('content')

<div class="p-5">

	<h1 class="text-5xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13; font-variant: small-caps;">About</h1>

	<div class="flex grid gap-4 grid-cols-2 px-24" style="color: #003d13;">

		<div class="rounded-lg p-3 flex text-center grid justify-items-center">
			<div class="grid justify-items-center">

				<div class="flex flex-between flex-wrap">
					<div class="mt-10 mr-10">
							<img src="about_pre_images/about_img.jpg" class="shadow-lg transform rotate-45" style="max-height:230px ;max-width:230px;">
						<br>

						<img src="about_pre_images/about_img_3.jpg" class="shadow-lg transform rotate-12" style="max-height:230px ; max-width:230px;">
					</div>

					<div>
						<img src="about_pre_images/about_img_4.jpg" class="shadow-lg transform rotate-2" style="max-height:250px ; max-width:250px; ">

						<br>

						<img src="about_pre_images/about_img_2.jpg" class="shadow-lg transform -rotate-12" style="max-height:250px ; max-width:250px; ">

					</div>

				</div>

			</div>

		</div>

		<div class="flex text-center grid justify-items-center">
			<div class="grid justify-items-center text-left">

				<h1 class="text-2xl italic font-bold tracking-wider text-center p-2" style="color: #003d13; font-variant: small-caps;">Internship Program</h1>
				<h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h1>

				<h1 class="text-2xl italic font-bold tracking-wider text-center p-2" style="color: #003d13;">OBJECTIVES</h1>
				<h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</h1>

			</div>

		</div>

	</div>


	<h1 class="text-3xl italic font-bold tracking-wider my-10 text-center" style="color: #003d13;">INTERNSHIP ADVISERS</h1>

	@auth

	<a href="/advisers/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Adviser</a> <br><br>

	@endauth


	<div class="flex flex-wrap justify-around px-24" style="color: #003d13;">

		@if (count($advisers) == 0)

		<p>No results.</p>

		@endif

		@foreach($advisers as $adviser)

		<div class="rounded-lg p-10 text-center border-2 border-black shadow-lg mb-10">
			<div class="">

				<?php foreach (json_decode($adviser->adviser_filename) as $picture) { ?>
					@auth
					<a href="/advisers/{{ $adviser -> id }}">
						<img class="rounded-lg object-cover w-full" src="{{ asset('/adviser_images/'.$picture) }}" style="max-height:250px;" />
					</a>
					@else
					<img class="rounded-lg object-cover w-full" src="{{ asset('/adviser_images/'.$picture) }}" style="max-height:250px;" />
					@endauth

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

	<br>

	{!! $advisers->appends(\Request::except('page'))->render() !!}

</div>

	<button class="modal-open focus:outline-none">
		<p style="opacity:0;">I</p>
	</button>

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
		          <p class="text-2xl font-bold text-blue-500">What's up!</p>
		          <div class="modal-close cursor-pointer z-50">
		            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
		              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
		            </svg>
		          </div>
		        </div>

		        <!--Body-->
		        <p>This website is designed and developed by these awesome people:</p>
		        <div class="text-center font-bold text-3xl text-green-500" style="font-variant: small-caps;">
		        	<p>Allyssa Louisse Lacanilao</p>
			        <p>Diana Andrea Basobas</p>
			        <p>Jolie Janelle Villagracia</p>
			        <p>Mark Eirrol Molina</p>
			        <p>Vince Ivan Minez</p>
		        </div>
		     
		      </div>
		    </div>
		  </div>

@endsection