@extends('Organisateur.layout')
@section('title', 'Event Details')
@section('content')

<div class="px-6 py-8">
    <!-- Back Button -->
    <a href="{{ route('organisateur.events') }}" class="inline-flex items-center mb-6 text-gray-600 hover:text-gray-800">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Events
    </a>

    <!-- Event Details Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Event Image -->
        <div class="relative h-96">
            <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

            <!-- Status Badge -->
            <div class="absolute top-6 left-6">
                <span class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium">
                    {{ $event->status }}
                </span>
            </div>
        </div>

        <!-- Content Container -->
        <div class="p-8">
            <!-- Header Section -->
            <div class="flex flex-wrap items-start justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $event->title }}</h1>
                    <span class="px-4 py-2 bg-pink-100 text-pink-600 rounded-full text-sm font-medium">
                        {{ $event->categorie ? $event->categorie->nom : 'No Category' }}
                    </span>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-purple-600 mb-2">
                        MAD{{ number_format($event->prix, 2) }}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $event->max_participants }} max participants
                    </div>
                </div>
            </div>

            <!-- Event Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Date & Time -->
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date & Time</p>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }} at {{ $event->time }}</p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-pink-100 rounded-full">
                            <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="font-medium">{{ $event->location }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    @if($event->codePromos && $event->codePromos->nbUtilisation > 0)
                    <!-- Promo Code -->
                    <div class="bg-gray-50 p-4 rounded-xl">

                        <h3 class="font-semibold text-gray-800 mb-3">Promo Code</h3>
                        <div class="flex items-center justify-between mb-2 last:mb-0">
                            <span class="font-mono text-purple-600">{{ $event->codePromos->code }}</span>
                            <span class="text-sm text-gray-600">{{ $event->codePromos->remise }}% off</span>
                        </div>
                        <div class="text-sm text-gray-500 mt-2">
                            {{ $event->codePromos->nbUtilisation }} uses remaining
                        </div>
                    </div>
                    @endif

                    {{-- <!-- Tags -->
                    @if($event->tags->count() > 0) --}}
                    <div>

                        <div class="flex flex-wrap gap-2">
                            @foreach($event->tags as $tag)
                            <span class="px-3 py-1 bg-pink-100 text-gray-600 rounded-full text-sm">
                                #{{ $tag->nom }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>

            <!-- Description -->
            <div class="border-t pt-8">
                <h3 class="font-semibold text-gray-800 mb-4">Description</h3>
                <p class="text-gray-600 whitespace-pre-line">{{ $event->description }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 mt-8 pt-8 border-t">

                <a href="{{ route('organisateur.events.edit', $event) }}"
                    class="flex-1 px-6 py-3 text-center rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 transition duration-200">
                    Edit Event
                </a>
                {{-- @Gate('organisateur.events.delete', $event) --}}
                @if($event->clients()->count() == 0)
                <form action="{{ route('organisateur.events.destroy', $event) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit"
                    class="px-6 py-3 rounded-xl border border-red-600 text-red-600 font-semibold hover:bg-red-50 transition duration-200">
                    Delete Event
                </button>
                </form>
                @endif
                {{-- @endGate --}}
            </div>
        </div>
    </div>
</div>

@endsection
