@extends('layouts.app')

@section('title', $artist->name . ' — Portfolio')

@section('content')
<div class="fade-in">
    <div class="glass-panel" style="padding: 0; overflow: hidden; margin-bottom: var(--space-lg);">
        <div style="height: 300px; background: url('https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; position: relative;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, transparent, var(--bg-dark));"></div>
        </div>
        
        <div class="profile-header-content">
            <div class="nav-avatar profile-avatar">
                {{ substr($artist->name, 0, 1) }}
            </div>
            
            <div class="profile-info">
                <h1 class="text-gradient profile-name">{{ $artist->name }}</h1>
                <div style="display: flex; gap: 10px; margin-bottom: 15px;" class="profile-badges">
                    @foreach($artist->roles as $role)
                        <span class="badge {{ $role->name == 'super-admin' ? 'badge-red' : 'badge-blue' }}">{{ $role->name }}</span>
                    @endforeach
                </div>
                <p style="color: var(--text-secondary); max-width: 600px;">
                    {{ __('Professional artist and producer from Kazakhstan. Specializing in ethnic-electronic fusion and modern pop soundscapes.') }}
                </p>
            </div>
            
            <div class="profile-actions">
                <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> Message</button>
                <button class="btn btn-secondary"><i class="fas fa-plus"></i> Follow</button>
            </div>
        </div>
    </div>

    <div class="profile-main-grid">
        <div class="card">
            <h3 style="margin-bottom: 30px;"><i class="fas fa-play-circle" style="color: var(--primary);"></i> Featured Tracks</h3>
            <div style="display: flex; flex-direction: column; gap: 15px;">
                @for($i=1; $i<=3; $i++)
                <div class="track-row">
                    <div class="track-icon">
                        <i class="fas fa-music" style="color: var(--primary);"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="font-weight: 800;">Steppe Melodies Vol. {{ $i }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-secondary);">Ethnic Fusion • 4:2{{ $i }}</div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button class="btn-logout" style="color: white;"><i class="fas fa-play"></i></button>
                        <button class="btn-logout" style="color: white;"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px;">Stats</h3>
            <div style="display: grid; gap: 15px;">
                <div class="glass-panel stat-row">
                    <span style="color: var(--text-secondary);">Monthly Listeners</span>
                    <span style="font-weight: 800;">12,450</span>
                </div>
                <div class="glass-panel stat-row">
                    <span style="color: var(--text-secondary);">Followers</span>
                    <span style="font-weight: 800;">3,820</span>
                </div>
                <div class="glass-panel stat-row">
                    <span style="color: var(--text-secondary);">Total Streams</span>
                    <span style="font-weight: 800;">450K</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .profile-header-content {
        padding: 0 50px 50px 50px; 
        margin-top: -80px; 
        position: relative; 
        display: flex; 
        align-items: flex-end; 
        gap: 30px; 
        flex-wrap: wrap;
    }

    .profile-avatar {
        width: 180px; 
        height: 180px; 
        font-size: 5rem; 
        border: 8px solid var(--bg-dark); 
        box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    }

    .profile-name { font-size: 3rem; font-weight: 900; margin-bottom: 10px; }
    
    .profile-main-grid {
        display: grid; 
        grid-template-columns: 2fr 1fr; 
        gap: var(--space-lg);
    }

    .track-row {
        display: flex; 
        align-items: center; 
        gap: 20px; 
        background: rgba(255,255,255,0.03); 
        padding: 15px; 
        border-radius: 20px; 
        border: 1px solid var(--border); 
        transition: var(--transition);
    }

    .track-icon {
        width: 60px; height: 60px; border-radius: 12px; background: #000; display: flex; align-items: center; justify-content: center;
    }

    .stat-row { padding: 15px; border-radius: 15px; display: flex; justify-content: space-between; }

    @media (max-width: 1024px) {
        .profile-header-content { padding: 0 30px 30px 30px; margin-top: -60px; justify-content: center; text-align: center; }
        .profile-avatar { width: 140px; height: 140px; font-size: 3.5rem; }
        .profile-name { font-size: 2.2rem; }
        .profile-info { flex: none; width: 100%; }
        .profile-badges { justify-content: center; }
        .profile-actions { width: 100%; justify-content: center; }
        .profile-main-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 480px) {
        .profile-header-content { padding: 0 20px 20px 20px; margin-top: -50px; }
        .profile-avatar { width: 100px; height: 100px; font-size: 2.5rem; border-width: 4px; }
        .track-row { flex-wrap: wrap; gap: 10px; }
        .track-row div:last-child { width: 100%; justify-content: flex-end; }
    }
</style>
@endsection
