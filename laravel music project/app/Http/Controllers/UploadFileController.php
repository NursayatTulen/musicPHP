<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    /**
     * Файлды жүктеу формасын көрсету.
     */
    public function index()
    {
        // public/uploads/music қалтасындағы барлық музыкалық файлдарды алу
        $files = Storage::disk('public')->files('uploads/music');
        
        return view('upload', compact('files'));
    }

    /**
     * Файлды сақтау.
     */
    public function store(Request $request)
    {
        // Валидация: файл болуы керек, түрі mp3, wav, m4a, png, jpg, көлемі макс 10MB (музыка үшін көбірек орын керек болуы мүмкін)
        $request->validate([
            'file' => 'required|file|mimes:mp3,wav,m4a,png,jpg,jpeg|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // storage/app/public/uploads/music қалтасына сақтау
            $path = $file->storeAs('uploads/music', $fileName, 'public');

            return back()->with('success', 'Трек сәтті жүктелді: ' . $fileName);
        }

        return back()->with('error', 'Файлды жүктеу мүмкін болмады.');
    }
}

