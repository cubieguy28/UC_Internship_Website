@extends('layouts.app')

@section('content')

<div class="p-5">

	<h1 class="text-5xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13;font-variant: small-caps;">Industry Partners</h1>

	@auth

	<a href="/partners/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Partner</a> <br><br>

	@endauth

	<div class="flex flex-wrap justify-around px-24" style="color: #003d13;">

		@if (count($partners) == 0)

		<p>No results.</p>

		@endif

		@foreach($partners as $partner)
		<div class="rounded-lg flex text-center grid justify-items-center mb-10 rounded-lg py-10 bg-gray-50 shadow-2xl" style="width:48%;">
			<div class="grid justify-items-center">

				<div class="flex grid gap-2 grid-cols-2 rounded-lg p-3" style="color: #003d13; ">
					<div class="flex justify-center items-center rounded-lg">

						<?php foreach (json_decode($partner->partner_filename) as $picture) { ?>

							<img class="object-cover w-full" src="{{ asset('/partner_images/'.$picture) }}" style="max-height:180px; max-width:180px" />

						<?php } ?>

						<br>

					</div>

					<div class="text-left m-2">
						<h1 class="font-bold">{{ $partner->partner_name }}</h1>
						<p class="text-sm">
							{{ \Illuminate\Support\Str::limit($partner->partner_description, 200, $end='...') }}
						</p>

						<a target="_blank" href="/partners/{{ $partner -> id }}" onclick="myFunctionRead()" id="myBtn" class="text-xs italic">Read more</a>

					</div>

				</div>

			</div>

		</div>
		@endforeach
	</div>

	<br>

	{!! $partners->appends(\Request::except('page'))->render() !!}

</div>

@endsection