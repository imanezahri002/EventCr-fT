@auth
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
          <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Photo de profil" class="h-8 w-8 rounded-full border-2 border-white">
          <span class="ml-2 text-sm font-medium text-gray-700 hidden sm:inline-block">{{ Auth::user()->prenom }}{{ Auth::user()->nom }}</span>
        </div>
        <a href="{{route('logout')}}" class="inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </a>
    </div>
    </div>
  </header>
  @endauth
