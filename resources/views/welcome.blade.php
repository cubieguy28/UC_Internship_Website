@extends('layouts.app')

@section('content')

<!-- BODY -->
<div class="" style=
    "background-image: url('/body.JPG');
    background-size: contain;
    background-repeat: no-repeat;
    width: 100%;
    height: 0;
    padding-top: 38.34%;">
    <!-- <img src="/body.JPG"> -->
</div>

<!-- LATEST EVENTS -->
<div class="w-full h-auto bg-white p-24">
    <h1 class="text-5xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13; font-variant: small-caps;">Latest Events</h1>

    <div class="flex items-center grid gap-4 grid-cols-4 mb-16" style="color: #003d13;">

        @foreach($events as $event)

        <div class="grid grid-cols-2 rounded-lg p-3 bg-gray-100" style="height: 235px;">

            <div class="col-span-full">
                <div class="absolute p-1 bg-gray-100 rounded-lg text-xs mt-2 ml-2 italic">

                    @if($event->image_counter == 1)
                    <p>{{ $event->image_counter }} photo</p>

                    @else
                    <p>{{ $event->image_counter }} photos</p>
                    @endif

                </div>
                <a href="/events/{{ $event -> id }}">
                    <?php foreach (json_decode($event->event_filename) as $picture) { ?>

                        <div class="flex justify-center">
                            <img class="rounded-lg object-cover w-full" src="{{ asset('/event_images/'.$picture) }}" style="max-height: 140px;"/>
                        </div>

                        @break

                    <?php } ?>
                </a>

            </div>

            <div class="col-span-full font-bold mt-2">
                <span>{{ $event->event_name }}</span>
            </div>

            <div class="col-start-1 text-xs italic mt-2">
                <span>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</span>
            </div>

            <div class="col-start-2 text-right text-xs italic mt-2">
                <span>{{ $event->event_category }}</span>
            </div>

        </div>

        @endforeach
    </div>

    <div class="flex justify-center">
        <a href="/events">
            <button class="rounded-lg p-2 px-6 text-white font-bold" style="background-color: #003d13;">
                VIEW GALLERY
            </button>
        </a>
    </div>


</div>

<!-- PURPOSE -->

<div class="w-full h-auto flex justify-around" style="background-color: #003d13;">
    <div class="w-5/6 p-5">
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlidesAuto fade">
                <div class="numbertext"></div>
                <img class="rounded-lg" src="display.png" class="object-cover object-center h-auto w-full">
            </div>

            <div class="mySlidesAuto fade">
                <div class="numbertext"></div>
                <img class="rounded-lg" src="test.png" class="object-cover object-center h-auto w-full">
            </div>

        </div>
        <!-- Slideshow end -->
    </div>
    <div class="text-white font-bold tracking-widest p-10 w-1/2">
        <h1 class="text-5xl italic" style="font-variant: small-caps;">Internships With A Purpose</h1>
        <br>
        <br>
        <p class="">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            <br>
            <br>
            <br>
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>

    </div>
</div>

<!-- PARTNERS -->
<div class="w-full h-auto bg-white flex justify-around">

    <div class="p-20 w-1/3 font-bold tracking-widest" style="color: #003d13;">
        <h1 class="text-5xl">WORKING WITH THE BEST PARTNERS</h1>
        <br>
        <br>
        <p class="">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        </p>
        <a href="/partners">
            <button class="rounded-lg p-2 px-6 text-white font-bold mt-10" style="background-color: #003d13;">
                VIEW ALL
            </button>
        </a>


    </div>

    <div class=" grid grid-cols-3 w-4/5 flex items-center">
        <img src="p_logos/texas.jpeg" class="max-h-52">
        <img src="p_logos/accenture.jpg" class="p-5 max-h-52">
        <img src="p_logos/bitshares.jpeg" class="p-5 max-h-52">
        <img src="p_logos/fujitsu.jpeg" class="p-5 max-h-52">
        <img src="p_logos/pines.jpg" class="p-10 max-h-52">
        <img src="p_logos/linkage.jpg" class="p-5 max-h-52">
        <img src="p_logos/monol.png" class="p-5 max-h-52">
        <img src="p_logos/trend_micro.jpg" class="p-5 max-h-52">
        <img src="p_logos/alejo.jpg" class="p-10 max-h-52">
    </div>

</div>

@endsection