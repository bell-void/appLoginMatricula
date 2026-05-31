@extends('layouts.app')

@section('content')
<style>
    /* Ocultar la barra de navegación solo en esta página */
    .navbar {
        display: none !important;
    }
    body {
        padding-top: 0 !important;
    }
    .bbn-login-wrap {
        min-height: 100vh;
        margin-top: 0;
        position: relative;
        overflow: hidden;
    }
    /* Video de fondo */
    .bbn-video-bg {
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
    .bbn-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.55);
        z-index: -1;
        pointer-events: none;
    }
    /* Fallback de imagen (por si el video no carga) */
    .bbn-fallback-img {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -3;
        display: none;
    }
</style>

<!-- VIDEO DE FONDO (login.mp4) -->
<video class="bbn-video-bg" autoplay muted loop playsinline poster="{{ asset('images/login.png') }}">
    <source src="{{ asset('videos/login.mp4') }}" type="video/mp4">
    Tu navegador no soporta videos HTML5.
</video>
<!-- Imagen de respaldo -->
<img class="bbn-fallback-img" src="{{ asset('images/login.png') }}" alt="Fondo">

<div class="bbn-overlay"></div>

<div class="bbn-login-wrap">
    <div class="bbn-login-card">

        <!-- LADO IZQUIERDO – INFORMACIÓN (sin características) -->
        <div class="bbn-login-left">
            <div class="bbn-login-hero">
                <h1>Todo tu centro educativo<br>en un solo lugar</h1>
                <p>Optimiza la gestión académica con herramientas modernas para administrar alumnos, cursos, docentes y matrículas desde una interfaz intuitiva y segura.</p>
            </div>

            <div class="bbn-stats-row">
                <div class="bbn-stat-item">
                    <span class="bbn-stat-number">+1,200</span>
                    <span class="bbn-stat-label">ALUMNOS REGISTRADOS</span>
                </div>
                <div class="bbn-stat-item">
                    <span class="bbn-stat-number">+150</span>
                    <span class="bbn-stat-label">CURSOS ACTIVOS</span>
                </div>
                <div class="bbn-stat-item">
                    <span class="bbn-stat-number">99.9%</span>
                    <span class="bbn-stat-label">DISPONIBILIDAD</span>
                </div>
            </div>

            <!-- Bloque de características eliminado -->

            <div class="bbn-quote">
                <i class="fas fa-quote-left"></i>
                <p>La educación es el arma más poderosa que puedes usar para cambiar el mundo.</p>
                <span>— Nelson Mandela</span>
            </div>

            <div class="bbn-login-foot">
                ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
            </div>
        </div>

        <!-- LADO DERECHO – FORMULARIO DE LOGIN -->
        <div class="bbn-login-right">
            <div class="bbn-form-top">
                <span class="bbn-form-tag">ACCESO AL SISTEMA</span>
                <h2>Iniciar sesión</h2>
                <p>Ingresa tus credenciales para continuar</p>
            </div>

            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf

                @if(session('error'))
                <div class="bbn-alert-error">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
                @endif

                <div class="bbn-field">
                    <label for="email"><i class="fas fa-envelope"></i> CORREO ELECTRÓNICO</label>
                    <input id="email" type="email" name="email"
                        class="bbn-input @error('email') bbn-input-error @enderror"
                        placeholder="usuario@correo.com"
                        required autocomplete="off" autofocus>
                    @error('email')
                        <span class="bbn-error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="bbn-field">
                    <label for="password"><i class="fas fa-lock"></i> CONTRASEÑA</label>
                    <input id="password" type="password" name="password"
                        class="bbn-input @error('password') bbn-input-error @enderror"
                        placeholder="••••••••"
                        required autocomplete="off">
                    @error('password')
                        <span class="bbn-error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="bbn-field-row">
                    <label class="bbn-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Recordarme</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="bbn-forgot" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <button type="submit" class="bbn-btn-submit">
                    <i class="fas fa-sign-in-alt"></i> Entrar al sistema
                </button>

                <div class="bbn-divider"><span>o continúa con</span></div>

                <div class="bbn-social-row">
                    <a href="{{ url('/auth/google') }}" class="bbn-btn-google">
                        <img src="https://www.google.com/favicon.ico" width="16"> Google
                    </a>
                    <a href="{{ url('/auth/github/redirect') }}" class="bbn-btn-github">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.929.43.372.823 1.102.823 2.222 0 1.606-.015 2.896-.015 3.286 0 .322.216.694.825.576C20.565 21.795 24 17.295 24 12c0-6.63-5.37-12-12-12z"/>
                        </svg> GitHub
                    </a>
                </div>

                <p class="bbn-register-link">¿No tienes cuenta? <a href="{{ route('register') }}">Crear cuenta</a></p>
            </form>
        </div>

    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

/* ===== VIDEO FONDO ===== */
.bbn-video-bg {
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
.bbn-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.55);
    z-index: -1;
    pointer-events: none;
}
.bbn-fallback-img {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -3;
    display: none;
}

.bbn-login-wrap {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    font-family: 'Inter', sans-serif;
    position: relative;
    z-index: 1;
}

.bbn-login-card {
    display: flex;
    width: 100%;
    max-width: 1100px;
    min-height: 620px;
    border-radius: 32px;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.4);
    backdrop-filter: blur(2px);
}

/* ===== LADO IZQUIERDO ===== */
.bbn-login-left {
    width: 45%;
    background: rgba(30, 25, 70, 0.5);
    backdrop-filter: blur(14px);
    padding: 48px 40px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-right: 1px solid rgba(255,255,255,0.2);
}

.bbn-login-hero h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.4rem;
    font-weight: 600;
    line-height: 1.2;
    color: #fff;
    margin-bottom: 1rem;
    letter-spacing: -0.5px;
}
.bbn-login-hero p {
    font-size: 0.9rem;
    line-height: 1.6;
    color: rgba(255,255,255,0.85);
    margin-bottom: 2rem;
}

/* Estadísticas */
.bbn-stats-row {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 2rem;
    background: rgba(255,255,255,0.08);
    border-radius: 24px;
    padding: 1rem;
}
.bbn-stat-item {
    text-align: center;
    flex: 1;
}
.bbn-stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 700;
    color: #fff;
    line-height: 1.2;
}
.bbn-stat-label {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.7);
    letter-spacing: 1px;
    margin-top: 4px;
}

/* Cita */
.bbn-quote {
    background: rgba(255,255,255,0.05);
    border-left: 3px solid #d9c8ff;
    padding: 1rem;
    border-radius: 16px;
    margin-bottom: 1.8rem;
}
.bbn-quote i {
    color: #d9c8ff;
    font-size: 1.2rem;
    opacity: 0.6;
}
.bbn-quote p {
    font-family: 'Cormorant Garamond', serif;
    font-size: 0.95rem;
    font-style: italic;
    color: #fff;
    margin: 0.6rem 0;
}
.bbn-quote span {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.6);
    display: block;
    text-align: right;
}

.bbn-login-foot {
    font-size: 0.85rem;
    border-top: 1px solid rgba(255,255,255,0.2);
    padding-top: 1.2rem;
    color: rgba(255,255,255,0.7);
}
.bbn-login-foot a {
    color: #d9c8ff;
    font-weight: 500;
    text-decoration: none;
}
.bbn-login-foot a:hover { text-decoration: underline; }

/* ===== LADO DERECHO ===== */
.bbn-login-right {
    width: 55%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(14px);
    padding: 48px 44px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.bbn-form-top {
    margin-bottom: 2rem;
}
.bbn-form-tag {
    font-size: 0.7rem;
    color: #d9c8ff;
    font-weight: 600;
    letter-spacing: 2px;
}
.bbn-form-top h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #fff;
    margin: 0.3rem 0 0.2rem;
}
.bbn-form-top p {
    font-size: 0.85rem;
    color: rgba(255,255,255,0.7);
}

.bbn-alert-error {
    background: rgba(254,242,242,0.9);
    border: 1px solid #fecaca;
    color: #dc2626;
    border-radius: 12px;
    padding: 0.6rem 1rem;
    font-size: 0.75rem;
    margin-bottom: 1.2rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.bbn-field {
    margin-bottom: 1.2rem;
}
.bbn-field label {
    display: block;
    font-size: 0.7rem;
    font-weight: 600;
    color: rgba(255,255,255,0.9);
    letter-spacing: 1px;
    margin-bottom: 0.4rem;
}
.bbn-field label i {
    margin-right: 0.3rem;
    color: #d9c8ff;
}
.bbn-input {
    width: 100%;
    background: rgba(255,255,255,0.2);
    border: 1.5px solid rgba(255,255,255,0.3);
    border-radius: 14px;
    padding: 0.8rem 1rem;
    font-size: 0.9rem;
    color: #fff;
    transition: all 0.2s;
    outline: none;
}
.bbn-input::placeholder {
    color: rgba(255,255,255,0.5);
}
.bbn-input:focus {
    border-color: #d9c8ff;
    box-shadow: 0 0 0 3px rgba(217,200,255,0.2);
    background: rgba(255,255,255,0.3);
}
.bbn-input-error {
    border-color: #fca5a5 !important;
}
.bbn-error-msg {
    font-size: 0.7rem;
    color: #fecaca;
    margin-top: 0.3rem;
    display: block;
}
.bbn-field-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}
.bbn-check {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.85);
    cursor: pointer;
}
.bbn-check input {
    accent-color: #d9c8ff;
}
.bbn-forgot {
    font-size: 0.8rem;
    color: #d9c8ff;
    text-decoration: none;
    font-weight: 500;
}
.bbn-btn-submit {
    width: 100%;
    background: linear-gradient(135deg, #6c63b0, #8b79c2);
    color: #fff;
    border: none;
    border-radius: 40px;
    padding: 0.85rem;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 1.2rem;
}
.bbn-btn-submit:hover {
    opacity: 0.9;
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.2);
}
.bbn-divider {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    color: rgba(255,255,255,0.5);
    font-size: 0.7rem;
}
.bbn-divider::before,
.bbn-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(255,255,255,0.3);
}
.bbn-social-row {
    display: flex;
    gap: 0.8rem;
    margin-bottom: 1rem;
}
.bbn-btn-google,
.bbn-btn-github {
    flex: 1;
    padding: 0.7rem;
    border-radius: 40px;
    font-size: 0.8rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
    transition: all 0.2s;
}
.bbn-btn-google {
    background: rgba(255,255,255,0.9);
    border: 1px solid rgba(255,255,255,0.5);
    color: #374151;
}
.bbn-btn-google:hover {
    background: #fff;
    transform: translateY(-1px);
}
.bbn-btn-github {
    background: rgba(31, 41, 55, 0.85);
    border: 1px solid rgba(255,255,255,0.3);
    color: #fff;
}
.bbn-btn-github:hover {
    background: #1f2937;
    transform: translateY(-1px);
}
.bbn-register-link {
    text-align: center;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.7);
    margin-top: 0.5rem;
}
.bbn-register-link a {
    color: #d9c8ff;
    font-weight: 500;
    text-decoration: none;
}

/* Responsive */
@media (max-width: 850px) {
    .bbn-login-card {
        flex-direction: column;
        max-width: 550px;
    }
    .bbn-login-left,
    .bbn-login-right {
        width: 100%;
        padding: 2rem;
    }
    .bbn-login-left {
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }
    .bbn-stats-row {
        flex-wrap: wrap;
        justify-content: center;
    }
    .bbn-stat-item {
        min-width: 100px;
    }
    .bbn-login-hero h1 {
        font-size: 2rem;
    }
}
@media (max-width: 480px) {
    .bbn-login-left, .bbn-login-right {
        padding: 1.5rem;
    }
    .bbn-stat-number {
        font-size: 1.5rem;
    }
}
</style>
@endsection