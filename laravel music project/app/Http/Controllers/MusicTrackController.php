<?php

namespace App\Http\Controllers;

use App\Models\MusicTrack;
use Illuminate\Http\Request;

class MusicTrackController extends Controller
{
    public function index()
    {
        $projects = MusicTrack::latest()->get();
        return view('music-tracks.index', compact('projects'));
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
            ->with('success', 'Эко-жоба сәтті жасалды!');
    }

    public function edit($id)
    {
        $project = MusicTrack::findOrFail($id);
        return view('music-tracks.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $project = MusicTrack::findOrFail($id);
        $project->update($request->only(['title', 'description']));

        return redirect()->route('music-tracks.index')
            ->with('success', 'Эко-жоба сәтті жаңартылды!');
    }

    public function destroy($id)
    {
        $project = MusicTrack::findOrFail($id);
        $project->delete();

        return redirect()->route('music-tracks.index')
            ->with('success', 'Эко-жоба сәтті жойылды!');
    }
}

