@extends('layouts.app')

@section('title', 'Music Studio — Music Hub KZ')

@section('content')
<style>
    /* Integrate with existing CSS variables from layouts.app */
    :root {
        --music-header: linear-gradient(90deg, #6d28d9, #db2777);
        --music-sidebar: linear-gradient(to bottom, rgba(139, 92, 246, 0.1), rgba(15, 23, 42, 0.05));
    }

    .explorer-wrapper {
        display: flex;
        justify-content: center;
        padding: 10px 0;
    }

    /* Studio Architecture with Music Styling */
    .music-window {
        width: 100%;
        max-width: 100%;
        background: #0f172a;
        border: 2px solid #8b5cf6;
        border-radius: 12px;
        box-shadow: 0 0 50px rgba(139, 92, 246, 0.2);
        overflow: hidden;
        animation: fadeInScale 0.4s ease-out;
    }

    @keyframes fadeInScale {
        from { transform: scale(0.96); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    /* Title Bar */
    .music-title-bar {
        background: var(--music-header);
        padding: 10px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: white;
    }

    .music-title {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .music-window-controls {
        display: flex;
        gap: 8px;
    }

    .win-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        cursor: pointer;
        opacity: 1;
    }
    .dot-red { background: #ff5f56; }
    .dot-yellow { background: #ffbd2e; }
    .dot-green { background: #27c93f; }

    /* Explorer Content */
    .explorer-grid {
        display: grid;
        grid-template-columns: 260px 1fr;
        min-height: 600px;
    }

    /* Sidebar - Studio Styled */
    .music-sidebar {
        background: var(--music-sidebar);
        border-right: 1px solid rgba(139, 92, 246, 0.2);
        padding: 24px;
    }

    .nav-panel {
        background: rgba(139, 92, 246, 0.05);
        border: 1px solid rgba(139, 92, 246, 0.2);
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 24px;
        backdrop-filter: blur(10px);
    }

    .panel-title {
        color: #d946ef;
        font-weight: 800;
        font-size: 0.75rem;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .panel-link {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #94a3b8;
        text-decoration: none;
        font-size: 0.85rem;
        padding: 8px 0;
        transition: 0.3s;
    }
    .panel-link:hover { color: white; transform: translateX(5px); }
    .panel-link i { color: #8b5cf6; width: 16px; }

    /* Main Area */
    .explorer-main {
        padding: 30px;
        background: rgba(15, 23, 42, 0.6);
    }

  
    .upload-vault {
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(217, 70, 239, 0.05) 100%);
        border: 2px dashed #8b5cf6;
        border-radius: 20px;
        padding: 50px;
        text-align: center;
        margin-bottom: 40px;
        transition: 0.3s;
        position: relative;
        overflow: hidden;
    }
    .upload-vault:hover {
        border-color: #d946ef;
        background: rgba(139, 92, 246, 0.15);
        transform: translateY(-2px);
    }

    .vault-icon {
        font-size: 4rem;
        color: #d946ef;
        margin-bottom: 20px;
        filter: drop-shadow(0 0 15px rgba(217, 70, 239, 0.4));
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.8; }
        50% { transform: scale(1.05); opacity: 1; }
        100% { transform: scale(1); opacity: 0.8; }
    }

    /* Custom File Input */
    .music-file-input {
        background: #1e293b;
        border: 1px solid #334155;
        color: white;
        padding: 14px;
        border-radius: 10px;
        width: 100%;
        max-width: 450px;
        margin: 25px auto;
        display: block;
        cursor: pointer;
    }

    /* File Grid */
    .files-layout {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .music-track-card {
        text-align: center;
        padding: 20px;
        border-radius: 16px;
        background: rgba(30, 41, 59, 0.4);
        border: 1px solid rgba(255,255,255,0.05);
        transition: 0.3s;
        cursor: pointer;
        position: relative;
    }

    .music-track-card:hover {
        background: rgba(139, 92, 246, 0.1);
        border-color: #8b5cf6;
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    }

    .track-icon-wrapper {
        width: 100px;
        height: 100px;
        margin: 0 auto 15px;
        background: linear-gradient(135deg, #1e293b, #0f172a);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #334155;
        transition: 0.3s;
    }
    .music-track-card:hover .track-icon-wrapper {
        border-color: #d946ef;
        transform: rotate(15deg);
    }

    .music-icon {
        font-size: 3rem;
        color: #8b5cf6;
        filter: drop-shadow(0 0 10px rgba(139, 92, 246, 0.3));
    }

    .track-name {
        font-size: 0.85rem;
        color: #f1f5f9;
        font-weight: 600;
        word-break: break-all;
        margin-top: 10px;
        display: block;
    }

    .track-actions {
        position: absolute;
        bottom: 10px;
        right: 10px;
        opacity: 0;
        transition: 0.3s;
    }
    .music-track-card:hover .track-actions { opacity: 1; }

    /* Responsive */
    @media (max-width: 950px) {
        .explorer-grid { grid-template-columns: 1fr; }
        .music-sidebar { display: none; }
    }
</style>

<div class="explorer-wrapper">
    <div class="music-window">
        <!-- Studio Header -->
        <div class="music-title-bar">
            <div class="music-title">
                <i class="fas fa-compact-disc fa-spin"></i>
                <span>Music Studio — Demo Submission Hub</span>
            </div>
            <div class="music-window-controls">
                <div class="win-dot dot-red"></div>
                <div class="win-dot dot-yellow"></div>
                <div class="win-dot dot-green"></div>
            </div>
        </div>

        <!-- Layout Grid -->
        <div class="explorer-grid">
            <!-- Sidebar -->
            <div class="music-sidebar">
                <div class="nav-panel">
                    <div class="panel-title"><i class="fas fa-headphones"></i> Продюсер панелі</div>
                    <a href="#" class="panel-link"><i class="fas fa-music"></i> Жаңа трек қосу</a>
                    <a href="#" class="panel-link"><i class="fas fa-microphone-alt"></i> Дауыс жазу</a>
                    <a href="#" class="panel-link"><i class="fas fa-sync-alt"></i> Жаңарту</a>
                </div>

                <div class="nav-panel">
                    <div class="panel-title"><i class="fas fa-compass"></i> Шарлау</div>
                    <a href="{{ route('dashboard') }}" class="panel-link"><i class="fas fa-th-large"></i> Dashboard</a>
                    <a href="#" class="panel-link"><i class="fas fa-users"></i> Артистер</a>
                    <a href="#" class="panel-link"><i class="fas fa-broadcast-tower"></i> Жаңалықтар</a>
                </div>
            </div>

            <!-- Content Area -->
            <div class="explorer-main">
                @if (session('success'))
                    <div class="alert alert-success mt-0 mb-4" style="background: rgba(34, 197, 94, 0.1); border: 1px solid #22c55e; color: #4ade80; border-radius: 12px;">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                <div class="upload-vault">
                    <div class="vault-icon"><i class="fas fa-wave-square"></i></div>
                    <h3 style="color: white; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;">Upload Your Demo / Track</h3>
                    <p style="color: #94a3b8; font-size: 0.95rem;">MP3, WAV, M4A файлдарын жүктеңіз (макс. 10MB)</p>

                    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="music-file-input" accept=".mp3,.wav,.m4a,image/*">
                        @error('file')
                            <div class="text-danger mt-1 small"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3 px-5 py-3" style="background: var(--music-header); border: none; border-radius: 30px; font-weight: 700; box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);">
                            <i class="fas fa-upload"></i> ЖҮКТЕУДІ БАСТАУ
                        </button>
                    </form>
                </div>

                <div class="d-flex align-items-center gap-3 mb-4">
                    <i class="fas fa-record-vinyl text-primary" style="font-size: 1.8rem; color: #d946ef !important;"></i>
                    <h4 class="mb-0" style="font-weight: 800; color: #f1f5f9; text-transform: uppercase;">Менің коллекциям</h4>
                    <div style="flex-grow: 1; border-bottom: 1px solid rgba(255,255,255,0.1);"></div>
                </div>

                <div class="files-layout">
                    @forelse($files as $file)
                        @php
                            $path = str_replace('uploads/music/', '', $file);
                            $extension = pathinfo($path, PATHINFO_EXTENSION);
                            $isMusic = in_array(strtolower($extension), ['mp3', 'wav', 'm4a']);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                        @endphp
                        
                        <div class="music-track-card">
                            <a href="{{ asset('storage/' . $file) }}" target="_blank" style="text-decoration: none;">
                                <div class="track-icon-wrapper">
                                    @if($isImage)
                                        <img src="{{ asset('storage/' . $file) }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                    @else
                                        <i class="fas {{ $isMusic ? 'fa-music' : 'fa-file-alt' }} music-icon"></i>
                                    @endif
                                </div>
                                <span class="track-name">{{ Str::limit($path, 20) }}</span>
                                <span style="font-size: 0.7rem; color: #64748b; text-transform: uppercase;">{{ $extension }}</span>
                            </a>
                            <div class="track-actions">
                                <a href="{{ asset('storage/' . $file) }}" download class="btn btn-sm" style="background: rgba(139, 92, 246, 0.2); color: #8b5cf6; padding: 5px 10px; border-radius: 8px;">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div style="grid-column: 1/-1; text-align: center; padding: 80px; background: rgba(30, 41, 59, 0.4); border-radius: 24px; border: 1px solid rgba(255,255,255,0.05);">
                            <i class="fas fa-volume-mute" style="font-size: 4rem; color: #334155; margin-bottom: 20px;"></i>
                            <h3 style="color: #64748b;">Әзірге ешқандай трек жоқ</h3>
                            <p style="color: #475569;">Өз туындыларыңызды алғашқы болып жүктеңіз!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- Studio Status Bar -->
        <div style="background: #0f172a; border-top: 1px solid rgba(255,255,255,0.05); padding: 12px 25px; font-size: 0.8rem; color: #64748b; display: flex; justify-content: space-between; align-items: center;">
            <div><i class="fas fa-database"></i> Database: {{ count($files) }} Tracks stored</div>
            <div>
                <span style="margin-right: 15px;"><i class="fas fa-circle text-success" style="font-size: 0.5rem;"></i> System Live</span>
                <i class="fas fa-shield-alt text-primary"></i> SSL Protected
            </div>
        </div>
    </div>
</div>
@endsection

