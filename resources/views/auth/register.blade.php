@extends('layouts.app')

@section('title', 'Тіркелу — Music Hub')

@section('content')
<div class="login-architecture fade-in">
    <div class="login-card-v2">
        <div class="login-visual">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset('music_hub_hero_v2_1778008012695.png') }}'); background-size: cover; background-position: center; filter: brightness(0.4) saturate(1.2);"></div>
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(139, 92, 246, 0.4), rgba(217, 70, 239, 0.4));"></div>
            <div class="visual-content">
                <i class="fas fa-microphone-lines fa-bounce" style="--fa-animation-duration: 3s;"></i>
                <h2 class="text-gradient">Join the Hub</h2>
                <p>{{ __('Become part of the most advanced music community in Kazakhstan.') }}</p>
            </div>
        </div>
        
        <div class="login-form-side">
            <div class="form-header">
                <h3 class="text-gradient" style="font-size: 2rem; margin-bottom: 0.5rem;">{{ __('Артист Тіркеу') }}</h3>
                <p style="color: var(--text-secondary); margin-bottom: 2rem;">{{ __('Create your creative profile today.') }}</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group-v2">
                    <label><i class="fas fa-user"></i> Аты-жөні</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Your Full Name" required autofocus>
                    @error('name')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-v2">
                    <label><i class="fas fa-at"></i> Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="artist@musichub.kz" required>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group-v2">
                        <label><i class="fas fa-lock"></i> Құпия сөз</label>
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>
                    <div class="form-group-v2">
                        <label><i class="fas fa-circle-check"></i> Растау</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" required>
                    </div>
                </div>
                @error('password')
                    <span class="error-text" style="margin-top: -10px; margin-bottom: 15px;">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 16px;">
                    <span>{{ __('Тіркелуді бастау') }}</span>
                    <i class="fas fa-user-plus"></i>
                </button>
            </form>

            <div class="auth-switch">
                {{ __("Already have an account?") }} <a href="{{ route('login') }}">{{ __('Кіру') }}</a>
            </div>
        </div>
    </div>
</div>

<style>
    .login-architecture {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 160px);
        padding: var(--space-md);
    }

    .login-card-v2 {
        display: flex;
        width: 100%;
        max-width: 1100px;
        background: var(--bg-card);
        backdrop-filter: blur(20px);
        border-radius: 40px;
        overflow: hidden;
        border: 1px solid var(--border);
        box-shadow: var(--shadow-premium);
        flex-direction: column;
    }

    .login-visual {
        position: relative;
        display: none;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .visual-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: var(--space-xl);
    }

    .visual-content i {
        font-size: 5rem;
        margin-bottom: 1.5rem;
        color: white;
        filter: drop-shadow(0 0 20px var(--primary-glow));
    }

    .login-form-side {
        flex: 1.2;
        padding: var(--space-xl);
        background: rgba(15, 23, 42, 0.4);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-group-v2 {
        margin-bottom: 1.5rem;
    }

    .form-group-v2 label {
        display: flex;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        align-items: center;
        gap: 8px;
    }

    .form-group-v2 input {
        width: 100%;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--border);
        padding: 16px;
        border-radius: 16px;
        color: white;
        font-size: 1rem;
        transition: var(--transition);
    }

    .form-group-v2 input:focus {
        outline: none;
        border-color: var(--primary);
        background: rgba(255, 255, 255, 0.07);
        box-shadow: 0 0 20px var(--primary-glow);
    }

    .auth-switch {
        margin-top: 2rem;
        text-align: center;
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    .auth-switch a {
        color: var(--accent);
        text-decoration: none;
        font-weight: 800;
    }

    .error-text {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 8px;
        display: block;
    }

    @media (max-width: 768px) {
        .login-card-v2 { flex-direction: column; border-radius: 30px; }
        .login-visual { display: none; }
        .login-form-side { flex: 1; padding: var(--space-lg); }
        .form-header h3 { font-size: 1.5rem !important; }
        div[style*="grid-template-columns: 1fr 1fr"] { grid-template-columns: 1fr !important; gap: 0 !important; }
    }

    @media (max-width: 480px) {
        .login-architecture { padding: 10px; }
        .login-form-side { padding: 25px 20px; }
        .login-card-v2 { border-radius: 20px; }
        .form-group-v2 input { padding: 14px; font-size: 0.9rem; }
    }
</style>
@endsection

