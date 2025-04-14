<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }
    public function displayUsers(){

        $users = User::whereHas('role', function ($query) {
            $query->where('nom', '!=', 'admin'); // Exclure les utilisateurs avec le rôle 'admin'
        })->with('role') // Charger la relation role

          ->paginate(10);
        return view('Admin.users.index', compact('users'));

    }

}
