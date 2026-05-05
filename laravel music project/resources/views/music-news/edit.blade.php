@extends('layouts.app')

@section('title', 'Іс-шараны өңдеу — Music Hub')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="margin-bottom: 2rem;">
        <h1 class="section-title"><i class="fas fa-edit" style="color: var(--info);"></i> Іс-шараны өңдеу</h1>
        <p class="section-subtitle">Іс-шара мәліметтерін өзгертіңіз</p>
    </div>

    <div class="card">
        <form action="{{ route('music-news.update', $event->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="form-label" for="title">Іс-шара атауы</label>
                <input type="text" name="title" id="title" class="form-input" required value="{{ old('title', $event->title) }}">
                @error('title') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="event_date">Өткізілетін күні</label>
                <input type="date" name="event_date" id="event_date" class="form-input" required value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}">
                @error('event_date') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Сипаттамасы</label>
                <textarea name="description" id="description" class="form-input" required>{{ old('description', $event->description) }}</textarea>
                @error('description') <div class="form-error">{{ $message }}</div> @enderror
            </div>

            <div style="display: flex; gap: 12px; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Жаңарту
                </button>
                <a href="{{ route('music-news.index') }}" class="btn btn-secondary">
                    Кері қайту
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

