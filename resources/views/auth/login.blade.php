@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">

        <div class="auth-left">
            <div class="auth-brand">
                <span class="auth-brand-icon">✦</span>
                <span>Sistema de Matrícula</span>
            </div>

            <div class="auth-hero">
                <h1>Bienvenido<br>de vuelta.</h1>
                <p>Accede a tu cuenta para gestionar tus matrículas y expedientes académicos.</p>
            </div>

            <div class="auth-footer-left">
                <span>¿No tienes cuenta?</span>
                <a href="{{ route('register') }}">Regístrate aquí</a>
            </div>
        </div>

        <div class="auth-right">

            <div class="auth-form-header">
                <h2>Iniciar sesión</h2>
                <p>Ingresa tus credenciales para continuar</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div class="field-group">
                    <label for="email">Correo electrónico</label>
                    <input id="email" type="email"
                        class="field-input @error('email') field-error @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="usuario@correo.com"
                        required autocomplete="email" autofocus>

                    @error('email')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="field-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password"
                        class="field-input @error('password') field-error @enderror"
                        name="password"
                        placeholder="••••••••"
                        required autocomplete="current-password">

                    @error('password')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <!-- OPTIONS -->
                <div class="field-row">
                    <label class="check-label">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Recordarme</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="link-subtle" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                    @endif
                </div>

                <!-- LOGIN BUTTON -->
                <button type="submit" class="btn-submit">
                    Iniciar sesión
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
                    <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" width="16">
                    GitHub
                </a>

            </form>

        </div>

    </div>
</div>
@endsection