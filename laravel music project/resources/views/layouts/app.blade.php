<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Music Hub Kazakhstan')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --primary: #8b5cf6;
            --primary-dark: #6d28d9;
            --primary-light: #ddd6fe;
            --secondary: #1e1b4b;
            --accent: #d946ef;
            --bg-dark: #0f172a;
            --bg-card: #1e293b;
            --bg-card-hover: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --border: #334155;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #0ea5e9;
            --success: #22c55e;
            --glass: rgba(15, 23, 42, 0.8);
            --shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
            background-image: radial-gradient(circle at 50% -20%, #1e1b4b 0%, #0f172a 100%);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
        }

        .navbar-brand i {
            font-size: 1.8rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rotate_disc 5s linear infinite;
        }

        @keyframes rotate_disc {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
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
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(139, 92, 246, 0.2);
            text-shadow: 0 0 10px rgba(139, 92, 246, 0.5);
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-user-info {
            text-align: right;
        }

        .nav-user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-primary);
        }

        .nav-user-role {
            font-size: 0.75rem;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.4);
        }

        .btn-logout {
            background: transparent;
            border: 1px solid var(--danger);
            color: var(--danger);
            padding: 6px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: var(--danger);
            color: white;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* ===== ALERTS ===== */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            animation: slideDown 0.3s ease;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #4ade80;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        /* ===== CARDS ===== */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .card-header {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header i {
            color: var(--primary);
        }

        /* ===== GRID ===== */
        .grid-4 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        /* ===== BUTTONS ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.5);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 0.5s ease;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar { padding: 0 1rem; }
            .main-content { padding: 1rem; }
            .grid-4, .grid-3 { grid-template-columns: 1fr; }
            .nav-user-info { display: none; }
            .navbar-nav { gap: 4px; }
            .nav-link span { display: none; }
        }
    </style>
</head>
<body>

    @auth
    <nav class="navbar">
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            <i class="fas fa-compact-disc"></i>
            Music Hub
        </a>

        <ul class="navbar-nav">
            <li><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-record-vinyl"></i> <span>Dashboard</span>
            </a></li>

            <li><a href="#" class="nav-link">
                <i class="fas fa-microphone-lines"></i> <span>Артистер</span>
            </a></li>

            <li><a href="#" class="nav-link">
                <i class="fas fa-music"></i> <span>Тректер</span>
            </a></li>

            @hasanyrole('super-admin|admin|moderator')
            <li><a href="{{ route('upload.index') }}" class="nav-link {{ request()->routeIs('upload.index') ? 'active' : '' }}">
                <i class="fas fa-upload"></i> <span>Studio</span>
            </a></li>
            @endhasanyrole

            @hasanyrole('admin|super-admin')
            <li><a href="{{ route('admin.panel') }}" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                <i class="fas fa-shield-halved"></i> <span>Админ</span>
            </a></li>
            @endhasanyrole
        </ul>

        <div class="nav-user">
            <div class="nav-user-info">
                <div class="nav-user-name">{{ Auth::user()->name }}</div>
                <div class="nav-user-role">{{ Auth::user()->getRoleNames()->first() }}</div>
            </div>
            <div class="nav-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i></button>
            </form>
        </div>
    </nav>
    @endauth

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

