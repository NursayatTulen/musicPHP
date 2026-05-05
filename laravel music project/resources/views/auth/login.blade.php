@extends('layouts.app')

@section('title', 'Кіру — Music Hub')

@section('content')
<div class="login-architecture">
    <div class="login-card-v2">
        <div class="login-visual">
            <div class="visual-content">
                <i class="fas fa-compact-disc fa-spin-slow"></i>
                <h2>Music Hub</h2>
                <p>Welcome to the Sound Studio</p>
            </div>
            <div class="visual-blur"></div>
        </div>
        
        <div class="login-form-side">
            <div class="form-header">
                <h3>Studio Login</h3>
                <p>Өз сессияңызды бастаңыз</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group-v2">
                    <label><i class="fas fa-at"></i> Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="studio@musichub.kz" required autofocus>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-v2">
                    <label><i class="fas fa-lock"></i> Құпия сөз</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-footer-actions">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Есте сақта</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="forgot-link">Құпия сөзді ұмыттыңыз ба?</a>
                </div>

                <button type="submit" class="studio-btn">
                    <span>Кіру</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="auth-switch">
                Аккаунтыңыз жоқ па? <a href="{{ route('register') }}">Тіркелу</a>
            </div>
        </div>
    </div>
</div>

<style>
    .login-architecture {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 150px);
        perspective: 1000px;
    }

    .login-card-v2 {
        display: flex;
        width: 900px;
        background: var(--bg-card);
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid rgba(139, 92, 246, 0.3);
        box-shadow: 0 40px 100px rgba(0,0,0,0.5);
        animation: cardAppear 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes cardAppear {
        from { transform: translateY(50px) rotateX(-10deg); opacity: 0; }
        to { transform: translateY(0) rotateX(0); opacity: 1; }
    }

    .login-visual {
        flex: 1;
        background: linear-gradient(135deg, #6d28d9 0%, #db2777 100%);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .visual-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
    }

    .visual-content i {
        font-size: 5rem;
        margin-bottom: 2rem;
        filter: drop-shadow(0 0 20px rgba(255,255,255,0.4));
    }

    .fa-spin-slow {
        animation: fa-spin 8s linear infinite;
    }

    .visual-content h2 {
        font-size: 2.5rem;
        font-weight: 900;
        letter-spacing: -1px;
    }

    .login-form-side {
        flex: 1.2;
        padding: 4rem;
        background: #111827;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-header h3 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: white;
    }

    .form-header p {
        color: #94a3b8;
        margin-bottom: 2.5rem;
    }

    .form-group-v2 {
        margin-bottom: 1.5rem;
    }

    .form-group-v2 label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #8b5cf6;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-group-v2 input {
        width: 100%;
        background: #1f2937;
        border: 1px solid #374151;
        padding: 14px 18px;
        border-radius: 12px;
        color: white;
        font-size: 1rem;
        transition: 0.3s;
    }

    .form-group-v2 input:focus {
        outline: none;
        border-color: #d946ef;
        background: #111827;
        box-shadow: 0 0 0 4px rgba(217, 70, 239, 0.1);
    }

    .form-footer-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        color: #94a3b8;
        font-size: 0.85rem;
    }

    .forgot-link {
        color: #8b5cf6;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .studio-btn {
        width: 100%;
        background: linear-gradient(90deg, #8b5cf6, #d946ef);
        border: none;
        padding: 16px;
        border-radius: 12px;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        cursor: pointer;
        transition: 0.3s;
    }

    .studio-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(139, 92, 246, 0.4);
    }

    .auth-switch {
        margin-top: 2rem;
        text-align: center;
        color: #64748b;
        font-size: 0.9rem;
    }

    .auth-switch a {
        color: #d946ef;
        text-decoration: none;
        font-weight: 700;
    }

    .error-text {
        color: #ef4444;
        font-size: 0.8rem;
        margin-top: 5px;
        display: block;
    }

    @media (max-width: 900px) {
        .login-card-v2 { width: 100%; max-width: 450px; flex-direction: column; }
        .login-visual { display: none; }
        .login-form-side { padding: 3rem 2rem; }
    }
</style>
@endsection

