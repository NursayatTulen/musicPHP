@extends('layouts.app')

@section('title', __('Add News') . ' — Music Hub')

@section('content')
<div class="login-architecture fade-in">
    <div class="card" style="max-width: 600px; width: 100%; padding: 40px;">
        <h2 class="text-gradient" style="margin-bottom: 30px; font-size: 1.8rem;">
            <i class="fas fa-plus-circle"></i> {{ __('Add Music News') }}
        </h2>

        <form action="{{ route('music-news.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label class="form-label" style="display: block; margin-bottom: 10px; color: var(--text-secondary); font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Title</label>
                <input type="text" name="title" class="form-input" style="width: 100%;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="form-label" style="display: block; margin-bottom: 10px; color: var(--text-secondary); font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Publication Date</label>
                <input type="date" name="event_date" class="form-input" style="width: 100%;" required>
            </div>

            <div style="margin-bottom: 30px;">
                <label class="form-label" style="display: block; margin-bottom: 10px; color: var(--text-secondary); font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Content</label>
                <textarea name="description" class="form-input" style="width: 100%; height: 120px; resize: none;" required></textarea>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" class="btn btn-primary" style="flex: 1;">
                    <i class="fas fa-save"></i> {{ __('Save News') }}
                </button>
                <a href="{{ route('music-news.index') }}" class="btn btn-secondary">
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
