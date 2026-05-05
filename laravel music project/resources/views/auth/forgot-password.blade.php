@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0" style="border-radius: 15px;">
                <div class="card-header bg-primary text-white text-center py-3" style="border-radius: 15px 15px 0 0;">
                    <h4 class="mb-0">Құпия сөзді қалпына келтіру</h4>
                </div>
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p class="text-muted mb-4 text-center">Электрондық поштаңызды енгізіңіз, біз сізге құпия сөзді өзгерту сілтемесін жібереміз.</p>

                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email мекенжайы</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2">Сілтемені жіберу</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none text-muted small">Кіру бетіне қайту</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

