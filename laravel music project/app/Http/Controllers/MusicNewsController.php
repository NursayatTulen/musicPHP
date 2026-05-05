<?php

namespace App\Http\Controllers;

use App\Models\MusicNews;
use Illuminate\Http\Request;

class MusicNewsController extends Controller
{
    public function index()
    {
        $events = MusicNews::orderBy('event_date', 'asc')->get();
        return view('music-news.index', compact('events'));
    }

    public function create()
    {
        return view('music-news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        MusicNews::create($request->only(['title', 'description', 'event_date']));

        return redirect()->route('music-news.index')
            ->with('success', 'Эко-іс-шара сәтті жасалды!');
    }

    public function edit($id)
    {
        $event = MusicNews::findOrFail($id);
        return view('music-news.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        $event = MusicNews::findOrFail($id);
        $event->update($request->only(['title', 'description', 'event_date']));

        return redirect()->route('music-news.index')
            ->with('success', 'Эко-іс-шара сәтті жаңартылды!');
    }

    public function destroy($id)
    {
        $event = MusicNews::findOrFail($id);
        $event->delete();

        return redirect()->route('music-news.index')
            ->with('success', 'Эко-іс-шара сәтті жойылды!');
    }
}

