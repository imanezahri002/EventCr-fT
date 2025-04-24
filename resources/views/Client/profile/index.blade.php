@extends('Client.layout')

@section('title', 'Liste des événements')

@section('content')

<!-- Profile Tab -->
<div id="profile">
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
            <h3 class="text-xl font-bold text-gray-800">{{$user->nom}}{{$user->prenom}}</h3>
            <p class="text-gray-600">{{$user->email}}</p>
            <div class="mt-2 flex flex-wrap justify-center sm:justify-start gap-2">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                Membre depuis {{ $client->created_at->format('Y') }}
              </span>
            </div>
          </div>
        </div>

        <!-- Profile Form -->
        <form action="{{ route('client.profile.update', $user->id) }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informations personnelles -->
            <div>
              <h4 class="text-lg font-semibold text-gray-800 mb-4">Informations personnelles</h4>

              <div class="mb-4">
                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                <input name="prenom" type="text" id="firstName" value="{{$user->prenom}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
              </div>

              <div class="mb-4">
                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input name="nom" type="text" id="lastName" value="{{$user->nom}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
              </div>

              <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input name="email" type="email" id="email" value="{{$user->email}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
              </div>

              <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                <input name="tel" type="tel" id="phone" value="{{$user->tel}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
              </div>

              <div>
                <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-1">Date de naissance (Birth date)</label>
                <input name="dateN" type="date" id="birthdate" name="date_naissance" value="{{$client->date_naissance}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
              </div>



            </div>


            <div>
                <div class="mt-14 mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="radio" name="genre" id="homme" value="homme" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300">
                            <label for="homme" class="ml-2 text-sm text-gray-700">homme</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="genre" id="femme" value="femme" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300">
                            <label for="femme" class="ml-2 text-sm text-gray-700">Femme</label>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                    <input name="adresse" type="text" id="address" value="{{$client->adresse}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                </div>
            </div>
          </div>

          <div class="mt-8 flex justify-end space-x-3">
            {{-- <button type="button" class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-6 rounded-full hover:bg-gray-50 transition-all shadow-sm">
              Annuler
            </button> --}}
            <button type="submit" class="bg-gradient-to-r from-purple-400 to-pink-600 text-white font-medium py-2 px-6 rounded-full hover:opacity-90 transition-all shadow-md">
              Enregistrer
            </button>

          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
