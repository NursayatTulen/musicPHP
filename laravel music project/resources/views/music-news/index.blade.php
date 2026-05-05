@extends('layouts.app')

@section('title', 'Іс-шаралар — Music Hub')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1 class="section-title"><i class="fas fa-calendar-alt" style="color: var(--info);"></i> Эко-Іс-шаралар</h1>
        <p class="section-subtitle" style="margin-bottom: 0;">Алдағы уақытта болатын сенбіліктер мен науқандар</p>
    </div>
    @can('create music-news')
    <a href="{{ route('music-news.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Жаңа іс-шара қосу
    </a>
    @endcan
</div>

<div class="grid-2">
    @forelse($events as $event)
    <div class="card" style="display: flex; gap: 1.5rem; flex-direction: column;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h3 style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-calendar-day" style="color: var(--info);"></i> {{ $event->title }}
                </h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.5rem;">
                    {{ $event->description }}
                </p>
            </div>
            <span class="badge badge-blue">{{ $event->event_date->format('d.m.Y') }}</span>
        </div>
        
        <div style="display: flex; justify-content: flex-end; gap: 8px; border-top: 1px solid var(--border); padding-top: 1rem;">
            @can('edit music-news')
            <a href="{{ route('music-news.edit', $event->id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Редакциялау</a>
            @endcan
            
            @can('delete music-news')
            <form action="{{ route('music-news.destroy', $event->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Жоямыз ба?')"><i class="fas fa-trash"></i></button>
            </form>
            @endcan
        </div>
    </div>
    @empty
    <div class="card" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
        <i class="fas fa-folder-open" style="font-size: 3rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
        <p style="color: var(--text-muted);">Әзірге іс-шаралар жоқ.</p>
    </div>
    @endforelse
</div>
@endsection

