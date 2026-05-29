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
                <h1>Crea tu<br>cuenta.</h1>
                <p>Regístrate para acceder al sistema académico y gestionar tus matrículas en línea.</p>
            </div>
            <div class="auth-footer-left">
                <span>¿Ya tienes cuenta?</span>
                <a href="{{ route('login') }}">Inicia sesión</a>
            </div>
        </div>

        <div class="auth-right">
            <div class="auth-form-header">
                <h2>Crear cuenta</h2>
                <p>Completa los datos para registrarte</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field-group">
                    <label for="name">Nombre completo</label>
                    <input id="name" type="text"
                        class="field-input @error('name') field-error @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Tu nombre completo"
                        required autocomplete="name" autofocus>
                    @error('name')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="email">Correo electrónico</label>
                    <input id="email" type="email"
                        class="field-input @error('email') field-error @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="usuario@correo.com"
                        required autocomplete="email">
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password"
                        class="field-input @error('password') field-error @enderror"
                        name="password"
                        placeholder="Mínimo 8 caracteres"
                        required autocomplete="new-password">
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="password-confirm">Confirmar contraseña</label>
                    <input id="password-confirm" type="password"
                        class="field-input"
                        name="password_confirmation"
                        placeholder="Repite tu contraseña"
                        required autocomplete="new-password">
                </div>

                <button type="submit" class="btn-submit">Crear cuenta</button>

            </form>
        </div>

    </div>
</div>
@endsection
