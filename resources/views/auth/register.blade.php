@extends('layouts.app')

@section('content')
<style>
    /* Ocultar barra de navegación solo en esta página */
    .navbar {
        display: none !important;
    }
    body {
        padding-top: 0 !important;
    }
    .register-wrap {
        min-height: 100vh;
        margin-top: 0;
        position: relative;
        overflow: hidden;
    }
    /* Video de fondo */
    .video-bg {
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        transform: translate(-50%, -50%);
        object-fit: cover;
        z-index: -2;
        pointer-events: none;
    }
    /* Capa oscura sobre el video */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: -1;
        pointer-events: none;
    }
    /* Contenedor principal */
    .register-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        position: relative;
        z-index: 1;
    }
    /* Tarjeta de dos columnas */
    .register-card {
        display: flex;
        width: 100%;
        max-width: 1100px;
        min-height: 600px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.2);
    }
    /* Lado izquierdo – centrado verticalmente */
    .register-left {
        width: 45%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        border-right: 1px solid rgba(255,255,255,0.2);
    }
    .message-box {
        max-width: 320px;
        text-align: center;
    }
    .message-box h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.8rem;
        font-weight: 600;
        line-height: 1.2;
        color: #fff;
        margin: 0;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    /* Lado derecho – formulario */
    .register-right {
        width: 55%;
        padding: 48px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .form-header {
        margin-bottom: 2rem;
    }
    .form-header .tag {
        font-size: 0.7rem;
        color: #d9c8ff;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .form-header h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #fff;
        margin: 0.2rem 0;
    }
    .form-header p {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.7);
    }
    /* Campos */
    .field {
        margin-bottom: 1.2rem;
    }
    .field label {
        display: block;
        font-size: 0.7rem;
        font-weight: 600;
        color: rgba(255,255,255,0.9);
        letter-spacing: 1px;
        margin-bottom: 0.3rem;
    }
    .field input {
        width: 100%;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 14px;
        padding: 0.8rem 1rem;
        font-size: 0.9rem;
        color: #fff;
        transition: all 0.2s;
        outline: none;
    }
    .field input::placeholder {
        color: rgba(255,255,255,0.5);
    }
    .field input:focus {
        border-color: #d9c8ff;
        box-shadow: 0 0 0 3px rgba(217,200,255,0.2);
        background: rgba(255,255,255,0.25);
    }
    .field input.error {
        border-color: #fca5a5;
    }
    .error-msg {
        font-size: 0.7rem;
        color: #fecaca;
        margin-top: 0.2rem;
        display: block;
    }
    /* Términos */
    .terms {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin: 1.2rem 0;
        font-size: 0.75rem;
        color: rgba(255,255,255,0.85);
    }
    .terms input {
        accent-color: #d9c8ff;
        width: 16px;
        height: 16px;
    }
    .terms a {
        color: #d9c8ff;
        text-decoration: none;
    }
    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #6c63b0, #8b79c2);
        color: white;
        border: none;
        border-radius: 40px;
        padding: 0.9rem;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    .btn-submit:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.2);
    }
    .login-link {
        text-align: center;
        font-size: 0.8rem;
        color: rgba(255,255,255,0.7);
    }
    .login-link a {
        color: #d9c8ff;
        font-weight: 500;
        text-decoration: none;
    }
    .alert-error {
        background: rgba(254,242,242,0.2);
        border-left: 3px solid #f87171;
        padding: 0.6rem 1rem;
        border-radius: 12px;
        margin-bottom: 1.2rem;
        font-size: 0.75rem;
        color: #fecaca;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    /* Responsive */
    @media (max-width: 850px) {
        .register-card {
            flex-direction: column;
            max-width: 500px;
        }
        .register-left, .register-right {
            width: 100%;
            padding: 2rem;
        }
        .register-left {
            border-right: none;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            min-height: 200px;
        }
        .message-box h1 {
            font-size: 2rem;
        }
    }
</style>

<video class="video-bg" autoplay muted loop playsinline>
    <source src="{{ asset('videos/register.mp4') }}" type="video/mp4">
</video>
<div class="overlay"></div>

<div class="register-container">
    <div class="register-card">
        <!-- Lado izquierdo: solo título en recuadro claro -->
        <div class="register-left">
            <div class="message-box">
                <h1>Comienza a transformar<br>tu centro educativo</h1>
            </div>
        </div>

        <!-- Lado derecho: formulario (sin cambios) -->
        <div class="register-right">
            <div class="form-header">
                <div class="tag">CREAR CUENTA</div>
                <h2>Regístrate</h2>
                <p>Completa tus datos para empezar</p>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i> Por favor corrige los errores.
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="name">NOMBRE COMPLETO</label>
                    <input id="name" type="text" name="name"
                        class="@error('name') error @enderror"
                        value="{{ old('name') }}"
                        placeholder="Tu nombre"
                        required autocomplete="name" autofocus>
                    @error('name')<span class="error-msg">{{ $message }}</span>@enderror
                </div>

                <div class="field">
                    <label for="email">CORREO ELECTRÓNICO</label>
                    <input id="email" type="email" name="email"
                        class="@error('email') error @enderror"
                        value="{{ old('email') }}"
                        placeholder="usuario@correo.com"
                        required autocomplete="email">
                    @error('email')<span class="error-msg">{{ $message }}</span>@enderror
                </div>

                <div class="field">
                    <label for="password">CONTRASEÑA</label>
                    <input id="password" type="password" name="password"
                        class="@error('password') error @enderror"
                        placeholder="••••••••"
                        required autocomplete="new-password">
                    @error('password')<span class="error-msg">{{ $message }}</span>@enderror
                </div>

                <div class="field">
                    <label for="password-confirm">CONFIRMAR CONTRASEÑA</label>
                    <input id="password-confirm" type="password" name="password_confirmation"
                        placeholder="••••••••"
                        required autocomplete="new-password">
                </div>

                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Acepto los <a href="#">Términos</a> y <a href="#">Política de Privacidad</a></label>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-user-plus"></i> Crear cuenta
                </button>
            </form>

            <div class="login-link">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </div>
</div>
@endsection