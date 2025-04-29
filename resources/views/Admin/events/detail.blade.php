@extends('Admin.layout')
@section('title', 'Events')
@section('content')

<div class="bg-white rounded-xl overflow-hidden shadow-xl w-full max-w-3xl mx-auto mb-3 mt-3 ">
    <!-- Image d'événement -->
    <div class="relative h-48 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-violet-500 to-fuchsia-500 opacity-90"></div>
      <img
        src="https://placehold.co/800x400"
        alt="Image de l'événement"
        class="w-full h-full object-cover mix-blend-overlay"
      />
      <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 text-xs font-semibold text-purple-700 shadow-lg">
        <div class="flex items-center gap-1">
          <!-- Users icon -->
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
          <span>{{$event->max_participants}} participants</span>
        </div>
      </div>
    </div>

    <!-- Contenu -->
    <div class="p-6">
      <div class="flex items-start justify-between">
        <div>
          <h2 class="text-2xl font-bold text-gray-800 mb-1">{{$event->title}}</h2>
          <p class="text-purple-600 font-medium">Organisé par {{$event->organisateur->user->nom}}</p>
        </div>
        <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">{{$event->categorie->nom}}</span>
      </div>

      <div class="mt-6 space-y-3">
        <div class="flex items-center text-gray-700">
          <!-- Calendar icon -->
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-purple-500 mr-3">
            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
            <line x1="16" x2="16" y1="2" y2="6"></line>
            <line x1="8" x2="8" y1="2" y2="6"></line>
            <line x1="3" x2="21" y1="10" y2="10"></line>
          </svg>
          <span>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}</span>

        </div>
        <div class="flex items-center text-gray-700">
          <!-- Clock icon -->
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-purple-500 mr-3">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
          </svg>
          <span>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</span>
        </div>
        <div class="flex items-center text-gray-700">
          <!-- MapPin icon -->
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-purple-500 mr-3">
            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
            <circle cx="12" cy="10" r="3"></circle>
          </svg>
          <span>{{$event->location}}</span>
        </div>
        <div class="flex items-center text-gray-700">
          <!-- Music icon -->
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-purple-500 mr-3">
            <circle cx="12" cy="12" r="10"/>
            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/>
            <path d="M12 18V6"/>
          </svg>
          <span>{{$event->prix}}</span>
        </div>
      </div>

      <div class="mt-6">
        <p class="text-gray-600">
            {{$event->description}}
        </p>
      </div>

      <!-- Séparateur -->
      <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center">
          <span class="bg-white px-3 text-sm text-gray-500">Votre réponse</span>
        </div>
      </div>

      <!-- Boutons -->
      <div class="flex justify-center gap-4 mt-4">

    @if ($event->status == 'pending')
    <form action="{{ route('event.accept', $event->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PATCH')
        <button type="submit" class="py-2 px-4 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white shadow-md hover:shadow-lg transition-all duration-300 rounded-lg font-medium" onclick="return confirm('Confirmer l\'acceptation ?')">Accepter</button>
    </form>

    <form action="{{ route('event.refuse', $event->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PATCH')
        <button type="submit" class="py-2 px-4 border-2 border-rose-500 text-rose-600 hover:bg-rose-50 shadow-md hover:shadow-lg transition-all duration-300 rounded-lg font-medium" onclick="return confirm('Confirmer le refus ?')">Refuser</button>
    </form>
    @endif
      </div>
    </div>
  </div>

@endsection
