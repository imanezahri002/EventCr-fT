<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('status', 'accepted')->get();
        // dd($events);
        return view('Client.events.eventsListe', compact('events'));
    }

    public function addreservation(Event $event)
    {
        $user = auth()->user();
        $client = $user->client;
        return view('Client.events.addReservation', compact('event','client','user'));
    }

    public function listeReservation(){

        return view ('Client.reservations.reservation');
    }
    public function updateProfile(Request $request)
    {

        $user = auth()->user();
        $client = $user->clients;

        $user->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'tel' => $request->tel,
            'email' => $request->email,
        ]);

        $client->update([
            'date_naissance' => $request->dateN,
            'genre' => $request->genre,
            'adresse' => $request->adresse,
        ]);

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');


    }


    public function profile(){

        $user = auth()->user();
        $client = $user->clients;

        return view('Client.profile.index', compact('user', 'client'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
