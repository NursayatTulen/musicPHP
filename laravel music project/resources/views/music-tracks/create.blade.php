@extends('layouts.app')

@section('title', 'Жаңа жоба жасау — Music Hub')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 2rem;">
        <h1 class="section-title"><i class="fas fa-plus-circle" style="color: var(--primary);"></i> Жаңа эко-жоба</h1>
        <p class="section-subtitle">Жаңа экологиялық жоба туралы мәліметтерді енгізіңіз</p>
    </div>

    <div class="card">
        <form action="{{ route('music-tracks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="title">Жоба атауы</label>
                <input type="text" name="title" id="title" class="form-input" placeholder="Мысалы: Аралды құтқару" required value="{{ old('title') }}">
                @error('title') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Сипаттамасы</label>
                <textarea name="description" id="description" class="form-input" placeholder="Жоба туралы толық мәлімет..." required>{{ old('description') }}</textarea>
                @error('description') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div style="display: flex; gap: 12px; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Сақтау
                </button>
                <a href="{{ route('music-tracks.index') }}" class="btn btn-secondary">
                    Кері қайту
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

