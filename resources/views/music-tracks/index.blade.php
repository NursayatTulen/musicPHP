@extends('layouts.app')

@section('title', __('Music Tracks') . ' — Music Hub')

@section('content')
<div class="fade-in">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <div>
            <h1 class="section-title">
                <i class="fas fa-compact-disc" style="color: var(--primary);"></i>
                {{ __('Music Tracks') }}
            </h1>
            <p class="section-subtitle">{{ __('Explore the latest soundscapes from the Hub ecosystem.') }}</p>
        </div>
        @can('create music-tracks')
        <a href="{{ route('music-tracks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('Add Track') }}
        </a>
        @endcan
    </div>

    <div class="grid-3">
        @forelse($tracks as $track)
            <div class="card track-list-card">
                <div style="display: flex; gap: 20px; align-items: center; margin-bottom: 15px;">
                    <div style="width: 70px; height: 70px; border-radius: 15px; background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border);">
                        <i class="fas fa-music fa-2x" style="color: var(--primary); filter: drop-shadow(0 0 10px var(--primary-glow));"></i>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="font-weight: 800; font-size: 1.1rem; margin-bottom: 5px;">{{ $track->title }}</h3>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span class="badge badge-blue" style="font-size: 0.6rem;">{{ __('Mastered') }}</span>
                            <span style="font-size: 0.75rem; color: var(--text-secondary);">4:15 • 320kbps</span>
                        </div>
                    </div>
                </div>
                
                <p style="color: var(--text-secondary); font-size: 0.85rem; line-height: 1.6; margin-bottom: 20px; height: 3.2rem; overflow: hidden;">
                    {{ $track->description }}
                </p>

                <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 15px; border-top: 1px solid var(--border);">
                    <div style="display: flex; gap: 8px;">
                        <button class="btn-logout" style="color: white; width: 35px; height: 35px;"><i class="fas fa-play"></i></button>
                        <button class="btn-logout" style="color: white; width: 35px; height: 35px;"><i class="fas fa-heart"></i></button>
                    </div>
                    <div style="display: flex; gap: 5px;">
                        @can('edit music-tracks')
                        <a href="{{ route('music-tracks.edit', $track->id) }}" class="btn-logout" style="color: var(--text-secondary); width: 35px; height: 35px;"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('delete music-tracks')
                        <form action="{{ route('music-tracks.destroy', $track->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn-logout" style="color: #ef4444; width: 35px; height: 35px;" onclick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 100px; background: rgba(255,255,255,0.02); border-radius: 30px; border: 1px dashed var(--border);">
                <i class="fas fa-music fa-3x" style="color: var(--text-muted); margin-bottom: 20px;"></i>
                <h3 style="color: var(--text-secondary);">{{ __('No tracks recorded yet') }}</h3>
                <p style="color: var(--text-muted);">{{ __('Be the first one to upload a track to the hub.') }}</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .track-list-card {
        padding: 25px;
        transition: var(--transition);
    }
    .track-list-card:hover {
        border-color: var(--primary);
        transform: translateY(-5px);
        background: rgba(139, 92, 246, 0.05);
    }
</style>
@endsection
