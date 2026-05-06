@extends('layouts.app')

@section('title', 'Music Hub Kazakhstan — Welcome to the Sound')

@section('content')
<div class="fade-in">
    <style>
        .hero-grid {
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: var(--space-xl); 
            align-items: center; 
            min-height: 70vh; 
            margin-bottom: var(--space-xl);
        }

        .hero-title {
            font-size: var(--font-2xl); 
            font-weight: 900; 
            line-height: 1; 
            margin-bottom: var(--space-md); 
            letter-spacing: -2px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @media (max-width: 1024px) {
            .hero-grid { 
                grid-template-columns: 1fr; 
                text-align: center; 
                gap: var(--space-lg);
                margin-bottom: var(--space-lg);
            }
            .hero-title { font-size: 3rem; }
            .hero-grid p { margin-left: auto; margin-right: auto; }
            .hero-grid div:first-child { order: 2; }
            .hero-grid div:last-child { order: 1; }
            .hero-grid .glass-panel { display: none; }
            .hero-grid div[style*="display: flex"] { justify-content: center; }
        }
    </style>

    <div class="hero-grid">
        <div>
            <h1 class="hero-title text-gradient">
                {{ __('Sound of Future.') }}
            </h1>
            <p style="font-size: var(--font-lg); color: var(--text-secondary); margin-bottom: var(--space-lg); max-width: 500px; line-height: 1.6;">
                {{ __('Music Hub Kazakhstan is the ultimate ecosystem for artists, producers, and sound engineers to collaborate, evolve, and conquer the global charts.') }}
            </p>
            
            <div style="display: flex; gap: var(--space-md);">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-record-vinyl"></i> {{ __('Enter Studio') }}
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        {{ __('Join the Hub') }}
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-secondary">
                        {{ __('Sign In') }}
                    </a>
                @endauth
            </div>
        </div>
        
        <div style="position: relative;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 120%; height: 120%; background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%); z-index: -1; filter: blur(50px);"></div>
            <img src="{{ asset('music_hub_hero_v2_1778008012695.png') }}" alt="Music Hub Hero" style="width: 100%; border-radius: 40px; box-shadow: 0 30px 100px rgba(0,0,0,0.8); border: 1px solid var(--border); transform: perspective(1000px) rotateY(-5deg);">
            
            <div class="glass-panel" style="position: absolute; bottom: -30px; right: -30px; padding: 20px 30px; border-radius: 20px; animation: float 6s ease-in-out infinite;">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 12px; height: 12px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 10px #22c55e;"></div>
                    <div>
                        <div style="font-weight: 800; font-size: 1.2rem;">{{ __('Live Now') }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-secondary);">42 {{ __('Producers Online') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid-3" style="margin-top: var(--space-xl);">
        <div class="card">
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(139, 92, 246, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                <i class="fas fa-cloud-arrow-up" style="color: var(--primary); font-size: 1.5rem;"></i>
            </div>
            <h3 style="margin-bottom: 15px;">{{ __('Cloud Studio') }}</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6;">
                {{ __('Upload high-fidelity tracks directly to our secure cloud. Supports multi-track WAV and FLAC.') }}
            </p>
        </div>
        
        <div class="card">
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(217, 70, 239, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                <i class="fas fa-users-viewfinder" style="color: var(--accent); font-size: 1.5rem;"></i>
            </div>
            <h3 style="margin-bottom: 15px;">{{ __('Network') }}</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6;">
                {{ __('Connect with top-tier mixing engineers and vocalists from all over Kazakhstan.') }}
            </p>
        </div>

        <div class="card">
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(14, 165, 233, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                <i class="fas fa-chart-line" style="color: #0ea5e9; font-size: 1.5rem;"></i>
            </div>
            <h3 style="margin-bottom: 15px;">{{ __('Analytics') }}</h3>
            <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6;">
                {{ __('Real-time tracking of your track performance across major streaming platforms.') }}
            </p>
        </div>
    </div>
</div>
@endsection

