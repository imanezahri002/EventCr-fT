<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Codepromo;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Auth::user()->clients;
        $reservations = Reservation::where('client_id', $client->id)
            ->with(['event', 'codepromos'])
            ->paginate(3); // This will show 10 items per page
        //  dd($reservations);
        return view('Client.reservations.reservation', compact('reservations'));

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
    public function store(StoreReservationRequest $request)
    {
        $client = Auth::user()->clients;

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'tel' => $request->tel,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $prix = Event::find($request->event_id)->prix;
        $data['prix_total'] = $prix;

        if ($request->filled('code_promo')) {
            $codepromo = Codepromo::where('code', $request->code_promo)->first();
            if (!$codepromo) {
                return redirect()->back()->withErrors(['code_promo' => 'Code promo non valide']);
            }
            if ($codepromo->event_id != $request->event_id) {
                return redirect()->back()->withErrors(['code_promo' => 'Ce code promo non valide.']);
            }
            $usageCount = Reservation::where('code_id', $codepromo->id)->count();
            if ($usageCount >= $codepromo->nbUtilisation) {
                return redirect()->back()->withErrors(['code_promo' => 'Ce code promo est expiré.']);
            }


            $data['code_id'] = $codepromo->id;
            $data['prix_total'] = $prix - ($prix * ($codepromo->remise / 100));
        }

        $client->events()->attach($request->event_id, $data);

        return redirect()->route('client.reservations.listeReservations')->with('success', 'Reservation added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
