<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\Organisateur;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        try{


        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tel' => $request->tel,
            'role_id' => $request->role_id,

        ]);
        if ($user->role->nom == 'organisateur') {
            Organisateur::Create(['user_id' => $user->id]);
        }

        Mail::to($user->email)->send(new RegisterMail($user));
    }catch (\Exception $e) {
        return redirect()->back()->withErrors($e);
    }

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
            /** @var \App\Models\User $user */
                $user = auth()->user();

                if ($user->status === 'banned') {
                    auth()->logout();
                    return redirect()->back()->withErrors(['email' => 'Votre compte a été banni.'])->withInput();
                }


             // Vérifie si l'email est vérifié
            if  (!$user->hasVerifiedEmail()){
                auth()->logout();
                return redirect()->back()->withErrors(['email' => 'Please verify your email address.'])->withInput();
            }
            // Redirection selon le rôle
            switch ($user->role->nom) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'organisateur':
                    return redirect()->route('organisateur.dashboard');
                case 'client':
                    return redirect()->route('client.dashboard');
                default:
                    auth()->logout();
                    abort(403, 'Rôle non reconnu.');
            }
            // Redirect to the intendedhboard
            return redirect()->route('admin.dashboard');

        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
