<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        // Fetch users who are not super-admins (or just everyone for simplicity in this hub)
        $artists = User::with('roles')->latest()->get();
        return view('artists.index', compact('artists'));
    }

    public function show($id)
    {
        $artist = User::with('roles')->findOrFail($id);
        return view('artists.show', compact('artist'));
    }
}
