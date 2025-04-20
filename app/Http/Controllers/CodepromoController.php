<?php

namespace App\Http\Controllers;

use App\Models\Codepromo;
use App\Http\Requests\StoreCodepromoRequest;
use App\Http\Requests\UpdateCodepromoRequest;

class CodepromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codepromos = Codepromo::all();
        return view('Organisateur.codepromo.index', compact('codepromos'));
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
    public function store(StoreCodepromoRequest $request)
    {
        Codepromo::create([
            'code' => $request->code_promo,
            'remise' => $request->remise,
            'nbUtilisation' => $request->nbr_usage,

        ]);

        return redirect()->route('organisateur.codePromos')->with('success', 'Catégorie ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Codepromo $codepromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Codepromo $codepromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCodepromoRequest $request, Codepromo $codepromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Codepromo $codepromo)
    {
        //
    }
}
