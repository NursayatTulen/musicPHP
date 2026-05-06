@extends('layouts.app')

@section('title', __('Artists') . ' — Music Hub KZ')

@section('content')
<div class="fade-in">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <div>
            <h1 class="section-title">
                <i class="fas fa-users-viewfinder" style="color: var(--accent);"></i>
                {{ __('Artist Network') }}
            </h1>
            <p class="section-subtitle">{{ __('Discover talented producers and performers from all over Kazakhstan.') }}</p>
        </div>
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="{{ __('Search') }}..." class="form-input" style="width: 300px; padding-left: 45px;">
        </div>
    </div>

    <div class="grid-3">
        @forelse($artists as $artist)
            <div class="card artist-card">
                <div class="artist-cover">
                    <div class="artist-glow"></div>
                    <div class="nav-avatar" style="width: 80px; height: 80px; font-size: 2rem; border: 4px solid var(--bg-dark);">
                        {{ substr($artist->name, 0, 1) }}
                    </div>
                </div>
                <div style="padding: 20px; text-align: center;">
                    <h3 style="font-weight: 900; margin-bottom: 5px;">{{ $artist->name }}</h3>
                    <div style="display: flex; justify-content: center; gap: 5px; margin-bottom: 15px;">
                        @foreach($artist->roles as $role)
                            <span class="badge {{ $role->name == 'super-admin' ? 'badge-red' : 'badge-blue' }}" style="font-size: 0.6rem;">
                                {{ $role->name }}
                            </span>
                        @endforeach
                        @if($artist->roles->isEmpty())
                            <span class="badge badge-green" style="font-size: 0.6rem;">{{ __('Performer') }}</span>
                        @endif
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px; background: rgba(0,0,0,0.2); padding: 15px; border-radius: 15px;">
                        <div>
                            <div style="font-size: 0.65rem; color: var(--text-secondary); text-transform: uppercase;">{{ __('Tracks') }}</div>
                            <div style="font-weight: 800;">12</div>
                        </div>
                        <div>
                            <div style="font-size: 0.65rem; color: var(--text-secondary); text-transform: uppercase;">{{ __('Rating') }}</div>
                            <div style="font-weight: 800;">4.9</div>
                        </div>
                    </div>

                    <a href="{{ route('artists.show', $artist->id) }}" class="btn btn-secondary" style="width: 100%; justify-content: center; padding: 12px;">
                        {{ __('View Portfolio') }}
                    </a>
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 100px;">
                <p>{{ __('No artists found.') }}</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .artist-card {
        padding: 0;
        overflow: hidden;
    }
    
    .artist-cover {
        height: 120px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(217, 70, 239, 0.2));
        position: relative;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        padding-bottom: 0;
        margin-bottom: 40px;
    }

    .artist-glow {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: radial-gradient(circle at 50% 50%, var(--primary-glow), transparent);
        opacity: 0.3;
    }

    .artist-cover .nav-avatar {
        position: absolute;
        bottom: -40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }

    .search-box {
        position: relative;
    }

    .search-box i {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
    }

    @media (max-width: 768px) {
        div[style*="display: flex; justify-content: space-between"] {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 20px;
        }
        .search-box, .search-box .form-input {
            width: 100% !important;
        }
    }
</style>
@endsection
