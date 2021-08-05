@extends('layouts.app')

@section('content')

<div class="flex justify-around items-center bg-black shadow-lg">

		<div class="slideshow-container">


				<div class="flex justify-center">
					<?php foreach (json_decode($testimonial->testimonial_video) as $video) { ?>
						<video class="max-h-full object-contain h-screen w-screen" controls>
							<source src="{{ asset('/testimonial_videos/'.$video) }}" type="video/mp4">
						</video>
					<?php } ?>
				</div>



		</div>

	</div>

@endsection