<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
   
    public function index()
    {
      
        $files = Storage::disk('public')->files('uploads/music');
        
        return view('upload', compact('files'));
    }

  
    public function store(Request $request)
    {
        
        $request->validate([
            'file' => 'required|file|mimes:mp3,wav,m4a,png,jpg,jpeg|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            
            $path = $file->storeAs('uploads/music', $fileName, 'public');

            return back()->with('success', 'Трек сәтті жүктелді: ' . $fileName);
        }

        return back()->with('error', 'Файлды жүктеу мүмкін болмады.');
    }
}

