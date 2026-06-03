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
    .bbn-login-wrap {
        min-height: 100vh;
        margin-top: 0;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    /* Nuevo video de fondo: sakura.mp4 */
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

    /* Contenedor principal con perspectiva de libro */
    .book-container {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        perspective: 1500px;
    }
    .book-card {
        position: relative;
        width: 100%;
        min-height: 620px;
        transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        transform-style: preserve-3d;
        border-radius: 32px;
    }
    .book-card.flipped {
        transform: rotateY(180deg);
    }
    /* Caras del libro */
    .page-front, .page-back {
        position: absolute;
        width: 100%;
        min-height: 620px;
        backface-visibility: hidden;
        border-radius: 32px;
        overflow: hidden;
        display: flex;
        flex-wrap: wrap;
        background: transparent;
        backdrop-filter: blur(2px);
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.4);
    }
    .page-front {
        transform: rotateY(0deg);
        --accent: #f0a6b5;  /* rosa sakura */
        --accent-light: #fbc4d0;
        --gradient-start: #2d1b36;
        --gradient-end: #4a2c5a;
    }
    .page-back {
        transform: rotateY(180deg);
        --accent: #b8d0e6;
        --accent-light: #d4e2f0;
        --gradient-start: #1e3a5f;
        --gradient-end: #2c5282;
    }
    /* Columnas internas */
    .page-left {
        width: 45%;
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(14px);
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-right: 1px solid rgba(255,255,255,0.2);
    }
    .page-back .page-left {
        background: rgba(15, 23, 42, 0.6);
    }
    .page-right {
        width: 55%;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(14px);
        padding: 48px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Register más pequeño y elegante */
    .page-back .page-left {
        padding: 32px 32px;
    }
    .page-back .page-right {
        padding: 32px 36px;
    }
    .page-back .hero-title {
        font-size: 2rem;
        margin-bottom: 0.8rem;
    }
    .page-back .hero-text {
        font-size: 0.85rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }
    .page-back .stats-row {
        margin-bottom: 1.5rem;
        padding: 0.8rem;
    }
    .page-back .stat-number {
        font-size: 1.5rem;
    }
    .page-back .stat-label {
        font-size: 0.65rem;
    }
    .page-back .quote-box {
        margin-bottom: 1.2rem;
        padding: 0.8rem;
    }
    .page-back .quote-text {
        font-size: 0.85rem;
    }
    .page-back .form-header {
        margin-bottom: 1.5rem;
    }
    .page-back .form-header h2 {
        font-size: 1.8rem;
    }
    .page-back .field {
        margin-bottom: 0.9rem;
    }
    .page-back .input-field {
        padding: 0.7rem 1rem;
        font-size: 0.85rem;
    }
    .page-back .btn-submit {
        padding: 0.7rem;
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }

    /* Login: campos más separados */
    .page-front .field {
        margin-bottom: 1.6rem;
    }
    .page-front .field-row {
        margin-bottom: 1.8rem;
    }
    .page-front .btn-submit {
        margin-bottom: 1.5rem;
    }
    .page-front .input-field {
        padding: 0.9rem 1rem;
    }

    /* Estilos elegantes compartidos */
    .hero-title {
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        line-height: 1.2;
        color: #fff;
        letter-spacing: -0.3px;
    }
    .hero-text {
        line-height: 1.6;
        color: rgba(255,255,255,0.85);
        font-weight: 400;
    }
    .stats-row {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        background: rgba(0,0,0,0.2);
        border-radius: 24px;
    }
    .stat-item {
        text-align: center;
        flex: 1;
    }
    .stat-number {
        display: block;
        font-weight: 700;
        color: var(--accent);
        line-height: 1.2;
        letter-spacing: -0.5px;
    }
    .stat-label {
        color: rgba(255,255,255,0.8);
        letter-spacing: 0.5px;
        margin-top: 4px;
        font-size: 0.7rem;
        font-weight: 500;
    }
    .quote-box {
        background: rgba(0,0,0,0.2);
        border-left: 3px solid var(--accent);
        border-radius: 16px;
    }
    .quote-text {
        font-family: 'Cormorant Garamond', serif;
        font-style: italic;
        color: #fff;
        margin: 0.6rem 0;
        font-weight: 400;
    }
    .quote-author {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.6);
        display: block;
        text-align: right;
        font-weight: 300;
    }
    .page-footer {
        font-size: 0.85rem;
        border-top: 1px solid rgba(255,255,255,0.2);
        padding-top: 1.2rem;
        color: rgba(255,255,255,0.7);
    }
    .page-footer a, .toggle-link-flip, .toggle-link-flip-back {
        color: var(--accent);
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.2s;
    }
    .page-footer a:hover {
        text-decoration: underline;
    }
    .form-tag {
        font-size: 0.7rem;
        color: var(--accent);
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .form-header h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #fff;
        margin: 0.3rem 0 0.2rem;
    }
    .form-header p {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.7);
    }
    .field label {
        display: block;
        font-size: 0.7rem;
        font-weight: 600;
        color: rgba(255,255,255,0.9);
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }
    .field label i {
        margin-right: 0.4rem;
        color: var(--accent);
        font-size: 0.8rem;
    }
    .input-field {
        width: 100%;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 16px;
        color: #fff;
        transition: all 0.2s;
        outline: none;
        font-size: 0.95rem;
    }
    .input-field:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(139,92,246,0.2);
        background: rgba(255,255,255,0.2);
    }
    .error-input {
        border-color: #fca5a5 !important;
    }
    .error-msg {
        font-size: 0.7rem;
        color: #fecaca;
        margin-top: 0.3rem;
        display: block;
    }
    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 0.8rem;
        color: rgba(255,255,255,0.85);
        cursor: pointer;
    }
    .checkbox-label input {
        accent-color: var(--accent);
        width: 16px;
        height: 16px;
    }
    .forgot-link {
        font-size: 0.8rem;
        color: var(--accent);
        text-decoration: none;
        font-weight: 500;
    }
    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
        color: #fff;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-weight: 600;
    }
    .btn-submit:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.2);
    }
    .divider {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin: 1rem 0;
        color: rgba(255,255,255,0.4);
        font-size: 0.7rem;
    }
    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: rgba(255,255,255,0.2);
    }
    .social-row {
        display: flex;
        gap: 0.8rem;
        margin-bottom: 1.2rem;
    }
    .btn-google, .btn-github {
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
    .btn-google {
        background: rgba(255,255,255,0.9);
        border: 1px solid rgba(255,255,255,0.5);
        color: #1f2937;
    }
    .btn-google:hover {
        background: #fff;
        transform: translateY(-1px);
    }
    .btn-github {
        background: rgba(31, 41, 55, 0.85);
        border: 1px solid rgba(255,255,255,0.3);
        color: #f3f4f6;
    }
    .btn-github:hover {
        background: #1f2937;
        transform: translateY(-1px);
    }
    .toggle-link {
        text-align: center;
        font-size: 0.8rem;
        color: rgba(255,255,255,0.7);
        margin-top: 1rem;
    }
    .toggle-link a {
        color: var(--accent);
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
    }
    .terms {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin: 0.8rem 0 1.2rem;
        font-size: 0.75rem;
        color: rgba(255,255,255,0.85);
    }
    .terms input {
        accent-color: var(--accent);
        width: 16px;
        height: 16px;
    }
    .error-box {
        background: rgba(254,242,242,0.15);
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
        .book-container {
            perspective: none;
        }
        .book-card {
            transform: none !important;
            transition: none;
            position: relative;
            min-height: auto;
        }
        .page-front, .page-back {
            position: relative;
            transform: none;
            backface-visibility: visible;
            display: flex;
            flex-direction: column;
            margin-bottom: 2rem;
        }
        .page-back {
            display: none;
        }
        .book-card.flipped .page-front {
            display: none;
        }
        .book-card.flipped .page-back {
            display: flex;
        }
        .page-left, .page-right {
            width: 100%;
            padding: 2rem;
        }
        .page-left {
            border-right: none;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .page-back .page-left,
        .page-back .page-right {
            padding: 2rem;
        }
    }
</style>

<!-- VIDEO DE FONDO: sakura.mp4 -->
<video class="bbn-video-bg" autoplay muted loop playsinline poster="{{ asset('images/login.png') }}">
    <source src="{{ asset('videos/sakura.mp4') }}" type="video/mp4">
</video>
<img class="bbn-fallback-img" src="{{ asset('images/login.png') }}" alt="Fondo">
<div class="bbn-overlay"></div>

<div class="bbn-login-wrap">
    <div class="book-container">
        <div class="book-card" id="bookCard">

            <!-- PÁGINA FRONTAL (LOGIN) - información lateral renovada (elegante) -->
            <div class="page-front">
                <div class="page-left">
                    <div>
                        <h1 class="hero-title">Donde el conocimiento florece</h1>
                        <p class="hero-text">Un espacio diseñado para cultivar el talento y la gestión educativa con herramientas que inspiran y simplifican cada proceso.</p>
                        <div class="stats-row">
                            <div class="stat-item">
                                <span class="stat-number">+1.200</span>
                                <span class="stat-label">MENTES BRILLANTES</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">+150</span>
                                <span class="stat-label">RUTAS DE APRENDIZAJE</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">99.9%</span>
                                <span class="stat-label">ARMONÍA OPERATIVA</span>
                            </div>
                        </div>
                        <div class="quote-box">
                            <i class="fas fa-quote-left"></i>
                            <p class="quote-text">La educación no es preparación para la vida; la educación es la vida misma.</p>
                            <span class="quote-author">— John Dewey</span>
                        </div>
                    </div>
                    <div class="page-footer">
                        ¿No tienes cuenta? <span class="toggle-link-flip" style="cursor:pointer;">Regístrate aquí</span>
                    </div>
                </div>
                <div class="page-right">
                    <div class="form-header">
                        <div class="form-tag">ACCESO AL SISTEMA</div>
                        <h2>Iniciar sesión</h2>
                        <p>Ingresa tus credenciales para continuar</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        @if(session('error'))
                            <div class="error-box">
                                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            </div>
                        @endif
                        <div class="field">
                            <label><i class="fas fa-envelope"></i> CORREO ELECTRÓNICO</label>
                            <input type="email" name="email" class="input-field @error('email') error-input @enderror" value="{{ old('email') }}" placeholder="usuario@correo.com" required autofocus>
                            @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                        <div class="field">
                            <label><i class="fas fa-lock"></i> CONTRASEÑA</label>
                            <input type="password" name="password" class="input-field @error('password') error-input @enderror" placeholder="••••••••" required>
                            @error('password') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                        <div class="field-row">
                            <label class="checkbox-label">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span>Recordarme</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="forgot-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                            @endif
                        </div>
                        <button type="submit" class="btn-submit"><i class="fas fa-sign-in-alt"></i> Entrar al sistema</button>
                        <div class="divider"><span>o continúa con</span></div>
                        <div class="social-row">
                            <a href="{{ url('/auth/google') }}" class="btn-google"><img src="https://www.google.com/favicon.ico" width="16"> Google</a>
                            <a href="{{ url('/auth/github/redirect') }}" class="btn-github"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.929.43.372.823 1.102.823 2.222 0 1.606-.015 2.896-.015 3.286 0 .322.216.694.825.576C20.565 21.795 24 17.295 24 12c0-6.63-5.37-12-12-12z"/></svg> GitHub</a>
                        </div>
                        <div class="toggle-link">¿No tienes cuenta? <a href="#" id="showRegisterLink">Crear cuenta</a></div>
                    </form>
                </div>
            </div>

            <!-- PÁGINA TRASERA (REGISTRO) - información lateral elegante y motivadora -->
            <div class="page-back">
                <div class="page-left">
                    <div>
                        <h1 class="hero-title">Comienza tu historia aquí</h1>
                        <p class="hero-text">Cada gran logro empieza con un primer paso. Únete a una comunidad que valora el conocimiento, la innovación y el crecimiento personal.</p>
                        <div class="stats-row">
                            <div class="stat-item">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">ACOMPAÑAMIENTO</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">+50</span>
                                <span class="stat-label">COMUNIDADES</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100%</span>
                                <span class="stat-label">PROTECCIÓN</span>
                            </div>
                        </div>
                        <div class="quote-box">
                            <i class="fas fa-feather-alt"></i>
                            <p class="quote-text">“El futuro pertenece a quienes creen en la belleza de sus sueños.”</p>
                            <span class="quote-author">— Eleanor Roosevelt</span>
                        </div>
                    </div>
                    <div class="page-footer">
                        ¿Ya tienes cuenta? <span class="toggle-link-flip-back" style="cursor:pointer;">Inicia sesión aquí</span>
                    </div>
                </div>
                <div class="page-right">
                    <div class="form-header">
                        <div class="form-tag">CREAR CUENTA</div>
                        <h2>Regístrate</h2>
                        <p>Completa tus datos para empezar</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        @if ($errors->any())
                            <div class="error-box">
                                <i class="fas fa-exclamation-circle"></i> Por favor corrige los errores.
                            </div>
                        @endif
                        <div class="field">
                            <label><i class="fas fa-user"></i> NOMBRE COMPLETO</label>
                            <input type="text" name="name" class="input-field @error('name') error-input @enderror" value="{{ old('name') }}" placeholder="Tu nombre" required>
                            @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                        <div class="field">
                            <label><i class="fas fa-envelope"></i> CORREO ELECTRÓNICO</label>
                            <input type="email" name="email" class="input-field @error('email') error-input @enderror" value="{{ old('email') }}" placeholder="usuario@correo.com" required>
                            @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                        <div class="field">
                            <label><i class="fas fa-lock"></i> CONTRASEÑA</label>
                            <input type="password" name="password" class="input-field @error('password') error-input @enderror" placeholder="••••••••" required>
                            @error('password') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                        <div class="field">
                            <label><i class="fas fa-check-circle"></i> CONFIRMAR CONTRASEÑA</label>
                            <input type="password" name="password_confirmation" class="input-field" placeholder="••••••••" required>
                        </div>
                        <div class="terms">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">Acepto los Términos y Política de Privacidad</label>
                        </div>
                        <button type="submit" class="btn-submit"><i class="fas fa-user-plus"></i> Crear cuenta</button>
                        <div class="toggle-link">¿Ya tienes cuenta? <a href="#" id="showLoginLink">Iniciar sesión</a></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const bookCard = document.getElementById('bookCard');
    const showRegisterLink = document.getElementById('showRegisterLink');
    const showLoginLink = document.getElementById('showLoginLink');
    const toggleLeft = document.querySelector('.toggle-link-flip');
    const toggleLeftBack = document.querySelector('.toggle-link-flip-back');

    function flipToRegister() {
        bookCard.classList.add('flipped');
        window.location.hash = 'register';
    }
    function flipToLogin() {
        bookCard.classList.remove('flipped');
        window.location.hash = '';
    }

    if (showRegisterLink) showRegisterLink.addEventListener('click', (e) => { e.preventDefault(); flipToRegister(); });
    if (showLoginLink) showLoginLink.addEventListener('click', (e) => { e.preventDefault(); flipToLogin(); });
    if (toggleLeft) toggleLeft.addEventListener('click', flipToRegister);
    if (toggleLeftBack) toggleLeftBack.addEventListener('click', flipToLogin);

    @if($errors->any())
        bookCard.classList.add('flipped');
    @endif

    if (window.location.hash === '#register') {
        bookCard.classList.add('flipped');
    }
</script>
@endsection