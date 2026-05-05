<?php

namespace App\Http\Controllers;

use App\Models\MusicNews;
use Illuminate\Http\Request;

class MusicNewsController extends Controller
{
    public function index()
    {
        $newsList = MusicNews::latest('event_date')->get();
        return view('music-news.index', compact('newsList'));
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
            ->with('success', 'Музыкалық жаңалық сәтті қосылды!');
    }

    public function edit($id)
    {
        $news = MusicNews::findOrFail($id);
        return view('music-news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        $news = MusicNews::findOrFail($id);
        $news->update($request->only(['title', 'description', 'event_date']));

        return redirect()->route('music-news.index')
            ->with('success', 'Музыкалық жаңалық сәтті жаңартылды!');
    }

    public function destroy($id)
    {
        $news = MusicNews::findOrFail($id);
        $news->delete();

        return redirect()->route('music-news.index')
            ->with('success', 'Музыкалық жаңалық сәтті жойылды!');
    }
}

