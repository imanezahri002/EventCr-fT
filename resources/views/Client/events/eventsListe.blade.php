@extends('Client.layout')

@section('title', 'Liste des événements')

@section('content')


<div id="events" class="tab-content active">


    <div class="mb-8 flex justify-between items-center">
      <h2 class="text-2xl font-bold text-gray-800">Événements à venir</h2>
      <div class="relative">
        <input type="text" placeholder="Rechercher un événement..." class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>
    </div>

    <!-- Featured Event -->
    <div class="mb-8 rounded-2xl overflow-hidden shadow-lg relative">
      <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-600 opacity-90"></div>
      <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Concert" class="w-full h-80 object-cover mix-blend-overlay">
      <div class="absolute inset-0 p-8 flex flex-col justify-end text-white">
        <span class="bg-white bg-opacity-30 text-white text-xs font-semibold px-3 py-1 rounded-full w-max backdrop-blur-sm">À LA UNE</span>
        <h3 class="text-3xl font-bold mt-2">Festival de Musique Électronique</h3>
        <div class="flex items-center mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <span>15-17 Juillet 2024</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span>Parc des Expositions, Paris</span>
        </div>
        <p class="mt-2 text-sm text-white text-opacity-90 max-w-2xl">Rejoignez-nous pour trois jours de musique électronique avec les meilleurs DJs internationaux, des installations artistiques et une ambiance inoubliable.</p>
        <button class="mt-4 bg-white text-purple-600 font-semibold py-2 px-6 rounded-full hover:bg-opacity-90 transition-all shadow-md">Réserver maintenant</button>
      </div>
    </div>

    <!-- Events Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Event Card 1 -->
      @foreach ($events as $event)
      <div class="glass-effect rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
        <div class="relative">
          <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Théâtre" class="w-full h-48 object-cover">
          <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-400 to-pink-600 text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $event->categorie->nom }}</div>
        </div>
        <div class="p-5">
          <h3 class="text-lg font-semibold text-gray-800">{{$event->title}}</h3>
          <div class="flex items-center mt-2 text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>{{$event->date}},{{$event->time}} </span>
          </div>
          <div class="flex items-center mt-1 text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>{{$event->location}}</span>
          </div>
            <p
              class="mt-2 text-sm text-gray-600 line-clamp-3">{{$event->description}}</p>
            </p>
          <div class="flex justify-between items-center mt-4">
            <span class="font-semibold text-gray-800">{{$event->prix}} MAD</span>

            <a href="{{route('reservations.create',$event)}}" class="bg-gradient-to-r from-purple-400 to-pink-600 text-white text-sm font-medium py-1.5 px-4 rounded-full hover:opacity-90 transition-all">Réserver</a>

        </div>
        </div>
      </div>

      @endforeach

</div>


@endsection
