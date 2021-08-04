@extends('layouts.app')

@section('content')

<div class="p-5">

  <h1 class="text-3xl italic font-bold tracking-wider mb-16 text-center" style="color: #003d13; font-variant: small-caps;">Activities</h1>

  @auth

  <a href="/events/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Event</a> <br><br>

  @endauth

  <div class="flex justify-around">

    <!-- FOR SEARCH -->
    <div class="w-1/3">
      <form action="/search" method="get">
        <div class="flex items-center w-2/3 ml-10">

          <input class="border border-green-800 shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search" type="search" name="search" placeholder="Search">

          <div class="p-4">
            <button class="text-green-800 border border-green-800 rounded-full p-2 hover:bg-green-600 focus:outline-none w-12 h-12 flex items-center justify-center" type="submit">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>


    <!-- FOR SORT -->
    <div class="w-1/3">
      <form action="/sort" method="get">
        <div class="flex items-center w-2/3">

          <select class="border border-green-800 shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sort" name="sort">
            <option class="py-1" disabled selected value>Sort by</option>

            <option class="py-1" id="asc" name="asc">Date from earliest</option>

            <option class="py-1" id="desc" name="desc">Date from latest</option>
          </select>

          <div class="p-4">
            <button class="text-green-800 border border-green-800 rounded-full p-2 hover:bg-green-600 focus:outline-none w-12 h-12 flex items-center justify-center" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </button>
          </div>

        </div>
      </form>
    </div>

    <!-- FOR FILTER -->
    <div class="w-1/3">
      <form action="/filter" method="get">
        <div class="flex items-center w-full">

          <select class="border border-green-800 shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="filter-by-year" name="filter-by-year">
            <option class="py-1" disabled selected value>Filter by year</option>
          </select>

          <select class="border border-green-800 shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-4" id="filter-by-category" name="filter-by-category">
            <option class="py-1" disabled selected value>Filter by category</option>
            <option class="py-1">Company Visits</option>
            <option class="py-1">Interviews</option>
            <option class="py-1">Meetings</option>
            <option class="py-1">Orientations</option>
            <option class="py-1">Seminar-Workshop</option>
            <option class="py-1">Talks</option>
            <option class="py-1">Trainings</option>
            <option class="py-1">Others</option>
          </select>


          <div class="p-4">
            <button class="text-green-800 border border-green-800 rounded-full p-2 hover:bg-green-600 focus:outline-none w-12 h-12 flex items-center justify-center" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <br>

  <div class="px-24">

    <div class="flex items-center grid gap-4 grid-cols-4 mb-16" style="color: #003d13;">

      @if (count($events) == 0)

      <p>No results.</p>

      @endif

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

    {!! $events->appends(\Request::except('page'))->render() !!}

  </div>
</div>

@endsection