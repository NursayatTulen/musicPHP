@extends('layouts.app')

@section('title', 'Құпия сөзді қалпына келтіру — Music Hub')

@section('content')
<div class="login-architecture fade-in">
    <div class="card" style="max-width: 500px; width: 100%; padding: 40px; background: rgba(15, 23, 42, 0.6);">
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-key fa-3x" style="color: var(--primary); margin-bottom: 20px; filter: drop-shadow(0 0 15px var(--primary-glow));"></i>
            <h2 class="text-gradient" style="font-size: 1.8rem; margin-bottom: 10px;">{{ __('Құпия сөзді қалпына келтіру') }}</h2>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">{{ __('Электрондық поштаңызды енгізіңіз, біз сізге құпия сөзді өзгерту сілтемесін жібереміз.') }}</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group-v2" style="margin-bottom: 25px;">
                <label style="display: flex; font-size: 0.75rem; font-weight: 700; color: var(--primary); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px; align-items: center; gap: 8px;">
                    <i class="fas fa-at"></i> Email мекенжайы
                </label>
                <input type="email" name="email" id="email" style="width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border); padding: 16px; border-radius: 16px; color: white; font-size: 1rem; transition: var(--transition);" required>
                @error('email')
                    <span style="color: #ef4444; font-size: 0.75rem; margin-top: 8px; display: block;">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 16px;">
                <i class="fas fa-paper-plane"></i> Сілтемені жіберу
            </button>
        </form>

        <div style="text-align: center; margin-top: 25px;">
            <a href="{{ route('login') }}" style="color: var(--text-secondary); text-decoration: none; font-size: 0.9rem; font-weight: 600; transition: var(--transition);" onmouseover="this.style.color='white'" onmouseout="this.style.color='var(--text-secondary)'">
                <i class="fas fa-arrow-left"></i> Кіру бетіне қайту
            </a>
        </div>
    </div>
</div>

<style>
    .login-architecture {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 170px);
        padding: var(--space-md);
    }
</style>
@endsection

