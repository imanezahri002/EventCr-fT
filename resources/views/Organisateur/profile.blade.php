@extends('Organisateur.layout')
@section('title', 'Dashboard Organisateur')
@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Summary Card -->
    <div class="max-w-md w-full mt-6 ml-6 sm:mt-10 sm:ml-10">

         <!-- Profile Summary Card -->
         <div class="lg:col-span-1 space-y-6">
            <!-- Profile Image & Basic Info Card -->
            <div class="bg-white rounded-xl shadow-card overflow-hidden card">
                <div class="bg-gradient-to-r from-accent to-darkTeal p-6 text-center">
                    <div class="relative inline-block">
                        <img id="profile-image" src="{{ $user->image }}"
                            class="h-24 w-24 rounded-full border-4 border-white object-cover mx-auto">
                        {{-- <label for="image-upload" class="absolute bottom-0 right-0 bg-accent hover:bg-accentHover text-white rounded-full p-2 cursor-pointer shadow-lg"> --}}
                        {{-- <i class="fas fa-camera"></i> --}}
                        {{-- </label> --}}
                        {{-- <input type="file" id="image-upload" class="hidden"> --}}
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


                    <div class="pt-4 border-t border-gray-100">
                        <button id="edit-profile-btn"
                            class="w-full bg-accent hover:bg-accentHover text-white py-2 px-4 rounded-lg transition-colors font-medium">
                            <i class="fas fa-edit mr-2"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Main Profile Content -->
    <div id="edit-profile-modal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Edit Profile</h3>
                    <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form action="#" method="POST" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="text-center mb-4">
                        <div class="relative inline-block">
                            <img id="modal-profile-image" src="{{ $user->image }}" alt="Profile"
                                class="h-24 w-24 rounded-full border-2 border-accent object-cover mx-auto">
                            <label for="modal-image-upload"
                                class="absolute bottom-0 right-0 bg-accent hover:bg-accentHover text-white rounded-full p-2 cursor-pointer shadow-lg">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" id="modal-image-upload" name="image" class="hidden"
                                accept="image/*">
                        </div>
                    </div>

                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-500 mb-1">Nom</label>
                        <input type="text" id="first_name" name="first_name"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-accent/20 focus:border-accent"
                            value="{{ $user->nom }}">
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-500 mb-1">Prenom</label>
                        <input type="text" id="last_name" name="last_name"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-accent/20 focus:border-accent"
                            value="{{ $user->prenom }}">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-accent/20 focus:border-accent"
                            value="{{ $user->email }}">
                    </div>

                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-500 mb-1">Telephone</label>
                        <input type="text" id="date_of_birth" name="tel"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-accent/20 focus:border-accent"
                            value="{{$user->tel }}">
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-500 mb-1">Entreprise</label>
                        <input type="text" id="date_of_birth" name="entreprise"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-accent/20 focus:border-accent"
                            value="{{$organisateur->entreprise }}">
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-accent hover:bg-accentHover text-white py-2.5 px-4 rounded-lg transition-colors font-medium">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
            // Profile image upload preview
            const imageUpload = document.getElementById('image-upload');
            const profileImage = document.getElementById('profile-image');
            const modalImageUpload = document.getElementById('modal-image-upload');
            const modalProfileImage = document.getElementById('modal-profile-image');

            if (imageUpload && profileImage) {
                imageUpload.addEventListener('change', function(e) {
                    if (e.target.files.length > 0) {
                        const src = URL.createObjectURL(e.target.files[0]);
                        profileImage.src = src;
                        if (modalProfileImage) modalProfileImage.src = src;
                    }
                });
            }

            if (modalImageUpload && modalProfileImage) {
                modalImageUpload.addEventListener('change', function(e) {
                    if (e.target.files.length > 0) {
                        const src = URL.createObjectURL(e.target.files[0]);
                        modalProfileImage.src = src;
                        if (profileImage) profileImage.src = src;
                    }
                });
            }

            // Modal controls
            const editProfileBtn = document.getElementById('edit-profile-btn');
            const editProfileModal = document.getElementById('edit-profile-modal');
            const closeModalBtn = document.getElementById('close-modal');

            if (editProfileBtn && editProfileModal) {
                editProfileBtn.addEventListener('click', function() {
                    editProfileModal.classList.remove('hidden');
                });
            }

            if (closeModalBtn && editProfileModal) {
                closeModalBtn.addEventListener('click', function() {
                    editProfileModal.classList.add('hidden');
                });
            }

            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                if (editProfileModal && e.target === editProfileModal) {
                    editProfileModal.classList.add('hidden');
                }
            });

            // Edit personal information
            const editPersonalInfoBtn = document.getElementById('edit-personal-info-btn');
            if (editPersonalInfoBtn && editProfileModal) {
                editPersonalInfoBtn.addEventListener('click', function() {
                    editProfileModal.classList.remove('hidden');
                });
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

@endsection
