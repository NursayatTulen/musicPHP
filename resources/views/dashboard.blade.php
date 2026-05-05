@extends('layouts.app')

@section('title', 'Dashboard — Music Hub')

@section('content')
<div class="fade-in">    <style>
        .dashboard-header {
            margin-bottom: var(--space-xl); 
            display: flex; 
            justify-content: space-between; 
            align-items: flex-end;
            gap: 20px;
        }

        .stats-grid {
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: var(--space-md); 
            margin-bottom: var(--space-xl);
        }

        .main-dashboard-grid {
            display: grid; 
            grid-template-columns: 2fr 1fr; 
            gap: var(--space-lg); 
            margin-bottom: var(--space-xl);
        }

        .actions-grid {
            display: grid; 
            grid-template-columns: repeat(2, 1fr); 
            gap: 15px;
        }

        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 1024px) {
            .main-dashboard-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .dashboard-header { flex-direction: column; align-items: flex-start; }
            .dashboard-header .glass-panel { width: 100%; display: flex; justify-content: space-between; align-items: center; }
            .dashboard-header h1 { font-size: 1.8rem !important; }
        }

        @media (max-width: 580px) {
            .stats-grid { grid-template-columns: 1fr; }
            .actions-grid { grid-template-columns: 1fr; }
        }
    </style>

    <div class="dashboard-header">
        <div>
            <h1 class="text-gradient" style="font-size: var(--font-xl); font-weight: 900; margin-bottom: 0.5rem;">
                <i class="fas fa-headphones" style="color: var(--primary);"></i>
                {{ __('Welcome back') }}, {{ $user->name }}
            </h1>
            <p style="color: var(--text-secondary); font-size: 1rem;">{{ __('Your personal creative workstation is ready.') }}</p>
        </div>
        <div class="glass-panel" style="padding: 12px 24px; border-radius: 16px;">
            <div style="font-size: 0.65rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Current Session</div>
            <div style="font-weight: 700; color: var(--primary); font-size: 1.2rem;">02:45:12</div>
        </div>
    </div>

    <div class="stats-grid">
        <div class="card" style="padding: 24px; display: flex; flex-direction: column; gap: 15px;">
            <div style="width: 45px; height: 45px; border-radius: 12px; background: rgba(139, 92, 246, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                <i class="fas fa-id-badge fa-lg"></i>
            </div>
            <div>
                <div style="font-size: 1.5rem; font-weight: 800;">{{ $roles->count() }}</div>
                <div style="font-size: 0.8rem; color: var(--text-secondary);">{{ __('Active Roles') }}</div>
            </div>
        </div>
        
        <div class="card" style="padding: 24px; display: flex; flex-direction: column; gap: 15px;">
            <div style="width: 45px; height: 45px; border-radius: 12px; background: rgba(14, 165, 233, 0.1); display: flex; align-items: center; justify-content: center; color: #0ea5e9;">
                <i class="fas fa-unlock-keyhole fa-lg"></i>
            </div>
            <div>
                <div style="font-size: 1.5rem; font-weight: 800;">{{ $permissions->count() }}</div>
                <div style="font-size: 0.8rem; color: var(--text-secondary);">{{ __('Permissions') }}</div>
            </div>
        </div>

        <div class="card" style="padding: 24px; display: flex; flex-direction: column; gap: 15px;">
            <div style="width: 45px; height: 45px; border-radius: 12px; background: rgba(217, 70, 239, 0.1); display: flex; align-items: center; justify-content: center; color: var(--accent);">
                <i class="fas fa-music fa-lg"></i>
            </div>
            <div>
                <div style="font-size: 1.5rem; font-weight: 800;">{{ $projectsCount }}</div>
                <div style="font-size: 0.8rem; color: var(--text-secondary);">{{ __('Total Tracks') }}</div>
            </div>
        </div>

        <div class="card" style="padding: 24px; display: flex; flex-direction: column; gap: 15px;">
            <div style="width: 45px; height: 45px; border-radius: 12px; background: rgba(245, 158, 11, 0.1); display: flex; align-items: center; justify-content: center; color: #f59e0b;">
                <i class="fas fa-bolt-lightning fa-lg"></i>
            </div>
            <div>
                <div style="font-size: 1.5rem; font-weight: 800;">{{ $eventsCount }}</div>
                <div style="font-size: 0.8rem; color: var(--text-secondary);">{{ __('News Updates') }}</div>
            </div>
        </div>
    </div>

    <div class="main-dashboard-grid">
        <div class="card">
            <h3 style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-star" style="color: var(--warning);"></i> 
                {{ __('Creative Actions') }}
            </h3>
            <div class="actions-grid">
                <a href="{{ route('upload.index') }}" class="btn btn-primary" style="justify-content: flex-start;">
                    <i class="fas fa-cloud-arrow-up"></i> {{ __('Open Studio') }}
                </a>
                <a href="#" class="btn btn-secondary" style="justify-content: flex-start;">
                    <i class="fas fa-microphone"></i> {{ __('Register Artist') }}
                </a>
                <a href="#" class="btn btn-secondary" style="justify-content: flex-start;">
                    <i class="fas fa-list-music"></i> {{ __('Manage Playlists') }}
                </a>
                @hasanyrole('admin|super-admin')
                <a href="{{ route('admin.panel') }}" class="btn btn-secondary" style="justify-content: flex-start; border-color: var(--accent);">
                    <i class="fas fa-shield-halved"></i> {{ __('Admin Console') }}
                </a>
                @endhasanyrole
            </div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px;">{{ __('Your Identity') }}</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                @foreach($roles as $role)
                    <span style="padding: 8px 16px; border-radius: 12px; font-size: 0.75rem; font-weight: 700; background: linear-gradient(135deg, var(--primary), var(--accent)); color: white; text-transform: uppercase; letter-spacing: 1px;">
                        {{ $role }}
                    </span>
                @endforeach
            </div>
            <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid var(--border);">
                <div style="font-size: 0.8rem; color: var(--text-secondary); margin-bottom: 10px;">{{ __('Recent Permissions') }}</div>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    @foreach($permissions->take(3) as $perm)
                        <div style="font-size: 0.85rem; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-check-circle" style="color: #22c55e;"></i> {{ $perm }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

