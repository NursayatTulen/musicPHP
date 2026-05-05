@extends('layouts.app')

@section('title', __('Edit Track') . ' — Music Hub')

@section('content')
<div class="login-architecture fade-in">
    <div class="card" style="max-width: 600px; width: 100%; padding: 40px;">
        <h2 class="text-gradient" style="margin-bottom: 30px; font-size: 1.8rem;">
            <i class="fas fa-edit"></i> {{ __('Edit Track') }}
        </h2>

        <form action="{{ route('music-tracks.update', $track->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div style="margin-bottom: 20px;">
                <label class="form-label" style="display: block; margin-bottom: 10px; color: var(--text-secondary); font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Track Title</label>
                <input type="text" name="title" class="form-input" style="width: 100%;" value="{{ $track->title }}" required>
            </div>

            <div style="margin-bottom: 30px;">
                <label class="form-label" style="display: block; margin-bottom: 10px; color: var(--text-secondary); font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Description / Credits</label>
                <textarea name="description" class="form-input" style="width: 100%; height: 120px; resize: none;" required>{{ $track->description }}</textarea>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" class="btn btn-primary" style="flex: 1;">
                    <i class="fas fa-save"></i> {{ __('Update Track') }}
                </button>
                <a href="{{ route('music-tracks.index') }}" class="btn btn-secondary">
                    {{ __('Cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .login-architecture {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 200px);
    }
</style>
@endsection
