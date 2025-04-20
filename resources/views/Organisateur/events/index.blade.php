@extends('Organisateur.layout')
@section('title', 'Dashboard Organisateur')
@section('content')

<!-- Container avec marge en haut et bonne alignement -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 px-6 mt-6 pb-4">

    <!-- Barre de recherche -->
    <div class="flex-1">
        <div class="relative">
            <!-- Icône de recherche -->
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M10.5 17a6.5 6.5 0 100-13 6.5 6.5 0 000 13z" />
                </svg>
            </div>

            <!-- Champ de recherche -->
            <input type="text" placeholder="Rechercher un événement..."
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
    </div>

    <!-- Bouton Ajouter -->
    <div>
        <a href="{{ route('organisateur.events.create') }}">
            <button
                class="flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white font-semibold rounded-full shadow-md hover:from-pink-600 hover:to-purple-600 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Ajouter un événement
            </button>
        </a>
        
    </div>
</div>

<!-- Event Grid Container -->
<div class=" overflow-hidden mt-6 px-6 ">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events as $event)
        <!-- Event Card -->
        <div class="bg-white rounded-2xl overflow-hidden group hover:shadow-xl transition-all duration-300">
            <!-- Event Image with Overlay -->
            <div class="relative h-56">
                <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-colors duration-300"></div>

                <!-- Event Status Badge -->
                <div class="absolute top-4 left-4">
                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                        Active
                    </span>
                </div>

                <!-- Event Date -->
                <div class="absolute bottom-4 left-4 text-white">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Event Details -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <span class="px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-sm font-medium">
                        {{ $event->categorie ? $event->categorie->nom : 'No Category' }}
                    </span>
                    <span class="text-2xl font-bold text-purple-600">${{ number_format($event->prix, 2) }}</span>
                </div>

                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->title }}</h3>

                <!-- Location -->
                <div class="flex items-center text-gray-600 mb-4">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <span class="truncate">{{ $event->location }}</span>
                </div>

                <!-- Description -->
                <p class="text-gray-600 mb-6 line-clamp-2">{{ $event->description }}</p>

                <!-- Action Button -->
                <a href="{{ route('organisateur.events.show', $event->id) }}"
                    class="block w-full text-center py-3 rounded-xl bg-gradient-to-r from-pink-500 to-purple-500 text-white font-semibold hover:from-pink-600 hover:to-purple-600 transition duration-300">
                    View Details
                </a>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="col-span-full">
            <div class="flex flex-col items-center justify-center py-16 bg-gray-50 rounded-2xl">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <h3 class="mt-4 text-xl font-semibold text-gray-800">No events found</h3>
                <p class="mt-2 text-gray-500">Start by creating your first event!</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($events->hasPages())
    <div class="mt-8 mb-6">
            {{ $events->links('pagination::tailwind') }}
    </div>
    @endif
</div>

@endsection
