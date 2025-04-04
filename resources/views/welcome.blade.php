<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/global.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-[url('/images/back2.jpg')] bg-cover bg-center h-screen ">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 backdrop-blur-lg bg-black/20 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent">
                    EventCraft
                </a>
                <div class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-sm text-gray-300 hover:text-white transition-colors">Home</a>
                    <a href="/events" class="text-sm text-gray-300 hover:text-white transition-colors">Services</a>
                    <a href="/events" class="text-sm text-gray-300 hover:text-white transition-colors">Events</a>
                    <div class="flex items-center gap-4">
                        <a href="/signin" class="text-sm text-white px-4 py-2 rounded-lg border border-gray-700 hover:border-gray-600 transition-colors">
                            Sign In
                        </a>
                        <a href="/signup" class="text-sm px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white transition-colors">
                            Sign Up
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex-grow">
        <div class="min-h-[80vh] flex items-center">
            <div class="max-w-7xl mx-auto px-6 py-20">
                <div class="text-center space-y-8">
                    <h1 class="text-6xl md:text-7xl font-bold">
                        <span class="bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent glow">
                            Experience Events
                        </span>
                        <br />
                        <span class="bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent glow">
                            Like Never Before
                        </span>
                    </h1>
                    <p class="text-xl text-white max-w-2xl mx-auto font-bold tracking-tight glow">
                        Discover and attend amazing events in your area. From tech conferences to music festivals, find your next
                        unforgettable experience.
                    </p>
                    <div class="mt-8">
                        <a href="/events"
                            class="inline-block px-8 py-4 text-lg font-medium rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white transition-colors">
                            Explore Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Section -->

<section class="py-20 bg-gray-100 text-gray-900">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent mb-12">
            Nos Services
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-200  transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Nos Engagements</h3>
                <p class="text-gray-700">Billetterie officielle<br>Des tickets 100% authentiques</p>
            </div>

            <!-- Card 2 -->
            <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-200 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Assurance Qualité</h3>
                <p class="text-gray-700">Paiement 100% sécurisé</p>
            </div>

            <!-- Card 3 -->
            <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-200 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Organisation</h3>
                <p class="text-gray-700">Offrir une interface interactive pour faciliter à l'organisateur de publier son event</p>
            </div>

            <!-- Card 4 -->
            <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-200 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Service Client</h3>
                <p class="text-gray-700">Trouvez immédiatement des réponses à vos questions grâce à notre service de support 24h/7j</p>
            </div>
        </div>
    </div>
</section>
<!-- event -->
<section class="py-4 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Titre -->
        <h2 class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent text-center mb-4">Événements</h2>

        <!-- Barre de recherche -->
        <div class="flex justify-center mb-6">
            <input type="text" placeholder="Rechercher un événement..."
                class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>

        <!-- Filtres -->
        <div class="flex justify-center space-x-6 border-b pb-3 mb-6 text-gray-600 text-sm">
            <button class="font-semibold text-black border-b-2 border-black pb-1">All</button>
            <button class="hover:text-black">This Week</button>
            <button class="hover:text-black">Next Week</button>
            <button class="hover:text-black">This Month</button>
        </div>

        <!-- Liste des événements -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Carte d'événement -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/600x400/?concert');"></div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Festival de Musique</h3>
                    <p class="text-gray-600 flex items-center mt-2">
                        📅 <span class="ml-2">Sam, 10 Avril</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        📍 <span class="ml-2">Casablanca, Maroc</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        💰 <span class="ml-2">250 MAD</span>
                    </p>
                    <button class="mt-4 w-full bg-gradient-to-r from-purple-400 to-pink-600 text-white py-2 rounded-lg hover:from-purple-500 hover:to-pink-700">
                        Réserver
                    </button>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/600x400/?conference');"></div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Conférence Tech</h3>
                    <p class="text-gray-600 flex items-center mt-2">
                        📅 <span class="ml-2">Ven, 15 Avril</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        📍 <span class="ml-2">Rabat, Maroc</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        💰 <span class="ml-2">Gratuit</span>
                    </p>
                    <button class="mt-4 w-full bg-gradient-to-r from-purple-400 to-pink-600 text-white py-2 rounded-lg hover:from-purple-500 hover:to-pink-700">
                        Réserver
                    </button>
                </div>
            </div>

            <!-- Carte 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/600x400/?sports');"></div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Tournoi de Football</h3>
                    <p class="text-gray-600 flex items-center mt-2">
                        📅 <span class="ml-2">Dim, 20 Avril</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        📍 <span class="ml-2">Marrakech, Maroc</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        💰 <span class="ml-2">100 MAD</span>
                    </p>
                    <button class="mt-4 w-full bg-gradient-to-r from-purple-400 to-pink-600 text-white py-2 rounded-lg hover:from-purple-500 hover:to-pink-700">
                        Réserver
                    </button>
                </div>
            </div>
            <!-- Carte 4 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/600x400/?sports');"></div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Tournoi de Football</h3>
                    <p class="text-gray-600 flex items-center mt-2">
                        📅 <span class="ml-2">Dim, 20 Avril</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        📍 <span class="ml-2">Marrakech, Maroc</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        💰 <span class="ml-2">100 MAD</span>
                    </p>
                    <button class="mt-4 w-full bg-gradient-to-r from-purple-400 to-pink-600 text-white py-2 rounded-lg hover:from-purple-500 hover:to-pink-700">
                        Réserver
                    </button>
                </div>
            </div>
            <!-- Carte 5 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/600x400/?sports');"></div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Tournoi de Football</h3>
                    <p class="text-gray-600 flex items-center mt-2">
                        📅 <span class="ml-2">Dim, 20 Avril</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        📍 <span class="ml-2">Marrakech, Maroc</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        💰 <span class="ml-2">100 MAD</span>
                    </p>
                    <button class="mt-4 w-full bg-gradient-to-r from-purple-400 to-pink-600 text-white py-2 rounded-lg hover:from-purple-500 hover:to-pink-700">
                        Réserver
                    </button>
                </div>
            </div>
            <!-- Carte 6 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/600x400/?sports');"></div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">Tournoi de Football</h3>
                    <p class="text-gray-600 flex items-center mt-2">
                        📅 <span class="ml-2">Dim, 20 Avril</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        📍 <span class="ml-2">Marrakech, Maroc</span>
                    </p>
                    <p class="text-gray-600 flex items-center mt-2">
                        💰 <span class="ml-2">100 MAD</span>
                    </p>
                    <button class="mt-4 w-full bg-gradient-to-r from-purple-400 to-pink-600 text-white py-2 rounded-lg hover:from-purple-500 hover:to-pink-700">
                        Réserver
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

    </main>

    <!-- Footer -->
    <footer class="bg-black/20 backdrop-blur-lg border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent mb-4">
                        EventCraft
                    </h3>
                    <p class="text-white text-sm">Discover, organize, and attend amazing events.</p>
                </div>

                <div>
                    <h4 class="font-medium text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="text-white hover:text-purple-400 transition-colors">Home</a></li>
                        <li><a href="/events" class="text-white hover:text-purple-400 transition-colors">Events</a></li>
                        <li><a href="#" class="text-white hover:text-purple-400 transition-colors">Services</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-medium text-white mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-white hover:text-purple-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-white hover:text-purple-400 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-medium text-white mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-purple-400 transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-purple-400 transition-colors">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-sm text-white">
                © 2025 EventCraft. All rights reserved.
            </div>
        </div>
    </footer>
</body>

</html>
