<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Categorie;
use App\Models\Tag;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisateur = auth()->user()->organisateur;
        $events =  $organisateur->events()->paginate(3);
        $events->load('categorie');
        // dd($events->first()->load('categorie'));
        return view('Organisateur.events.index',compact('events'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        $tags=Tag::all();

        return view('Organisateur.events.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events');
        }
        $organisateur=auth()->user()->organisateur;

        $event=Event::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'date'=>$request->date,
            'time'=>$request->time,
            'location'=>$request->location,
            'image'=>$imagePath,
            'category_id'=>$request->category_id,
            'prix'=>$request->prix,
            'organisateur_id'=>$organisateur->id,
            'max_participants'=>$request->max_participants,

        ]);


        if($request->promo_code){
           $event->codePromos()->create([
                'code'=>$request->promo_code,
                'remise'=>$request->remise,
                'nbUtilisation'=>$request->nbUtilisation,

            ]);
        }


        $event->tags()->attach($request->tags);
        return redirect()->route('organisateur.events')->with('success', 'Event created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {

        return view('Organisateur.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Categorie::all();
        $tags=Tag::all();
        return view('Organisateur.events.edit', compact('event','categories','tags'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events');
        }
        $organisateur=auth()->user()->organisateur;

        $event->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'date'=>$request->date,
            'time'=>$request->time,
            'location'=>$request->location,
            'image'=>$imagePath,
            'category_id'=>$request->category_id,
            'prix'=>$request->prix,
            'organisateur_id'=>$organisateur->id,
            'max_participants'=>$request->max_participants,

        ]);


        if($request->promo_code){
           $event->codePromos()->create([
                'code'=>$request->promo_code,
                'remise'=>$request->remise,
                'nbUtilisation'=>$request->nbUtilisation,
            ]);
        }


        $event->tags()->sync($request->tags);
        return redirect()->route('organisateur.events')->with('success', 'Event created successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
