@extends('Organisateur.layout')
@section('title', 'Dashboard Organisateur')
@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Summary Card -->
    <div class="max-w-md w-full mt-6 pl-[8px] sm:mt-10 sm:pl-[16px]">

         <!-- Profile Summary Card -->
         <div class="lg:col-span-1 space-y-6">
            <!-- Profile Image & Basic Info Card -->
            <div class="bg-white rounded-xl shadow-card overflow-hidden card">
                <div class="bg-gradient-to-r from-accent to-darkTeal p-6 text-center">
                    <div class="relative inline-block">
                    <img id="profile-image" src="{{ $user->image }}" class="h-24 w-24 rounded-full border-4 border-white object-cover mx-auto">
                         <label for="image-upload" class=" bottom-0 right-0 bg-accent hover:bg-accentHover text-white rounded-full p-2 cursor-pointer shadow-lg">
                         <i class="fas fa-camera"></i>
                         </label>
                         <input type="file" id="image-upload" class="hidden">
                    </div>
                    <h2 class="text-white text-xl font-semibold mt-4">{{ $user->nom }} {{ $user->prenom }}</h2>

                </div>

                <div class="p-6 space-y-4">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-accent">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-accent">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500">telephone</p>
                            <p class="font-medium capitalize">{{ $user->tel }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-accent">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500">Entreprise</p>
                            <p class="font-medium capitalize">{{ $organisateur->entreprise }}</p>
                        </div>
                    </div>


                    {{-- <div class="pt-4 border-t border-gray-100">
                        <button id="edit-profile-btn"
                            class="w-full bg-accent hover:bg-accentHover text-white py-2 px-4 rounded-lg transition-colors font-medium">
                            <i class="fas fa-edit mr-2"></i> Edit Profile
                        </button>
                    </div> --}}
                </div>
            </div>


        </div>
    </div>



<div class="lg:col-span-2 space-y-6 w-full max-w-[600px] mt-6 ">
    <div class="bg-white rounded-xl shadow-card overflow-hidden card">
        <div class="bg-gradient-to-r from-accent to-darkTeal p-6">
            <h2 class="text-white text-xl font-semibold">Modifier votre profil</h2>
        </div>

        <div class="p-6">
            <form action="{{route('organisateur.profile.update',$user)}}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Informations personnelles -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Informations personnelles</h4>

                        <div class="mb-4">
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input name="prenom" type="text" id="firstName" value="{{$user->prenom}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>

                        <div class="mb-4">
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input name="nom" type="text" id="lastName" value="{{$user->nom}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input name="email" type="email" id="email" value="{{$user->email}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <input name="tel" type="tel" id="phone" value="{{$user->tel}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>

                    </div>

                    <!-- Informations complémentaires -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Informations complémentaires</h4>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">CodePostal</label>
                            <input name="codePostal" type="tel" id="phone" value="{{$organisateur->codePostal}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                            <input name="adresse" type="text" id="address" value="{{$organisateur->adresse}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>

                        <div class="mb-4">
                            <label for="entreprise" class="block text-sm font-medium text-gray-700 mb-1">Entreprise</label>
                            <input name="entreprise" type="text" id="entreprise" value="{{$organisateur->entreprise}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>
                        <div class="mb-4">
                            <label for="entreprise" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                            <input name="ville" type="text" id="ville" value="{{$organisateur->ville}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <button type="submit" class="bg-gradient-to-r from-accent to-darkTeal text-white font-medium py-2 px-6 rounded-full hover:opacity-90 transition-all shadow-md">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>

    document.getElementById('image-upload').addEventListener('change', function (event) {

        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profile-image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });



        tailwind.config = {
            theme: {
                fontFamily: {
                    sans: ['Poppins', 'sans-serif'],
                },
                extend: {
                    colors: {
                        primary: '#F8F8F8',
                        secondary: '#FFFFFF',
                        accent: '#3C91E6',
                        accentHover: '#7ab6f1',
                        darkTeal: '#CFE8FF',
                        lightGray: '#F0F0F0',
                        sidebarBg: '#FFFFFF',
                        sidebarHover: '#F5F5F5',
                        cardBg: 'rgba(255, 255, 255, 0.8)'
                    },
                    boxShadow: {
                        'card': '0 4px 15px rgba(0, 0, 0, 0.05)',
                        'sidebar': '0 0 20px rgba(0, 0, 0, 0.05)',
                        'nav': '0 2px 10px rgba(0, 0, 0, 0.05)',
                    },
                }
            }
        }




</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


@endsection
