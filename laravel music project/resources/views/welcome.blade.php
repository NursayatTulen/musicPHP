@extends('layouts.app')

@section('title', 'Music Hub Kazakhstan — Welcome to the Sound')

@section('content')
<div style="text-align: center; margin-top: 2rem;">
    <div style="max-width: 500px; margin: 0 auto 3rem; position: relative;">
        <img src="{{ asset('music_hub_hero_1776786535818.png') }}" style="width: 100%; border-radius: 30px; box-shadow: 0 20px 60px rgba(0,0,0,0.6); animation: float 6s ease-in-out infinite;">
    </div>
    
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>

    <h1 style="font-size: 4rem; font-weight: 900; margin-bottom: 1.5rem; background: linear-gradient(135deg, #8b5cf6, #d946ef); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: -1px;">
        Music Hub Kazakhstan
    </h1>
    <p style="font-size: 1.3rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto 3.5rem; line-height: 1.8;">
        Продюсерлер мен орындаушыларды біріктіретін заманауи кеңістік. Өз тректеріңізді жүктеңіз, кәсіби мамандармен байланысыңыз және музыка әлемінің соңғы жаңалықтарымен бөлісіңіз.
    </p>

    <div style="display: flex; gap: 1.5rem; justify-content: center;">
        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary" style="padding: 18px 40px; font-size: 1.2rem; border-radius: 50px;">
                <i class="fas fa-record-vinyl fa-spin"></i> Studio Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary" style="padding: 18px 40px; font-size: 1.2rem; border-radius: 50px;">
                <i class="fas fa-right-to-bracket"></i> Порталға кіру
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary" style="padding: 18px 40px; font-size: 1.2rem; border-radius: 50px;">
                <i class="fas fa-user-plus"></i> Тіркелу
            </a>
        @endauth
    </div>
    
    <div class="grid-3" style="margin-top: 6rem; text-align: left;">
        <div class="card" style="border-top: 4px solid var(--primary);">
            <h3 style="color: var(--primary); margin-bottom: 1.2rem;"><i class="fas fa-cloud-arrow-up"></i> Track Submissions</h3>
            <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.7;">
                Демо-жазбаларыңызды жүктеп, продюсерлердің назарына ілігіңіз. MP3 және WAV форматтарын қолдаймыз.
            </p>
        </div>
        <div class="card" style="border-top: 4px solid var(--accent);">
            <h3 style="color: var(--accent); margin-bottom: 1.2rem;"><i class="fas fa-users-viewfinder"></i> Artist Network</h3>
            <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.7;">
                Басқа артистермен коллаборация жасаңыз, тәжірибе алмасыңыз және өз аудиторияңызды табыңыз.
            </p>
        </div>
        <div class="card" style="border-top: 4px solid var(--info);">
            <h3 style="color: var(--info); margin-bottom: 1.2rem;"><i class="fas fa-radio"></i> Sound Waves</h3>
            <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.7;">
                Музыкалық индустрияның ең өзекті жаңалықтары мен трендтерін Music Hub-пен бірге қадағалаңыз.
            </p>
        </div>
    </div>
</div>
@endsection

