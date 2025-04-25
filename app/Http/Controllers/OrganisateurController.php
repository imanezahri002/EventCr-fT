<?php

namespace App\Http\Controllers;

use App\Models\Organisateur;
use App\Http\Requests\StoreOrganisateurRequest;
use App\Http\Requests\UpdateOrganisateurRequest;
use Illuminate\Support\Facades\Auth;

class OrganisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Organisateur.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        $organisateur = Organisateur::where('user_id', $user->id)->first();
        return view('Organisateur.profile', compact('user', 'organisateur'));
    }

   public function updateProfile(UpdateOrganisateurRequest $request){
        $user = Auth::user();
        $organisateur = Organisateur::where('user_id', $user->id)->first();
        $validate=$request->validated();
        /** @var \App\Models\User $user */
        $user->update([
            'prenom' => $validate['prenom'],
            'nom' => $validate['nom'],
            'tel' => $validate['tel'],
            'email' => $validate['email'],

        ]);

        $organisateur->update([
            'entreprise' => $validate['entreprise'],
            'ville' => $validate['ville'],
            'adresse' => $validate['adresse'],
            'codePostal'=> $validate['codePostal'],
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
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
    public function store(StoreOrganisateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisateur $organisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisateur $organisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganisateurRequest $request, Organisateur $organisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisateur $organisateur)
    {
        //
    }
}
