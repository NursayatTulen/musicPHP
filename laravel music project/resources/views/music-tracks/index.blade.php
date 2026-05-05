@extends('layouts.app')

@section('title', 'Эко-жобалар — Music Hub')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1 class="section-title"><i class="fas fa-microphone" style="color: var(--primary);"></i> Эко-жобалар</h1>
        <p class="section-subtitle" style="margin-bottom: 0;">Қазақстанның экологиялық жобалары</p>
    </div>
    @can('create music-tracks')
    <a href="{{ route('music-tracks.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Жаңа жоба
    </a>
    @endcan
</div>

<div class="grid-3">
    @forelse($projects as $project)
    <div class="card">
        <div class="card-header">
            <i class="fas fa-music"></i>
            {{ $project->title }}
        </div>
        <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 1rem;">
            {{ $project->description }}
        </p>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span class="badge badge-green">Белсенді</span>
            <div style="display: flex; gap: 8px;">
                @can('edit music-tracks')
                <a href="{{ route('music-tracks.edit', $project->id) }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                @endcan
                @can('delete music-tracks')
                <form action="{{ route('music-tracks.destroy', $project->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Шынымен жоясыз ба?')">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                @endcan
            </div>
        </div>
    </div>
    @empty
    <div class="card" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
        <i class="fas fa-folder-open" style="font-size: 3rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
        <p style="color: var(--text-muted);">Әзірге жобалар жоқ.</p>
    </div>
    @endforelse
</div>
@endsection

