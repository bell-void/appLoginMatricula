<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Blue Butterfly | Matrícula Académica</title>
    <meta name="description" content="Blue Butterfly – Sistema de gestión educativa con diseño moderno y matrícula online.">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500;9..144,600;9..144,700;9..144,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #111827;
            line-height: 1.5;
            scroll-behavior: smooth;
            font-size: 18px;
        }

        :root {
            --primary: #8b5cf6;
            --primary-light: #a78bfa;
            --primary-soft: #c4b5fd;
            --primary-bg: #f5f3ff;
            --text-dark: #111827;
            --text-muted: #4b5563;
            --border-light: #e9d5ff;
            --black: #000000;
        }

        .section-padding {
            padding: 6rem 2rem;
        }

        .section-title {
            font-family: 'Fraunces', serif;
            font-size: 3rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #111827 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-sub {
            font-size: 1.2rem;
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto 3rem auto;
        }

        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-light);
            padding: 0 2rem;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo-placeholder {
            width: 100px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 0 auto;
        }

        .nav-link {
            padding: 0.6rem 1.2rem;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 2rem;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background: var(--primary-bg);
            color: var(--primary);
        }

        .btn-outline {
            border: 1.5px solid var(--black);
            padding: 0.6rem 1.5rem;
            border-radius: 3rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--black);
            background: transparent;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-outline:hover {
            background: var(--black);
            color: white;
            border-color: var(--black);
        }

        .btn-primary-black {
            background: var(--black);
            padding: 0.6rem 1.8rem;
            border-radius: 3rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.25s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .btn-primary-black:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px -8px rgba(0,0,0,0.3);
            background: #1a1a1a;
        }

        .btn-primary {
            background: linear-gradient(105deg, var(--primary), var(--primary-light));
            padding: 0.6rem 1.8rem;
            border-radius: 3rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.25s;
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px -8px rgba(139, 92, 246, 0.4);
        }

        /* ===== HERO con borde redondeado ===== */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            padding: 5rem 2rem 6rem;
            flex-wrap: wrap;
            background: linear-gradient(135deg, #1a1a1a 0%, #2a1a3a 100%);
            isolation: isolate;
            border-radius: 2rem;
            margin: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
        }

        .hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('{{ asset("images/hero.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.35;
            z-index: 1;
            pointer-events: none;
            border-radius: 2rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2;
            border-radius: 2rem;
        }

        .hero-left, .hero-right {
            position: relative;
            z-index: 3;
        }

        .hero-left {
            flex: 1.2;
            max-width: 600px;
            margin-left: 5%;
            color: white;
        }

        .hero-left h1 {
            font-family: 'Fraunces', serif;
            font-size: 3.8rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
        }

        .hero-left p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-bottom: 2.5rem;
        }

        .hero .btn-primary {
            background: white;
            color: #8b5cf6;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            border: none;
        }
        .hero .btn-primary:hover {
            background: #f0f0f0;
            transform: translateY(-3px);
        }
        .hero .btn-outline {
            border-color: #c4b5fd;
            color: #c4b5fd;
            background: transparent;
        }
        .hero .btn-outline:hover {
            background: #8b5cf6;
            color: white;
            border-color: #8b5cf6;
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            padding-top: 2rem;
        }

        .hero-stats div span {
            display: block;
            font-weight: 800;
            font-size: 1.8rem;
            color: white;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .hero-stats div small {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .hero-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 2%;
        }

        .giant-name {
            font-family: 'Fraunces', serif;
            font-size: 7rem;
            font-weight: 800;
            line-height: 1.1;
            text-align: left;
            background: linear-gradient(135deg, #ffffff, #c4b5fd);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: none;
            letter-spacing: -0.03em;
        }

        /* Beneficios (sin cambios) */
        .benefits-section {
            background: white;
        }
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .benefit-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            border: 1px solid var(--border-light);
            transition: all 0.3s;
        }
        .benefit-card:hover {
            transform: translateY(-6px);
            border-color: var(--primary-light);
            box-shadow: 0 20px 30px -12px rgba(139, 92, 246, 0.15);
        }
        .benefit-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        .benefit-card h3 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #111827;
        }
        .benefit-card li {
            margin: 0.8rem 0;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: #374151;
        }
        .benefit-card li i {
            color: var(--primary);
            width: 24px;
        }

        /* Timeline */
        .timeline-section {
            background: var(--primary-bg);
        }
        .timeline {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 28px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--primary), var(--primary-soft));
        }
        .timeline-item {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        .timeline-icon {
            width: 56px;
            height: 56px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
            box-shadow: 0 8px 20px rgba(139,92,246,0.15);
            border: 1px solid var(--border-light);
            z-index: 2;
        }
        .timeline-content {
            background: white;
            padding: 1rem 1.8rem;
            border-radius: 1.2rem;
            flex: 1;
            color: #374151;
        }
        .timeline-content strong {
            font-size: 1.2rem;
            display: block;
            margin-bottom: 0.3rem;
            color: #111827;
        }

        /* Módulos */
        .features-section {
            background: white;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.8rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .feature-card {
            background: white;
            border-radius: 1.5rem;
            padding: 1.8rem;
            border: 1px solid var(--border-light);
            transition: all 0.2s;
            text-decoration: none;
            display: block;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-light);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-bg);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 1.2rem;
        }
        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #111827;
        }
        .feature-desc {
            font-size: 0.95rem;
            color: var(--text-muted);
        }

        /* ===== BLOG con fondo retro.png y diseño simple blanco/negro ===== */
        .blog-section {
            position: relative;
            background-image: url('{{ asset("images/retro.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            isolation: isolate;
            border-radius: 2rem;
            margin: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .blog-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 2rem;
            z-index: 1;
        }

        .blog-section > * {
            position: relative;
            z-index: 2;
        }

        .blog-section .section-title {
            color: white;
            background: none;
            -webkit-background-clip: unset;
            background-clip: unset;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            margin-bottom: 0.5rem;
        }

        .blog-section .section-sub {
            color: rgba(255, 255, 255, 0.85);
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }

        /* Tarjetas simples: fondo blanco, texto negro/gris, sin morado */
        .blog-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        }

        .blog-img {
            height: 180px;
            background: #e5e7eb;  /* gris claro */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.8rem;
            color: #4b5563;
        }

        .blog-content {
            padding: 1.5rem;
        }

        .blog-content h4 {
            color: #111827;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .blog-content p {
            color: #4b5563;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .blog-content a {
            color: #000000;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .blog-content a:hover {
            color: #4b5563;
            text-decoration: underline;
        }

        /* Contacto */
        .contact-section {
            background: white;
            padding: 5rem 2rem;
        }
        .contact-grid {
            display: flex;
            gap: 3rem;
            flex-wrap: wrap;
            max-width: 1100px;
            margin: 0 auto;
        }
        .contact-form {
            flex: 1;
            min-width: 280px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
            border: 1px solid var(--border-light);
            border-radius: 1rem;
            font-size: 1rem;
            font-family: inherit;
        }
        .contact-form input:focus, .contact-form textarea:focus {
            outline: none;
            border-color: var(--primary);
        }
        .contact-info {
            flex: 1;
            min-width: 280px;
        }
        .contact-info p {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: #374151;
        }
        .contact-info i {
            width: 28px;
            color: var(--primary);
            font-size: 1.2rem;
        }
        .map-container {
            border-radius: 1rem;
            overflow: hidden;
            margin-top: 1.5rem;
            border: 1px solid var(--border-light);
            height: 220px;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .faq-section {
            background: var(--primary-bg);
        }
        .faq-grid {
            max-width: 900px;
            margin: 0 auto;
        }
        .faq-item {
            border-bottom: 1px solid var(--border-light);
            padding: 1rem 0;
        }
        .faq-question {
            font-weight: 700;
            font-size: 1.2rem;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            padding: 0.5rem 0;
            color: #111827;
        }
        .faq-question i {
            color: var(--primary);
        }
        .faq-answer {
            color: var(--text-muted);
            padding-bottom: 1rem;
            display: none;
            line-height: 1.6;
        }
        .faq-answer.show {
            display: block;
        }

        .footer {
            background: #111827;
            padding: 3rem 2rem 2rem;
            color: white;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }
        .footer-col h4 {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: #c4b5fd;
        }
        .footer-col a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 0.6rem;
        }
        .footer-col a:hover {
            color: var(--primary-light);
        }
        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid #2e2a5c;
            font-size: 0.8rem;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 3rem 1rem;
                margin: 0.5rem;
            }
            .hero-left {
                margin-left: 0;
                text-align: center;
            }
            .hero-right {
                margin-right: 0;
                justify-content: center;
            }
            .giant-name {
                font-size: 3.5rem;
                text-align: center;
            }
            .hero-left h1 {
                font-size: 2.5rem;
            }
            .hero-stats {
                justify-content: center;
            }
            .section-title {
                font-size: 2.2rem;
            }
            .navbar-custom {
                padding: 0 1rem;
            }
            .nav-links {
                gap: 0.2rem;
            }
            .nav-link {
                padding: 0.4rem 0.8rem;
                font-size: 0.85rem;
            }
            .contact-grid {
                flex-direction: column;
            }
            .blog-section {
                margin: 1rem;
            }
            .blog-grid {
                padding: 0 1rem 2rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar-custom">
    <div class="logo-placeholder"></div>
    <div class="nav-links">
        <a href="#beneficios" class="nav-link">Beneficios</a>
        <a href="#funciona" class="nav-link">Cómo funciona</a>
        <a href="#modulos" class="nav-link">Módulos</a>
        <a href="#contacto" class="nav-link">Contacto</a>
        <a href="#faq" class="nav-link">FAQ</a>
    </div>
    <div class="nav-buttons">
        <a href="{{ route('login') }}" class="btn-outline">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn-primary-black"><i class="fas fa-user-plus"></i> Crear cuenta</a>
    </div>
</nav>

<!-- HERO con bordes redondeados -->
<section class="hero">
    <div class="hero-left">
        <h1>La forma más inteligente de gestionar tu institución educativa</h1>
        <p>Automatiza matrículas, organiza cursos, controla horarios y obtén reportes en tiempo real. Miles de instituciones ya confían en Blue Butterfly.</p>
        <div class="hero-buttons">
            <a href="{{ route('register') }}" class="btn-primary">Comenzar gratis <i class="fas fa-arrow-right"></i></a>
            <a href="#" class="btn-outline" onclick="abrirModalDemo(); return false;">Ver demo <i class="fas fa-play"></i></a>
        </div>
        <div class="hero-stats">
            <div><span>+50</span> <small>instituciones</small></div>
            <div><span>98%</span> <small>satisfacción</small></div>
            <div><span>24/7</span> <small>soporte</small></div>
        </div>
    </div>
    <div class="hero-right">
        <div class="giant-name">Blue<br>Butterfly</div>
    </div>
</section>

<!-- BENEFICIOS -->
<section id="beneficios" class="benefits-section section-padding">
    <div style="text-align:center;">
        <h2 class="section-title">Una experiencia diseñada para todos</h2>
        <p class="section-sub">Blue Butterfly se adapta a cada miembro de tu comunidad educativa.</p>
    </div>
    <div class="benefits-grid">
        <div class="benefit-card">
            <div class="benefit-icon"><i class="fas fa-user-graduate"></i></div>
            <h3>Para alumnos</h3>
            <ul>
                <li><i class="fas fa-calendar-alt"></i> Horarios y notas en un solo lugar</li>
                <li><i class="fas fa-laptop"></i> Matrícula online</li>
                <li><i class="fas fa-bell"></i> Notificaciones académicas</li>
            </ul>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon"><i class="fas fa-chalkboard-user"></i></div>
            <h3>Para docentes</h3>
            <ul>
                <li><i class="fas fa-pen-fancy"></i> Calificaciones ágiles</li>
                <li><i class="fas fa-list"></i> Listas de alumnos por curso</li>
                <li><i class="fas fa-chart-simple"></i> Reportes de rendimiento</li>
            </ul>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon"><i class="fas fa-building"></i></div>
            <h3>Para administradores</h3>
            <ul>
                <li><i class="fas fa-credit-card"></i> Control de pagos</li>
                <li><i class="fas fa-clock"></i> Gestión de horarios y aulas</li>
                <li><i class="fas fa-chart-line"></i> Estadísticas y exportación</li>
            </ul>
        </div>
    </div>
</section>

<!-- CÓMO FUNCIONA -->
<section id="funciona" class="timeline-section section-padding">
    <div style="text-align:center;">
        <h2 class="section-title">Empieza en 3 pasos</h2>
        <p class="section-sub">Configuración rápida y sencilla.</p>
    </div>
    <div class="timeline">
        <div class="timeline-item">
            <div class="timeline-icon"><i class="fas fa-user-plus"></i></div>
            <div class="timeline-content"><strong>1. Crea tu cuenta</strong> Regístrate gratis y configura tu institución.</div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"><i class="fas fa-database"></i></div>
            <div class="timeline-content"><strong>2. Configura tus datos</strong> Añade alumnos, cursos, docentes y horarios.</div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"><i class="fas fa-file-signature"></i></div>
            <div class="timeline-content"><strong>3. Gestiona matrículas</strong> Inscribe alumnos y genera reportes.</div>
        </div>
    </div>
</section>

<!-- MÓDULOS -->
<section id="modulos" class="features-section section-padding">
    <div style="text-align:center;">
        <h2 class="section-title">Todo lo que tu institución necesita</h2>
        <p class="section-sub">Módulos integrados para una gestión completa.</p>
    </div>
    <div class="features-grid">
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-user-graduate"></i></div><div class="feature-title">Gestión de Alumnos</div><div class="feature-desc">Registra y consulta el historial completo.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-book-open"></i></div><div class="feature-title">Catálogo de Cursos</div><div class="feature-desc">Administra cursos, créditos y descripciones.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-id-card"></i></div><div class="feature-title">Proceso de Matrícula</div><div class="feature-desc">Matricula alumnos con control de horarios.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-chalkboard-user"></i></div><div class="feature-title">Docentes</div><div class="feature-desc">Registro por especialidad y asignación.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-calendar-week"></i></div><div class="feature-title">Horarios Académicos</div><div class="feature-desc">Configura días, horas y aulas sin cruces.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-door-open"></i></div><div class="feature-title">Aulas</div><div class="feature-desc">Gestiona espacios físicos y disponibilidad.</div></a>
    </div>
</section>

<!-- BLOG con fondo retro.png y tarjetas simples (blanco/negro) -->
<section class="blog-section section-padding">
    <div style="text-align:center;">
        <h2 class="section-title">Recursos para tu institución</h2>
        <p class="section-sub">Artículos y guías del sector educativo.</p>
    </div>
    <div class="blog-grid">
        <div class="blog-card">
            <div class="blog-img"><i class="fas fa-chalkboard"></i></div>
            <div class="blog-content">
                <h4>Cómo reducir la deserción escolar</h4>
                <p>Estrategias prácticas con datos académicos.</p>
                <a href="https://larepublica.pe/educacion/2025/02/05/desercion-escolar-el-reto-que-afecta-a-la-juventud-y-limita-sus-oportunidades-en-el-mercado-laboral-como-combatirlo-atmpa-391915/" target="_blank">Leer más →</a>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img"><i class="fas fa-laptop-code"></i></div>
            <div class="blog-content">
                <h4>Implementa tu sistema en 1 semana</h4>
                <p>Pasos para migrar tu institución rápidamente.</p>
                <a href="https://www.gob.pe/82034-impacto-de-la-innovacion-digital-en-el-acceso-a-la-educacion-en-el-peru" target="_blank">Leer más →</a>
            </div>
        </div>
        <div class="blog-card">
            <div class="blog-img"><i class="fas fa-chart-line"></i></div>
            <div class="blog-content">
                <h4>5 indicadores clave para directivos</h4>
                <p>Métricas para una gestión educativa exitosa.</p>
                <a href="https://www.gob.pe/institucion/minedu/noticias/1226128-gobierno-impulsa-transformacion-digital-que-beneficia-a-mas-de-4-6-millones-de-estudiantes" target="_blank">Leer más →</a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACTO -->
<section id="contacto" class="contact-section">
    <div style="text-align:center; margin-bottom:3rem;">
        <div style="display:inline-block; background:#f3e8ff; padding:0.2rem 1rem; border-radius:2rem; font-size:0.8rem; color:var(--primary);">Contáctanos</div>
        <h2 class="section-title" style="margin-top:0.5rem;">¿Necesitas más información?</h2>
        <p class="section-sub">Estamos aquí para ayudarte.</p>
    </div>
    <div class="contact-grid">
        <div class="contact-form">
            <form action="#" method="POST">
                @csrf
                <input type="text" class="form-control" placeholder="Nombre completo" required>
                <input type="email" class="form-control" placeholder="Correo electrónico" required>
                <textarea class="form-control" rows="4" placeholder="Mensaje" required></textarea>
                <button type="submit" class="btn-primary" style="border:none; cursor:pointer;">Enviar mensaje <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
        <div class="contact-info">
            <p><i class="fas fa-envelope"></i> soporte.bluebutterfly@gmail.com</p>
            <p><i class="fas fa-phone-alt"></i> +51 1 234 5678</p>
            <p><i class="fas fa-map-marker-alt"></i> Av. Principal 123, Lima, Perú</p>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.6431376191754!2d-77.06416518843093!3d-11.999176640969388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ce568c042771%3A0x6072f46c2b26e80!2sSENATI%20Sede%20Principal!5e0!3m2!1ses-419!2spe!4v1780272662053!5m2!1ses-419!2spe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section id="faq" class="faq-section section-padding">
    <div style="text-align:center;">
        <h2 class="section-title">Preguntas frecuentes</h2>
        <p class="section-sub">Resolvemos tus dudas.</p>
    </div>
    <div class="faq-grid">
        <div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">¿Es gratuito? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">Sí, ofrecemos un plan gratuito con funcionalidades básicas para hasta 100 alumnos, gestión de cursos y matrículas. Luego puedes escalar según tus necesidades.</div></div>
        <div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">¿Necesito conocimientos técnicos? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">No, el sistema es intuitivo y diseñado para cualquier usuario. Además contamos con tutoriales y soporte personalizado.</div></div>
        <div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">¿Puedo migrar mis datos actuales? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">Sí, ofrecemos asistencia para migrar desde Excel, CSV u otros sistemas educativos sin costo durante el primer mes.</div></div>
        <div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)">¿Qué soporte técnico ofrecen? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">Soporte por chat, correo y teléfono en horario laboral, con respuesta en menos de 2 horas.</div></div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-grid">
        <div class="footer-col"><h4>Producto</h4><a href="#">Características</a><a href="#">Precios</a><a href="#">Demo</a></div>
        <div class="footer-col"><h4>Recursos</h4><a href="#">Blog</a><a href="#">Documentación</a><a href="#">Soporte</a></div>
        <div class="footer-col"><h4>Compañía</h4><a href="#">Acerca de</a><a href="#">Equipo</a><a href="#">Contacto</a></div>
        <div class="footer-col"><h4>Legal</h4><a href="#">Privacidad</a><a href="#">Términos</a><div class="footer-social"><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fab fa-instagram"></i></a></div></div>
    </div>
    <div class="footer-bottom">© {{ date('Y') }} Blue Butterfly Network — Sistema de Matrícula Académica. contacto: soporte.bluebutterfly@gmail.com</div>
</footer>

<script>
    function toggleFaq(element) {
        let answer = element.nextElementSibling;
        answer.classList.toggle('show');
        let icon = element.querySelector('i');
        if (answer.classList.contains('show')) {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        } else {
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }

    document.querySelectorAll('.nav-link').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    });

    function abrirModalDemo() {
        const modalHtml = `
            <div id="modalDemo" style="position:fixed; inset:0; background:rgba(0,0,0,0.8); backdrop-filter:blur(8px); z-index:9999; display:flex; align-items:center; justify-content:center; padding:1rem;">
                <div style="background:white; border-radius:2rem; max-width:800px; width:100%; overflow:hidden; box-shadow:0 40px 60px -20px black;">
                    <div style="padding:1.5rem; border-bottom:1px solid #e9d5ff; display:flex; justify-content:space-between; align-items:center;">
                        <h3 style="margin:0; font-size:1.4rem; font-weight:700;">Vista previa del Dashboard</h3>
                        <button onclick="cerrarModalDemo()" style="background:none; border:none; font-size:2rem; cursor:pointer;">&times;</button>
                    </div>
                    <div style="position:relative; overflow:hidden;">
                        <div id="slides" style="display:flex; transition:transform 0.4s ease;">
                            <div style="min-width:100%; padding:2rem; text-align:center; background:#f8fafc;">
                                <img src="{{ asset('imagenes/demo/slide1.PNG') }}" alt="Dashboard 1" style="width:100%; border-radius:1rem; border:1px solid #e9d5ff;">
                                <p style="margin-top:1rem;">Panel principal</p>
                            </div>
                            <div style="min-width:100%; padding:2rem; text-align:center; background:#f8fafc;">
                                <img src="{{ asset('imagenes/demo/slide2.PNG') }}" alt="Dashboard 2" style="width:100%; border-radius:1rem; border:1px solid #e9d5ff;">
                                <p style="margin-top:1rem;">Gestión de cursos</p>
                            </div>
                            <div style="min-width:100%; padding:2rem; text-align:center; background:#f8fafc;">
                                <img src="{{ asset('imagenes/demo/slide3.PNG') }}" alt="Dashboard 3" style="width:100%; border-radius:1rem; border:1px solid #e9d5ff;">
                                <p style="margin-top:1rem;">Administración de aulas</p>
                            </div>
                        </div>
                        <button onclick="moverSlide(-1)" style="position:absolute; left:0.5rem; top:50%; transform:translateY(-50%); background:white; border:1px solid #cbd5e1; border-radius:50%; width:40px; height:40px; cursor:pointer;">‹</button>
                        <button onclick="moverSlide(1)" style="position:absolute; right:0.5rem; top:50%; transform:translateY(-50%); background:white; border:1px solid #cbd5e1; border-radius:50%; width:40px; height:40px; cursor:pointer;">›</button>
                    </div>
                    <div id="dots" style="display:flex; justify-content:center; gap:10px; padding:1rem 0;"></div>
                    <div style="padding:0 1.5rem 1.8rem; text-align:center;">
                        <a href="{{ route('register') }}" class="btn-primary" style="display:inline-block;">Comenzar ahora →</a>
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', modalHtml);
        let slideActual = 0;
        const totalSlides = 3;
        function actualizarCarrusel() {
            const slides = document.getElementById('slides');
            if (slides) slides.style.transform = `translateX(-${slideActual * 100}%)`;
            const dotsContainer = document.getElementById('dots');
            if (dotsContainer) {
                dotsContainer.innerHTML = '';
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('span');
                    dot.style.width = '10px';
                    dot.style.height = '10px';
                    dot.style.borderRadius = '50%';
                    dot.style.background = i === slideActual ? '#8b5cf6' : '#cbd5e1';
                    dot.style.cursor = 'pointer';
                    dot.style.margin = '0 4px';
                    dot.onclick = () => { slideActual = i; actualizarCarrusel(); };
                    dotsContainer.appendChild(dot);
                }
            }
        }
        window.moverSlide = function(dir) {
            slideActual = (slideActual + dir + totalSlides) % totalSlides;
            actualizarCarrusel();
        };
        window.cerrarModalDemo = function() {
            const modal = document.getElementById('modalDemo');
            if (modal) modal.remove();
        };
        actualizarCarrusel();
        document.getElementById('modalDemo').addEventListener('click', function(e) {
            if (e.target === this) cerrarModalDemo();
        });
    }
</script>
</body>
</html>