@extends('layouts.app')

@section('title', 'Dashboard — Music Hub')

@section('content')
<div style="margin-bottom: 2rem;">
    <h1 class="section-title">
        <i class="fas fa-headphones" style="color: var(--primary);"></i>
        Қош келдіңіз, {{ $user->name }}!
    </h1>
    <p class="section-subtitle">Music Hub — Сіздің музыкалық әлеміңіз бен креативті кеңістігіңіз</p>
</div>

{{-- Статистика карточкалары --}}
<div class="grid-4" style="margin-bottom: 2rem;">
    <div class="stat-card" style="border-bottom: 4px solid var(--primary);">
        <div class="stat-icon purple" style="background: rgba(139, 92, 246, 0.15); color: var(--primary);"><i class="fas fa-id-badge"></i></div>
        <div>
            <div class="stat-value">{{ $roles->count() }}</div>
            <div class="stat-label">Сіздің статус</div>
        </div>
    </div>
    <div class="stat-card" style="border-bottom: 4px solid var(--info);">
        <div class="stat-icon blue"><i class="fas fa-unlock-keyhole"></i></div>
        <div>
            <div class="stat-value">{{ $permissions->count() }}</div>
            <div class="stat-label">Рұқсаттар</div>
        </div>
    </div>
    <div class="stat-card" style="border-bottom: 4px solid var(--accent);">
        <div class="stat-icon pink" style="background: rgba(217, 70, 239, 0.15); color: var(--accent);"><i class="fas fa-music"></i></div>
        <div>
            <div class="stat-value">{{ $projectsCount }}</div>
            <div class="stat-label">Тректер саны</div>
        </div>
    </div>
    <div class="stat-card" style="border-bottom: 4px solid var(--warning);">
        <div class="stat-icon yellow"><i class="fas fa-bolt-lightning"></i></div>
        <div>
            <div class="stat-value">{{ $eventsCount }}</div>
            <div class="stat-label">Жаңалықтар</div>
        </div>
    </div>
</div>

{{-- Рольдер мен рұқсаттар --}}
<div class="grid-2" style="margin-bottom: 2rem;">
    <div class="card">
        <div class="card-header"><i class="fas fa-user-gear"></i> Сіздің рольдеріңіз</div>
        <div style="display: flex; flex-wrap: wrap; gap: 8px;">
            @foreach($roles as $role)
                @php
                    $badgeClass = match($role) {
                        'super-admin' => 'badge-red',
                        'admin' => 'badge-yellow',
                        'moderator' => 'badge-blue',
                        default => 'badge-purple',
                    };
                @endphp
                <span class="badge {{ $badgeClass }}">
                    <i class="fas fa-crown"></i> {{ $role }}
                </span>
            @endforeach
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fas fa-shield-halved"></i> Рұқсаттар</div>
        <div class="permission-grid">
            @foreach($permissions as $perm)
                <div class="permission-item" style="background: rgba(139, 92, 246, 0.05); color: var(--primary); border-color: rgba(139, 92, 246, 0.2);">
                    <i class="fas fa-circle-check"></i> {{ $perm }}
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Жылдам әрекеттер --}}
<div class="card" style="background: linear-gradient(135deg, var(--bg-card) 0%, #1e1b4b 100%);">
    <div class="card-header"><i class="fas fa-star" style="color: var(--warning);"></i> Жылдам әрекеттер</div>
    <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 0.5rem;">
        
        <a href="{{ route('upload.index') }}" class="btn btn-primary" style="background: linear-gradient(135deg, #8b5cf6, #d946ef);">
            <i class="fas fa-cloud-arrow-up"></i> Студияға өту
        </a>

        <a href="#" class="btn btn-secondary">
            <i class="fas fa-microphone"></i> Жаңа артист
        </a>

        <a href="#" class="btn btn-secondary">
            <i class="fas fa-list-music"></i> Плейлисттер
        </a>

        @hasanyrole('admin|super-admin')
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary">
            <i class="fas fa-gears"></i> Админ панелі
        </a>
        @endhasanyrole

        @can('view analytics')
        <a href="{{ route('admin.analytics') }}" class="btn btn-secondary">
            <i class="fas fa-chart-line"></i> Аналитика
        </a>
        @endcan
    </div>
</div>
@endsection

