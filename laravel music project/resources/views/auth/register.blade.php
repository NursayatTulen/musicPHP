@extends('layouts.app')

@section('title', 'Тіркелу — Music Hub')

@section('content')
<div style="max-width: 440px; margin: 4rem auto;">
    <div style="text-align: center; margin-bottom: 2rem;">
        <div style="font-size: 3rem; margin-bottom: 1rem;">
            <i class="fas fa-music" style="color: var(--primary);"></i>
        </div>
        <h1 style="font-size: 1.8rem; font-weight: 800;">Music Hub</h1>
        <p style="color: var(--text-muted); margin-top: 0.5rem;">Жаңа аккаунт жасаңыз</p>
    </div>

    <div class="card" style="padding: 2rem;">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Аты-жөні</label>
                <input type="text" name="name" class="form-input" value="{{ old('name') }}"
                       placeholder="Аты-жөніңізді енгізіңіз" required autofocus>
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="{{ old('email') }}"
                       placeholder="email@example.com" required>
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Құпия сөз</label>
                <input type="password" name="password" class="form-input"
                       placeholder="Кемінде 8 символ" required>
                @error('password')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Құпия сөзді растаңыз</label>
                <input type="password" name="password_confirmation" class="form-input"
                       placeholder="Құпия сөзді қайталаңыз" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                <i class="fas fa-user-plus"></i> Тіркелу
            </button>
        </form>

        <div style="text-align: center; margin-top: 1.5rem; color: var(--text-muted); font-size: 0.85rem;">
            Аккаунтыңыз бар ма?
            <a href="{{ route('login') }}" style="color: var(--primary); text-decoration: none; font-weight: 600;">
                Кіру
            </a>
        </div>
    </div>
</div>
@endsection

