@extends('layouts.app')

@section('title', 'Music Studio — Music Hub KZ')

@section('content')
<div class="fade-in">
    <div class="studio-window">
        <div class="studio-title-bar">
            <div style="display: flex; align-items: center; gap: 15px;">
                <i class="fas fa-compact-disc fa-spin" style="color: var(--primary);"></i>
                <span style="font-weight: 800; letter-spacing: 1px; text-transform: uppercase; font-size: 0.8rem;">Studio Pro v2.0 — Submission Hub</span>
            </div>
            <div style="display: flex; gap: 8px;">
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #ff5f56;"></div>
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #ffbd2e;"></div>
                <div style="width: 12px; height: 12px; border-radius: 50%; background: #27c93f;"></div>
            </div>
        </div>

        <div class="studio-layout">
            <aside class="studio-sidebar">
                <div class="studio-nav-group">
                    <div class="group-label">{{ __('Workspace') }}</div>
                    <a href="#" class="studio-nav-link active"><i class="fas fa-music"></i> {{ __('Add New Track') }}</a>
                    <a href="#" class="studio-nav-link"><i class="fas fa-microphone-alt"></i> {{ __('Voice Recording') }}</a>
                    <a href="#" class="studio-nav-link"><i class="fas fa-sliders"></i> {{ __('Mixer') }}</a>
                </div>

                <div class="studio-nav-group">
                    <div class="group-label">{{ __('Navigation') }}</div>
                    <a href="{{ route('dashboard') }}" class="studio-nav-link"><i class="fas fa-th-large"></i> {{ __('Dashboard') }}</a>
                    <a href="#" class="studio-nav-link"><i class="fas fa-users"></i> {{ __('Artists') }}</a>
                    <a href="#" class="studio-nav-link"><i class="fas fa-broadcast-tower"></i> {{ __('News') }}</a>
                </div>
                
                <div class="studio-status-panel">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <div style="width: 8px; height: 8px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 10px #22c55e;"></div>
                        <span style="font-size: 0.75rem; font-weight: 700;">{{ __('System Online') }}</span>
                    </div>
                    <div style="font-size: 0.7rem; color: var(--text-secondary);">{{ __('Latency') }}: 12ms</div>
                </div>
            </aside>

            <main class="studio-main">
                <div class="upload-zone">
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at 50% 50%, var(--primary-glow) 0%, transparent 70%); opacity: 0.1;"></div>
                    <i class="fas fa-wave-square fa-3x" style="color: var(--accent); margin-bottom: 20px; filter: drop-shadow(0 0 15px var(--accent-glow));"></i>
                    <h2 class="text-gradient" style="margin-bottom: 10px; font-size: 1.5rem;">{{ __('Upload Your Masterpiece') }}</h2>
                    <p style="color: var(--text-secondary); margin-bottom: 30px;">{{ __('MP3, WAV, M4A up to 10MB') }}</p>

                    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: 0 auto;">
                        @csrf
                        <div style="position: relative; margin-bottom: 20px;">
                            <input type="file" name="file" id="file" class="custom-file-input" accept=".mp3,.wav,.m4a,image/*" required>
                            <label for="file" class="file-label">
                                <i class="fas fa-file-audio"></i> {{ __('Choose Audio File') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 16px;">
                            <i class="fas fa-upload"></i> {{ __('START UPLOAD') }}
                        </button>
                    </form>
                </div>

                <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
                    <h3 style="font-weight: 900; letter-spacing: 1px; text-transform: uppercase; font-size: 1rem;">{{ __('My Collection') }}</h3>
                    <div style="flex: 1; height: 1px; background: var(--border);"></div>
                    <div style="font-size: 0.8rem; color: var(--text-secondary);">{{ count($files) }} {{ __('Items') }}</div>
                </div>

                <div class="track-grid">
                    @forelse($files as $file)
                        @php
                            $path = str_replace('uploads/music/', '', $file);
                            $extension = pathinfo($path, PATHINFO_EXTENSION);
                            $isMusic = in_array(strtolower($extension), ['mp3', 'wav', 'm4a']);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                        @endphp
                        <div class="card track-card">
                            <div class="track-visual">
                                @if($isImage)
                                    <img src="{{ asset('storage/' . $file) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.3);">
                                        <i class="fas {{ $isMusic ? 'fa-music' : 'fa-file-alt' }} fa-2x" style="color: var(--primary);"></i>
                                    </div>
                                @endif
                                <div class="track-overlay">
                                    <a href="{{ asset('storage/' . $file) }}" download class="action-btn"><i class="fas fa-download"></i></a>
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank" class="action-btn"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div style="padding: 15px;">
                                <div style="font-weight: 700; font-size: 0.85rem; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $path }}</div>
                                <div style="font-size: 0.7rem; color: var(--text-secondary); text-transform: uppercase; margin-top: 5px;">{{ $extension }} • 3.2 MB</div>
                            </div>
                        </div>
                    @empty
                        <div style="grid-column: 1/-1; padding: 100px; text-align: center; background: rgba(255,255,255,0.02); border-radius: 30px; border: 1px dashed var(--border);">
                            <i class="fas fa-volume-mute fa-3x" style="color: var(--text-muted); margin-bottom: 20px;"></i>
                            <h3 style="color: var(--text-secondary);">{{ __('No tracks recorded yet') }}</h3>
                            <p style="color: var(--text-muted);">{{ __('Start your musical journey by uploading your first demo.') }}</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>
</div>

<style>
    .studio-window {
        background: #020617;
        border: 1px solid var(--border);
        border-radius: 30px;
        overflow: hidden;
        box-shadow: var(--shadow-premium);
        display: flex;
        flex-direction: column;
        min-height: 80vh;
    }

    .studio-title-bar {
        background: rgba(15, 23, 42, 0.9);
        padding: 15px 25px;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .studio-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        flex: 1;
    }

    .studio-sidebar {
        background: rgba(15, 23, 42, 0.5);
        border-right: 1px solid var(--border);
        padding: 30px 20px;
        display: flex;
        flex-direction: column;
    }

    .studio-nav-group {
        margin-bottom: 30px;
    }

    .group-label {
        font-size: 0.65rem;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 2px;
        margin-bottom: 15px;
        padding-left: 10px;
    }

    .studio-nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
        border-radius: 12px;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: var(--transition);
    }

    .studio-nav-link:hover, .studio-nav-link.active {
        background: rgba(139, 92, 246, 0.1);
        color: white;
    }

    .studio-nav-link.active {
        color: var(--primary);
    }

    .studio-status-panel {
        margin-top: auto;
        background: rgba(0,0,0,0.2);
        padding: 20px;
        border-radius: 20px;
        border: 1px solid var(--border);
    }

    .studio-main {
        padding: 40px;
        background: radial-gradient(circle at 100% 0%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
    }

    .upload-zone {
        background: rgba(255, 255, 255, 0.02);
        border: 2px dashed var(--border);
        border-radius: 30px;
        padding: 60px;
        text-align: center;
        margin-bottom: 50px;
        position: relative;
        transition: var(--transition);
    }

    .upload-zone:hover {
        border-color: var(--primary);
        background: rgba(139, 92, 246, 0.03);
    }

    .custom-file-input {
        opacity: 0;
        position: absolute;
        width: 1px;
        height: 1px;
    }

    .file-label {
        display: block;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border);
        padding: 16px;
        border-radius: 16px;
        color: white;
        cursor: pointer;
        transition: var(--transition);
        font-weight: 600;
    }

    .file-label:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--primary);
    }

    .track-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 25px;
    }

    .track-card {
        padding: 0;
        overflow: hidden;
    }

    .track-visual {
        height: 160px;
        position: relative;
        background: #0f172a;
    }

    .track-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(5px);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        opacity: 0;
        transition: var(--transition);
    }

    .track-card:hover .track-overlay {
        opacity: 1;
    }

    .action-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: white;
        color: black;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: var(--transition);
    }

    .action-btn:hover {
        transform: scale(1.1);
        background: var(--primary);
        color: white;
    }

    @media (max-width: 1024px) {
        .studio-layout { grid-template-columns: 1fr; }
        .studio-sidebar { display: none; }
    }
</style>
@endsection

