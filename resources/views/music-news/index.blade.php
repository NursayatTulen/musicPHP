@extends('layouts.app')

@section('title', __('Music News') . ' — Music Hub')

@section('content')
<div class="fade-in">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <div>
            <h1 class="section-title">
                <i class="fas fa-newspaper" style="color: var(--accent);"></i>
                {{ __('Music News') }}
            </h1>
            <p class="section-subtitle">{{ __('Latest updates from the music industry and our community.') }}</p>
        </div>
        @can('create music-news')
        <a href="{{ route('music-news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('Add News') }}
        </a>
        @endcan
    </div>

    <div class="grid-2">
        @forelse($newsList as $news)
            <div class="card news-card">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                    <div style="flex: 1;">
                        <h3 style="font-weight: 800; font-size: 1.2rem; margin-bottom: 10px; color: white;">
                            {{ $news->title }}
                        </h3>
                        <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6;">
                            {{ $news->description }}
                        </p>
                    </div>
                    <div class="badge badge-blue" style="flex-shrink: 0;">
                        <i class="fas fa-calendar-day"></i> {{ $news->event_date->format('d.m.Y') }}
                    </div>
                </div>
                
                <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid var(--border); padding-top: 20px;">
                    @can('edit music-news')
                    <a href="{{ route('music-news.edit', $news->id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                    @endcan
                    @can('delete music-news')
                    <form action="{{ route('music-news.destroy', $news->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></button>
                    </form>
                    @endcan
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 100px; background: rgba(255,255,255,0.02); border-radius: 30px; border: 1px dashed var(--border);">
                <i class="fas fa-newspaper fa-3x" style="color: var(--text-muted); margin-bottom: 20px;"></i>
                <h3 style="color: var(--text-secondary);">{{ __('No news updates yet') }}</h3>
                <p style="color: var(--text-muted);">{{ __('Stay tuned for the latest news from the Hub.') }}</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .news-card {
        padding: 30px;
        position: relative;
        overflow: hidden;
    }
    .news-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 4px; height: 100%;
        background: var(--accent);
        opacity: 0.5;
    }
</style>
@endsection
