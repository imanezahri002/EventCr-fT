<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }
    public function displayEvents(){
        $events = Event::paginate(10);
        // dd($events);
        return view('Admin.events.index', compact('events'));
    }


    public function displayUsers(){

        $users = User::whereHas('role', function ($query) {
            $query->where('nom', '!=', 'admin'); // Exclure les utilisateurs avec le rôle 'admin'
        })->with('role')->paginate(5);
        return view('Admin.users.index', compact('users'));

    }

    public function activate($id){

    $user = User::findOrFail($id);
    $user->status = 'active';
    $user->save();

    return redirect()->back()->with('success', 'Utilisateur activé.');
    }

    public function ban($id){
        $user = User::findOrFail($id);
        $user->status = 'banned';
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur banni.');
    }

    public function detailEvent($id){
        $event = Event::findOrFail($id);
        // dd($event);
        return view('Admin.events.detail', compact('event'));

    }

    public function accept($id)
    {
    $event = Event::findOrFail($id);
    $event->status = 'accepted';
    $event->save();

    return redirect()->back()->with('success', 'Événement accepté.');
    }

    public function refuse($id)
    {
    $event = Event::findOrFail($id);
    $event->status = 'rejected';
    $event->save();

    return redirect()->back()->with('success', 'Événement refusé.');
    }



}
