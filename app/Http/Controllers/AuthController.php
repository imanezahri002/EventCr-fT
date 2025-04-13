<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registerView(){
        return view('register');
    }
    public function loginView(){
        return view('login');
    }
    public function register(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'tel' => 'required|string|max:255',
            'role_id'=> 'required|integer|exists:roles,id',

        ]);

        // Create the user
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tel' => $request->tel,
            'role_id' => $request->role_id,

        ]);

        Mail::to($user->email)->send(new RegisterMail($user));


        // quand je fais dashboard du client je dois l'inclure ici
        return redirect()->route('login');
    }
    public function verify($user_id, Request $request) {
        // if (!$request->hasValidSignature()) {
        //     return response()->json(["msg" => "Invalid/Expired url provided."], 401);
        // }

        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->route('login')->with('message', 'Email verified successfully.');

    }

    public function login(Request $request){
        $validated=$request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);


        if (auth()->attempt($validated)) {
            // Redirect to the intended page or dashboard
            return view('profile');
        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

}
