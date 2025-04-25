@extends('Client.layout')

@section('title', 'Liste des événements')

@section('content')


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <div class="mb-8">
      <h2 class="text-2xl font-bold text-gray-800">Réserver votre place</h2>
      <p class="text-gray-600 mt-1">Complétez le formulaire ci-dessous pour finaliser votre réservation</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Formulaire de réservation -->
      <div class="lg:col-span-2">
        <div class="glass-effect rounded-xl overflow-hidden shadow-md">
          <div class="p-6">
            <form action="{{route('client.reservations.store')}}" method="POST" class="space-y-6">
              @csrf
              <!-- Détails de l'événement -->
              <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Détails de l'événement</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label for="event_name" class="block text-sm font-medium text-gray-700 mb-1">Événement</label>
                    <input type="text" id="event_name" value="{{$event->title}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent bg-gray-50" disabled>
                    <input name="event_id" id="event_id" value="{{$event->id}}" type="hidden">
                </div>

                  <div>
                    <label for="event_date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="text" id="event_date" value="{{$event->date}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent bg-gray-50" disabled>
                  </div>

                  <div>
                    <label for="event_location" class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                    <input type="text" id="event_location" value="{{$event->location}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent bg-gray-50" disabled>
                  </div>

                </div>
              </div>

              <!-- Informations personnelles -->
              <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informations personnelles</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                    <input name="prenom" type="text" id="firstName" value="{{$user->prenom}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                  </div>

                  <div>
                    <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input name="nom" type="text" id="lastName" value="{{$user->nom}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                  </div>

                  <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input name="email" type="email" id="email" value="{{$user->email}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                  </div>

                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                    <input name="tel" type="tel" id="phone" value="{{$user->tel}}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                  </div>
                </div>
              </div>

              <!-- Options supplémentaires -->
              <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Options supplémentaires</h3>

                <div class="grid grid-cols-1 gap-4">

                  <div>
                    <label for="promo_code" class="block text-sm font-medium text-gray-700 mb-1">Code promo</label>
                    <div class="flex">
                      <input type="text" name="code_promo" id="promo_code" placeholder="Entrez votre code promo" class="flex-grow px-4 py-2 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent">
                      <button onclick="validatePromoCode()" type="button" class="bg-gray-100 text-gray-700 text-sm font-medium py-2 px-4 rounded-r-lg border border-gray-300 hover:bg-gray-200 transition-all">
                        Appliquer</button>
                    </div>

                    <div id="valid-promo" class="mt-2 text-green-500 text-sm hidden">
                        Code promo valide! Remise: <span id="remise"></span>
                    </div>



                    <div id="invalid-promo" class="mt-2 text-red-500 text-sm hidden">
                        Code promo non valide pour cet événement
                    </div>
                  </div>

                </div>
              </div>

              <!-- Conditions et validation -->
              <div>
                <div class="flex items-center mb-4">
                  <input type="checkbox" id="terms" class="h-4 w-4 text-purple-600 focus:ring-purple-400 border-gray-300 rounded">
                  <label for="terms" class="ml-2 text-sm text-gray-700">J'accepte les <a href="#" class="text-purple-600 hover:text-purple-800">conditions générales</a> et la <a href="#" class="text-purple-600 hover:text-purple-800">politique de confidentialité</a></label>
                </div>

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                  <a href="{{route('client.events')}}" class="text-purple-600 hover:text-purple-800 text-sm mb-4 sm:mb-0">Retour aux événements</a>
                  <div class="flex flex-col sm:flex-row sm:space-x-3">

                    <button type="submit" class="bg-gradient-to-r from-purple-400 to-pink-600 text-white font-medium py-2 px-6 rounded-full hover:opacity-90 transition-all shadow-md">

                        Reserver
                    </button>

                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Récapitulatif de la commande -->
      <div class="lg:col-span-1">
        <div class="glass-effect rounded-xl overflow-hidden shadow-md sticky top-8">
          <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Récapitulatif de la commande</h3>

            <div class="border-t border-gray-200 py-4">
              <div class="flex justify-between items-center mb-2">
                <span class="text-sm text-gray-600">Prix</span>
                <span class="text-sm font-medium text-gray-800">{{$event->prix}}</span>
              </div>

              <div class="flex justify-between items-center mb-2">
                <span class="text-sm text-gray-600">Remise</span>
                <span class="text-sm font-medium text-gray-800" id="pourcentage_de_remise">0</span>
              </div>
            </div>

            <div class="border-t border-gray-200 py-4">
              <div class="flex justify-between items-center mb-2">
                <span class="text-sm text-gray-600">Nom:</span>
                <span class="text-sm font-medium text-gray-800">zahri</span>
              </div>
              <div class="flex justify-between items-center mb-2">
                <span class="text-sm text-gray-600">Prenom:</span>
                <span class="text-sm font-medium text-gray-800">imane</span>
              </div>
            </div>

            <div class="border-t border-gray-200 pt-4">
              <div class="flex justify-between items-center">
                <span class="text-base font-semibold text-gray-800" >Total</span>
                <span class="text-lg font-bold bg-gradient-to-r from-purple-500 to-pink-600 bg-clip-text text-transparent" id="totalp">95,40 MAD</span>
              </div>
            </div>

            <div class="mt-6">
              <div class="bg-purple-50 border border-purple-100 rounded-lg p-4">
                <div class="flex items-start">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 mt-0.5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <div>
                    <h4 class="text-sm font-medium text-purple-800">Informations importantes</h4>
                    <p class="text-xs text-purple-700 mt-1">Les billets seront disponibles dans votre espace client après confirmation du paiement. Vous recevrez également votre ticket par email.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-6">
              <div class="flex items-center justify-center">
                <span class="text-xs text-gray-500">Paiement sécurisé</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')

<script>

     async function validatePromoCode(){

        let codePromo=document.getElementById('promo_code').value;
        let event=document.getElementById('event_id').value;
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/validate-codePromo',
        {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                codePromo: codePromo,
                event: event,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if(data['valide']){

                let dataRemise = data["codePromo"]["remise"];
               let valid = document.getElementById("valid-promo");
               valid.classList.remove('hidden');
               document.getElementById("invalid-promo").classList.add('hidden')
               let remise = document.getElementById("remise");
               remise.innerText = dataRemise + "%";
               let pourcentage_de_remise=document.getElementById('pourcentage_de_remise');
               pourcentage_de_remise.innerText=dataRemise + "%";
               let prix={{$event->prix}};

               let total = (prix-((prix*dataRemise)/100)).toFixed(2);
               let totalprice=document.getElementById('totalp');
               totalprice.innerText=total + "MAD";

            }else if(!data['valide']){
                let valid = document.getElementById("valid-promo");
                valid.classList.add('hidden');
                document.getElementById("invalid-promo").classList.remove('hidden')
            }
            console.log(data['valide']);

        })
        .catch(error => {
            console.error("Erreur lors de la recherche :", error);
        });


    }
</script>
