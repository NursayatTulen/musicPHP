<?php

namespace App\Http\Controllers;

use App\Models\MusicTrack;
use Illuminate\Http\Request;

class MusicTrackController extends Controller
{
    public function index()
    {
        $tracks = MusicTrack::latest()->get();
        return view('music-tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('music-tracks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        MusicTrack::create($request->only(['title', 'description']));

        return redirect()->route('music-tracks.index')
            ->with('success', 'Музыкалық трек сәтті қосылды!');
    }

    public function edit($id)
    {
        $track = MusicTrack::findOrFail($id);
        return view('music-tracks.edit', compact('track'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $track = MusicTrack::findOrFail($id);
        $track->update($request->only(['title', 'description']));

        return redirect()->route('music-tracks.index')
            ->with('success', 'Музыкалық трек сәтті жаңартылды!');
    }

    public function destroy($id)
    {
        $track = MusicTrack::findOrFail($id);
        $track->delete();

        return redirect()->route('music-tracks.index')
            ->with('success', 'Музыкалық трек сәтті жойылды!');
    }
}

