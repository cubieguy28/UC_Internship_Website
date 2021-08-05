@extends('layouts.app')

@section('content')

<!-- BODY -->
<div class="w-full">
    <img src="body.jpg">
</div>

<!-- LATEST EVENTS -->
<div class="w-full h-auto bg-white p-24">
    <h1 class="text-5xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13; font-variant: small-caps;">Latest Events</h1>



    <div class=" flex justify-center">
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