@extends('layouts.app')

@section('content')
<div class="auth-page">

    {{-- MARCA SUPERIOR --}}
    <div class="auth-brand-top">
        <svg class="brand-crest" viewBox="0 0 80 92" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40 2L76 16V52C76 68.569 59.882 82.14 40 90C20.118 82.14 4 68.569 4 52V16L40 2Z"
                  fill="rgba(13,18,32,0.95)" stroke="rgba(201,168,76,0.7)" stroke-width="1.2"/>
            <path d="M40 8L70 20V52C70 65.5 56.4 77.5 40 84.5C23.6 77.5 10 65.5 10 52V20L40 8Z"
                  fill="none" stroke="rgba(201,168,76,0.25)" stroke-width="0.8"/>
            <text x="40" y="56" font-family="Cinzel, serif" font-size="28" font-weight="500"
                  fill="rgba(201,168,76,0.9)" text-anchor="middle" letter-spacing="1">K</text>
        </svg>
        <div class="brand-name">KRONOS</div>
        <div class="brand-sub">University</div>
    </div>

    {{-- CARD --}}
    <div class="auth-card">

        {{-- TABS --}}
        <div class="auth-tabs">
            <a href="{{ route('login') }}" class="auth-tab active">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="auth-tab">Crear Cuenta</a>
        </div>

        <div class="auth-body">

            <div class="auth-title">Bienvenido de vuelta</div>
            <div class="auth-desc">Ingresa tus credenciales para acceder al sistema.</div>

            {{-- ERRORES --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- BOTONES SOCIALES --}}
            <div class="social-grid">
                <a href="{{ url('/auth/google') }}" class="btn-social">
                    {{-- Google icon --}}
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Continuar con Google
                </a>

                <a href="{{ url('/auth/github/redirect') }}" class="btn-social">
                    {{-- GitHub icon --}}
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                    </svg>
                    Continuar con GitHub
                </a>
            </div>

            <div class="auth-divider"><span>O CONTINÚA CON</span></div>

            {{-- FORMULARIO --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="field-group">
                    <span class="field-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="field-input @error('email') is-error @enderror"
                        value="{{ old('email') }}"
                        placeholder="Correo electrónico"
                        required autocomplete="email" autofocus>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- CONTRASEÑA --}}
                <div class="field-group">
                    <span class="field-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </span>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="field-input has-toggle @error('password') is-error @enderror"
                        placeholder="Contraseña"
                        required autocomplete="current-password">
                    <button type="button" class="field-toggle" onclick="togglePwd('password', this)" tabindex="-1">
                        <svg id="eye-password" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- OPCIONES --}}
                <div class="field-row">
                    <label class="check-label">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Recordarme</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="link-forgot" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                {{-- BOTÓN --}}
                <button type="submit" class="btn-submit">
                    Ingresar al Sistema
                    <span class="btn-arrow">›</span>
                </button>

                <!-- DIVIDER -->
                <div class="divider">
                    <span>o continúa con</span>
                </div>

                <!-- GOOGLE LOGIN -->
                <a href="{{ url('/auth/google') }}" class="btn-google">
                    <img src="https://www.google.com/favicon.ico" width="16">
                    Google
                </a>

            <!-- GITHUB LOGIN -->
<a href="{{ url('/auth/github/redirect') }}" class="btn-github">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.929.43.372.823 1.102.823 2.222 0 1.606-.015 2.896-.015 3.286 0 .322.216.694.825.576C20.565 21.795 24 17.295 24 12c0-6.63-5.37-12-12-12z"/>
    </svg>
    Continuar con GitHub
</a>

            </form>
        </div>

    <div class="auth-footer">
        © {{ date('Y') }} KRONOS University · Todos los derechos reservados
    </div>

</div>

<script>
function togglePwd(fieldId, btn) {
    const input = document.getElementById(fieldId);
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    btn.style.color = isHidden ? 'rgba(201,168,76,0.7)' : 'rgba(255,255,255,0.3)';
}
</script>
@endsection
