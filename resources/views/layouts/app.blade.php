<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Music Hub Kazakhstan')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #8b5cf6;
            --primary-glow: rgba(139, 92, 246, 0.5);
            --accent: #d946ef;
            --accent-glow: rgba(217, 70, 239, 0.5);
            --bg-dark: #020617;
            --bg-card: rgba(30, 41, 59, 0.5);
            --bg-card-hover: rgba(51, 65, 85, 0.7);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --border: rgba(255, 255, 255, 0.08);
            --border-hover: rgba(139, 92, 246, 0.3);
            
            --space-xs: 0.5rem;
            --space-sm: 1rem;
            --space-md: 1.5rem;
            --space-lg: 3rem;
            --space-xl: 5rem;

            --font-xs: 0.75rem;
            --font-sm: 0.875rem;
            --font-base: 1rem;
            --font-lg: 1.25rem;
            --font-xl: 2.5rem;
            --font-2xl: 4.5rem;
            
            --transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            --glass-bg: rgba(15, 23, 42, 0.7);
            --shadow-premium: 0 20px 40px -15px rgba(0, 0, 0, 0.7);
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-dark); }
        ::-webkit-scrollbar-thumb { 
            background: linear-gradient(var(--primary), var(--accent)); 
            border-radius: 10px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.5;
            background-image: 
                radial-gradient(circle at 0% 0%, rgba(139, 92, 246, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 100% 100%, rgba(217, 70, 239, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, #020617 0%, #020617 100%);
            overflow-x: hidden;
        }

        .navbar {
            background: var(--glass-bg);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-bottom: 1px solid var(--border);
            padding: 0 var(--space-md);
            height: 85px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 900;
            color: white;
            letter-spacing: -1px;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .navbar-brand i {
            font-size: 1.8rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 10px var(--primary-glow));
            animation: rotate_disc 12s linear infinite;
        }

        @media (max-width: 1024px) {
            .navbar {
                height: auto;
                padding: 15px;
                flex-direction: column;
                gap: 15px;
            }
            .navbar-nav {
                width: 100%;
                overflow-x: auto;
                padding-bottom: 5px;
                justify-content: flex-start;
                scrollbar-width: none;
            }
            .navbar-nav::-webkit-scrollbar { display: none; }
            
            .nav-user {
                width: 100%;
                justify-content: space-between;
                padding-top: 10px;
                border-top: 1px solid var(--border);
            }
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            background: rgba(139, 92, 246, 0.1);
            color: var(--primary);
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .language-switcher {
            display: flex;
            gap: 4px;
            background: rgba(255,255,255,0.03);
            padding: 4px;
            border-radius: 10px;
            border: 1px solid var(--border);
        }

        .lang-btn {
            padding: 5px 8px;
            font-size: 0.65rem;
            font-weight: 800;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 6px;
            transition: var(--transition);
        }

        .lang-btn:hover, .lang-btn.active {
            color: white;
            background: var(--primary);
        }

        .nav-user-info { text-align: right; }

        .nav-user-name {
            font-weight: 800;
            font-size: 0.8rem;
            color: white;
            line-height: 1;
        }

        .nav-user-role {
            font-size: 0.65rem;
            color: var(--primary);
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .nav-avatar {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 0.9rem;
            color: white;
            box-shadow: 0 5px 15px -5px var(--primary-glow);
            cursor: pointer;
            transition: var(--transition);
        }

        .main-content {
            width: 100%;
            max-width: 1300px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        @media (max-width: 768px) {
            .main-content { padding: 20px 15px; }
            .section-title { font-size: 1.5rem; }
        }

        .card {
            background: var(--bg-card);
            backdrop-filter: blur(15px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 20px;
            transition: var(--transition);
        }

        .grid-3 {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        @media (max-width: 480px) {
            .grid-3 { grid-template-columns: 1fr; }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 24px;
            border-radius: 14px;
            font-size: 0.85rem;
            font-weight: 800;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            box-shadow: 0 8px 20px -5px var(--primary-glow);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -10px var(--primary-glow);
        }

        .alert {
            padding: 15px 20px;
            border-radius: 16px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border-color: rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        .grid-3 {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        }

        .text-gradient {
            background: linear-gradient(135deg, #fff 40%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .fade-in {
            animation: fadeIn 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 30px;
        }

        /* Utilities for Admin & Dashboard */
        .section-title {
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: -1px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.blue { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .stat-icon.yellow { background: rgba(234, 179, 8, 0.1); color: #eab308; }
        .stat-icon.green { background: rgba(34, 197, 94, 0.1); color: #22c55e; }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 900;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .badge-red { background: rgba(239, 68, 68, 0.1); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.2); }
        .badge-blue { background: rgba(59, 130, 246, 0.1); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.2); }
        .badge-yellow { background: rgba(234, 179, 8, 0.1); color: #fbbf24; border: 1px solid rgba(234, 179, 8, 0.2); }
        .badge-green { background: rgba(34, 197, 94, 0.1); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.2); }

        .table-container {
            width: 100%;
            overflow-x: auto;
            border-radius: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: rgba(255, 255, 255, 0.03);
            padding: 15px 20px;
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-secondary);
            font-weight: 800;
            letter-spacing: 1px;
        }

        td {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
            color: var(--text-primary);
        }

        tr:last-child td { border-bottom: none; }

        tr:hover td { background: rgba(255, 255, 255, 0.02); }

        .form-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            padding: 12px 16px;
            border-radius: 12px;
            color: white;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.05);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-3px);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.75rem;
            border-radius: 10px;
        }

        .grid-2 {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        }

        .card-header {
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
            color: var(--text-secondary);
        }

        .permission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
        }

        .permission-item {
            background: rgba(255, 255, 255, 0.03);
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 0.75rem;
            color: var(--text-secondary);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .permission-item i { color: #22c55e; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand">
            <i class="fas fa-compact-disc"></i>
            Music Hub
        </a>

        <ul class="navbar-nav">
            @auth
            <li><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-record-vinyl"></i> <span>{{ __('Dashboard') }}</span>
            </a></li>

            <li><a href="{{ route('artists.index') }}" class="nav-link {{ request()->routeIs('artists.*') ? 'active' : '' }}">
                <i class="fas fa-microphone-lines"></i> <span>{{ __('Artists') }}</span>
            </a></li>

            <li><a href="{{ route('music-tracks.index') }}" class="nav-link {{ request()->routeIs('music-tracks.*') ? 'active' : '' }}">
                <i class="fas fa-music"></i> <span>{{ __('Music Tracks') }}</span>
            </a></li>

            @hasanyrole('super-admin|admin|moderator')
            <li><a href="{{ route('upload.index') }}" class="nav-link {{ request()->routeIs('upload.index') ? 'active' : '' }}">
                <i class="fas fa-upload"></i> <span>{{ __('Studio') }}</span>
            </a></li>
            @endhasanyrole

            @hasanyrole('admin|super-admin')
            <li><a href="{{ route('admin.panel') }}" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                <i class="fas fa-shield-halved"></i> <span>{{ __('Admin Panel') }}</span>
            </a></li>
            @endhasanyrole
            @endauth
        </ul>

        <div class="nav-user">
            <div class="language-switcher">
                <a href="{{ route('lang.switch', 'kk') }}" class="lang-btn {{ app()->getLocale() == 'kk' ? 'active' : '' }}">KK</a>
                <a href="{{ route('lang.switch', 'ru') }}" class="lang-btn {{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
                <a href="{{ route('lang.switch', 'en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
            </div>
            @auth
            <div class="nav-user-info">
                <div class="nav-user-name">{{ Auth::user()->name }}</div>
                <div class="nav-user-role">{{ Auth::user()->getRoleNames()->first() }}</div>
            </div>
            <div class="nav-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i></button>
            </form>
            @else
            <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-right-to-bracket"></i> <span>{{ __('Login') }}</span></a>
            <a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user-plus"></i> <span>{{ __('Register') }}</span></a>
            @endauth
        </div>
    </nav>

    <div class="main-content fade-in">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>

