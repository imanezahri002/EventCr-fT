<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace Client | Événements & Profil</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9fafb;
    }
    .glass-effect {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
  </style>
</head>
<body class="min-h-screen">
  <!-- Background avec gradient -->
  <div class="fixed inset-0 bg-gradient-to-br from-purple-400 to-pink-600 opacity-10 -z-10"></div>

  <!-- Formes décoratives -->
  <div class="fixed top-0 right-0 w-96 h-96 bg-purple-400 rounded-full filter blur-3xl opacity-20 -z-10 transform translate-x-1/2 -translate-y-1/2"></div>
  <div class="fixed bottom-0 left-0 w-96 h-96 bg-pink-600 rounded-full filter blur-3xl opacity-20 -z-10 transform -translate-x-1/2 translate-y-1/2"></div>

  <!-- Header -->
  <header class="py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-pink-600 flex items-center justify-center">
          <span class="text-white font-bold">EC</span>
        </div>
        <h1 class="ml-3 text-xl font-bold bg-gradient-to-r from-purple-500 to-pink-600 bg-clip-text text-transparent">EventCraft</h1>
      </div>
      <div class="flex items-center space-x-4">
        <div class="relative">
          <button class="p-2 rounded-full hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="absolute top-0 right-0 h-4 w-4 bg-gradient-to-r from-purple-400 to-pink-600 rounded-full text-xs text-white flex items-center justify-center">3</span>
          </button>
        </div>
        <div class="flex items-center">
          <img src="https://i.pravatar.cc/150?img=32" alt="Photo de profil" class="h-8 w-8 rounded-full border-2 border-white">
          <span class="ml-2 text-sm font-medium text-gray-700 hidden sm:inline-block">Sophie Martin</span>
        </div>
      </div>
    </div>
  </header>

  <!-- Navigation Tabs -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
    <div class="glass-effect rounded-xl p-1 flex justify-between overflow-x-auto">
      <button class="tab-button flex-1 py-3 px-4 rounded-lg text-center font-medium text-gray-800 bg-white shadow-sm active" data-tab="events">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Événements
      </button>
      <button class="tab-button flex-1 py-3 px-4 rounded-lg text-center font-medium text-gray-600 hover:text-gray-800" data-tab="reservations">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Réservations
      </button>
      <button class="tab-button flex-1 py-3 px-4 rounded-lg text-center font-medium text-gray-600 hover:text-gray-800" data-tab="profile">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        Profil
      </button>
    </div>
  </div>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <!-- Events Tab -->
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
        <div class="glass-effect rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Théâtre" class="w-full h-48 object-cover">
            <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-400 to-pink-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Théâtre</div>
          </div>
          <div class="p-5">
            <h3 class="text-lg font-semibold text-gray-800">Le Misanthrope</h3>
            <div class="flex items-center mt-2 text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <span>22 Juin 2024, 20h00</span>
            </div>
            <div class="flex items-center mt-1 text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span>Théâtre de la Ville, Lyon</span>
            </div>
            <div class="flex justify-between items-center mt-4">
              <span class="font-semibold text-gray-800">35 €</span>
              <button class="bg-gradient-to-r from-purple-400 to-pink-600 text-white text-sm font-medium py-1.5 px-4 rounded-full hover:opacity-90 transition-all">Réserver</button>
            </div>
          </div>
        </div>

        <!-- Event Card 2 -->
        <div class="glass-effect rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Concert" class="w-full h-48 object-cover">
            <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-400 to-pink-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Concert</div>
          </div>
          <div class="p-5">
            <h3 class="text-lg font-semibold text-gray-800">Indochine - Central Tour</h3>
            <div class="flex items-center mt-2 text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <span>5 Juillet 2024, 19h30</span>
            </div>
            <div class="flex items-center mt-1 text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span>Stade de France, Saint-Denis</span>
            </div>
            <div class="flex justify-between items-center mt-4">
              <span class="font-semibold text-gray-800">75 €</span>
              <button class="bg-gradient-to-r from-purple-400 to-pink-600 text-white text-sm font-medium py-1.5 px-4 rounded-full hover:opacity-90 transition-all">Réserver</button>
            </div>
          </div>
        </div>

        <!-- Event Card 3 -->
        <div class="glass-effect rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Exposition" class="w-full h-48 object-cover">
            <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-400 to-pink-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Exposition</div>
          </div>
          <div class="p-5">
            <h3 class="text-lg font-semibold text-gray-800">Art Numérique - Futur Immersif</h3>
            <div class="flex items-center mt-2 text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <span>10-30 Août 2024</span>
            </div>
            <div class="flex items-center mt-1 text-sm text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span>Fondation Cartier, Paris</span>
            </div>
            <div class="flex justify-between items-center mt-4">
              <span class="font-semibold text-gray-800">18 €</span>
              <button class="bg-gradient-to-r from-purple-400 to-pink-600 text-white text-sm font-medium py-1.5 px-4 rounded-full hover:opacity-90 transition-all">Réserver</button>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 text-center">
        <button class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-6 rounded-full hover:bg-gray-50 transition-all shadow-sm">
          Voir plus d'événements
        </button>
      </div>
    </div>

    <!-- Reservations Tab -->
    <div id="reservations" class="tab-content">
      <div class="mb-8 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Mes réservations</h2>
        <div class="flex space-x-2">
          <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm active">Toutes</button>
          <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm">À venir</button>
          <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm">Passées</button>
        </div>
      </div>

      <!-- Reservations List -->
      <div class="space-y-4">
        <!-- Reservation 1 -->
        <div class="glass-effect rounded-xl overflow-hidden shadow-md">
          <div class="p-5">
            <div class="flex flex-col md:flex-row md:items-center">
              <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                <div class="w-full md:w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-600 rounded-lg flex flex-col items-center justify-center text-white">
                  <span class="text-2xl font-bold">15</span>
                  <span class="text-sm">Juillet</span>
                  <span class="text-xs">2024</span>
                </div>
              </div>
              <div class="flex-grow">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <h3 class="text-lg font-semibold text-gray-800">Festival de Musique Électronique</h3>
                    <div class="flex items-center mt-1 text-sm text-gray-600">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      <span>Parc des Expositions, Paris</span>
                    </div>
                  </div>
                  <div class="mt-3 md:mt-0">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                      Confirmée
                    </span>
                  </div>
                </div>
                <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-between">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    <span class="text-sm text-gray-700">Billet #EF2024-1289</span>
                  </div>
                  <div class="mt-3 md:mt-0 flex space-x-2">
                    <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm flex items-center">
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

        <!-- Reservation 2 -->
        <div class="glass-effect rounded-xl overflow-hidden shadow-md">
          <div class="p-5">
            <div class="flex flex-col md:flex-row md:items-center">
              <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                <div class="w-full md:w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-600 rounded-lg flex flex-col items-center justify-center text-white">
                  <span class="text-2xl font-bold">22</span>
                  <span class="text-sm">Juin</span>
                  <span class="text-xs">2024</span>
                </div>
              </div>
              <div class="flex-grow">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <h3 class="text-lg font-semibold text-gray-800">Le Misanthrope</h3>
                    <div class="flex items-center mt-1 text-sm text-gray-600">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      <span>Théâtre de la Ville, Lyon</span>
                    </div>
                  </div>
                  <div class="mt-3 md:mt-0">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                      En attente
                    </span>
                  </div>
                </div>
                <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-between">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    <span class="text-sm text-gray-700">Billet #TH2024-0587</span>
                  </div>
                  <div class="mt-3 md:mt-0 flex space-x-2">
                    <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      Voir
                    </button>
                    <button class="bg-white border border-gray-300 text-gray-700 text-sm font-medium py-1.5 px-4 rounded-full hover:bg-gray-50 transition-all shadow-sm flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                      Annuler
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 text-center">
        <button class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-6 rounded-full hover:bg-gray-50 transition-all shadow-sm">
          Voir l'historique complet
        </button>
      </div>
    </div>

    <!-- Profile Tab -->
    <div id="profile" class="tab-content">
      <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Mon profil</h2>
        <p class="text-gray-600 mt-1">Gérez vos informations personnelles et préférences</p>
      </div>

      <div class="glass-effect rounded-xl overflow-hidden shadow-md">
        <div class="p-6">
          <!-- Profile Header -->
          <div class="flex flex-col sm:flex-row items-center mb-8">
            <div class="relative mb-4 sm:mb-0 sm:mr-6">
              <img src="https://i.pravatar.cc/150?img=32" alt="Photo de profil" class="h-24 w-24 rounded-full border-4 border-white shadow-md">
              <button class="absolute bottom-0 right-0 bg-gradient-to-r from-purple-400 to-pink-600 text-white p-1.5 rounded-full shadow-md hover:opacity-90 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </button>
            </div>
            <div class="text-center sm:text-left">
              <h3 class="text-xl font-bold text-gray-800">Sophie Martin</h3>
              <p class="text-gray-600">sophie.martin@example.com</p>
              <div class="mt-2 flex flex-wrap justify-center sm:justify-start gap-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                  Premium
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                  Membre depuis 2022
                </span>
              </div>
            </div>
          </div>

          <!-- Profile Form -->
          <form>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Informations personnelles -->
              <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Informations personnelles</h4>

                <div class="mb-4">
                  <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                  <input type="text" id="firstName" value="Sophie" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                </div>

                <div class="mb-4">
                  <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                  <input type="text" id="lastName" value="Martin" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                </div>

                <div class="mb-4">
                  <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                  <input type="email" id="email" value="sophie.martin@example.com" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                </div>

                <div class="mb-4">
                  <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                  <input type="tel" id="phone" value="+33 6 12 34 56 78" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                </div>

                <div>
                  <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-1">Date de naissance</label>
                  <input type="date" id="birthdate" value="1990-05-15" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                </div>
              </div>

              <!-- Préférences -->
              <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Préférences</h4>

                <div class="mb-4">
                  <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Langue</label>
                  <select id="language" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                    <option value="fr" selected>Français</option>
                    <option value="en">English</option>
                    <option value="es">Español</option>
                  </select>
                </div>

                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Catégories préférées</label>
                  <div class="space-y-2">
                    <div class="flex items-center">
                      <input type="checkbox" id="cat-music" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded" checked>
                      <label for="cat-music" class="ml-2 text-sm text-gray-700">Musique</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="cat-theater" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded" checked>
                      <label for="cat-theater" class="ml-2 text-sm text-gray-700">Théâtre</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="cat-expo" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded" checked>
                      <label for="cat-expo" class="ml-2 text-sm text-gray-700">Expositions</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="cat-sport" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded">
                      <label for="cat-sport" class="ml-2 text-sm text-gray-700">Sport</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="cat-cinema" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded">
                      <label for="cat-cinema" class="ml-2 text-sm text-gray-700">Cinéma</label>
                    </div>
                  </div>
                </div>

                <div class="mb-4">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Notifications</label>
                  <div class="space-y-2">
                    <div class="flex items-center">
                      <input type="checkbox" id="notif-email" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded" checked>
                      <label for="notif-email" class="ml-2 text-sm text-gray-700">Recevoir des emails</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="notif-sms" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded" checked>
                      <label for="notif-sms" class="ml-2 text-sm text-gray-700">Recevoir des SMS</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="notif-promo" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded">
                      <label for="notif-promo" class="ml-2 text-sm text-gray-700">Offres promotionnelles</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
              <button type="button" class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-6 rounded-full hover:bg-gray-50 transition-all shadow-sm">
                Annuler
              </button>
              <button type="submit" class="bg-gradient-to-r from-purple-400 to-pink-600 text-white font-medium py-2 px-6 rounded-full hover:opacity-90 transition-all shadow-md">
                Enregistrer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- JavaScript for tab switching -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const tabButtons = document.querySelectorAll('.tab-button');
      const tabContents = document.querySelectorAll('.tab-content');

      tabButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Remove active class from all buttons and contents
          tabButtons.forEach(btn => btn.classList.remove('active', 'bg-white', 'shadow-sm', 'text-gray-800'));
          tabButtons.forEach(btn => btn.classList.add('text-gray-600'));
          tabContents.forEach(content => content.classList.remove('active'));

          // Add active class to clicked button and corresponding content
          button.classList.add('active', 'bg-white', 'shadow-sm', 'text-gray-800');
          button.classList.remove('text-gray-600');
          const tabId = button.getAttribute('data-tab');
          document.getElementById(tabId).classList.add('active');
        });
      });
    });
  </script>
</body>
</html>
