
@extends('Client.layout')

@section('title', 'Liste des événements')

@section('content')

<!-- Reservations Tab -->
<div id="reservations">

    <div class="mb-8 flex justify-between items-center">
      <h2 class="text-2xl font-bold text-gray-800">Mes réservations</h2>
      <div class="flex space-x-2">
        <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm active">Toutes</button>
        <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm">À venir</button>
        <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm">Passées</button>
      </div>
    </div>
    @foreach ($reservations as $reservation)
    <!-- Reservations List -->
    <div class="space-y-4 mt-4">
      <!-- Reservation 1 -->
      <div class="glass-effect rounded-xl overflow-hidden shadow-md">
        <div class="p-5">
          <div class="flex flex-col md:flex-row md:items-center">
            <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
              <div class="w-full md:w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-600 rounded-lg flex flex-col items-center justify-center text-white">
                @php
                    $eventDate = \Carbon\Carbon::parse($reservation->event->date);
                @endphp
                <span class="text-2xl font-bold">{{ $eventDate->format('d') }}</span>
                <span class="text-sm">{{ $eventDate->translatedFormat('F') }}</span>
                <span class="text-xs">{{ $eventDate->format('Y') }}</span>
              </div>
            </div>
            <div class="flex-grow">
              <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                  <h3 class="text-lg font-semibold text-gray-800">{{$reservation->event->title}}</h3>
                  <div class="flex items-center mt-1 text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{$reservation->event->location}}</span>
                  </div>
                </div>

              </div>
              <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                  </svg>
                <span class="text-sm text-gray-700">Billet #EF2025-{{$reservation->id}}</span>
                </div>
                <div class="mt-3 md:mt-0 flex space-x-2">
                  {{-- <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Voir
                  </button> --}}
                  <button
                        type="button"
                        data-modal-target="modal-{{$reservation->id}}"
                        data-modal-toggle="modal-{{$reservation->id}}"
                        class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Voir
                    </button>
                  <button class="bg-gradient-to-r from-purple-400 to-pink-600 text-white text-sm font-medium py-1.5 px-4 rounded-full hover:opacity-90 transition-all flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Télécharger
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

        <!-- Modal -->
<div id="modal-{{$reservation->id}}" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-11/12 md:w-1/2 shadow-lg">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Détails de la réservation</h2>
        <button type="button" data-modal-hide="modal-{{$reservation->id}}" class="text-gray-400 hover:text-gray-600">&times;</button>
      </div>

      <div class="space-y-2">
        <p><strong>Événement :</strong> {{$reservation->event->title}}</p>
        <p><strong>Lieu :</strong> {{$reservation->event->location}}</p>
        <p><strong>prix Total :</strong> {{$reservation->prix_total}}MAD</p>

        <p><strong>Nom :</strong> {{$reservation->nom}}</p>
        <p><strong>Prenom :</strong> {{$reservation->prenom}}</p>
        <p><strong>Email :</strong> {{$reservation->email}}</p>
        <p><strong>Tel :</strong> {{$reservation->tel}}</p>




        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($reservation->event->date)->translatedFormat('d F Y') }}</p>
        <p><strong>Numéro du billet :</strong> #EF2025-{{$reservation->id}}</p>
        @if($reservation->codepromos)
          <p><strong>Code Promo :</strong> {{$reservation->codepromos->code}}</p>
          <p><strong>Réduction :</strong> {{$reservation->codepromos->remise}}%</p>
        @else
          <p><strong>Code Promo :</strong> Aucun</p>
        @endif
      </div>

      <div class="mt-6 flex justify-end">
        <button type="button" data-modal-hide="modal-{{$reservation->id}}" class="bg-gradient-to-r from-purple-400 to-pink-600 text-white px-4 py-2 rounded hover:opacity-90">
          Fermer
        </button>
      </div>
    </div>
  </div>



  @endforeach
    <!-- End of Reservations List -->


        <div class="mt-4">
            {{ $reservations->links() }}
        </div>

  </div>

  <script>
    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-target');
            document.getElementById(modalId).classList.remove('hidden');
        });
    });

    document.querySelectorAll('[data-modal-hide]').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-hide');
            document.getElementById(modalId).classList.add('hidden');
        });
    });
    </script>
  @endsection

