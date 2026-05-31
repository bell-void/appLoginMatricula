<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Butterfly | Sistema de Matrícula Académica</title>
    <meta name="description" content="Blue Butterfly – Automatiza la gestión de alumnos, cursos, matrículas y docentes con un sistema moderno y eficiente.">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #1e293b;
            line-height: 1.5;
            scroll-behavior: smooth;
        }

        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #eef2ff;
            padding: 0 2rem;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo-text {
            font-family: 'Fraunces', serif;
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #0f172a 30%, #4f46e5 70%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
        }

        .logo-text span {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #475569;
            text-decoration: none;
            border-radius: 2rem;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background: #f1f5f9;
            color: #4f46e5;
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-outline {
            border: 1.5px solid #e2e8f0;
            padding: 0.5rem 1.25rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: #1e293b;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            border-color: #7c3aed;
            color: #7c3aed;
            background: #faf5ff;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            padding: 0.5rem 1.5rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .btn-primary:hover {
            opacity: 0.92;
            transform: translateY(-1px);
            box-shadow: 0 8px 16px -8px rgba(79,70,229,0.4);
        }

        .btn-primary-lg {
            padding: 0.8rem 2rem;
            font-size: 1rem;
        }

        /* ===== HERO ===== */
        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 3rem;
            padding: 4rem 2rem;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            flex-wrap: wrap;
        }
        .hero-content {
            flex: 1.2;
            max-width: 600px;
        }
        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(79,70,229,0.08);
            border: 1px solid rgba(79,70,229,0.15);
            color: #4f46e5;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 1rem;
            border-radius: 2rem;
            margin-bottom: 1.5rem;
        }
        .hero-title {
            font-family: 'Fraunces', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -1.5px;
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        .hero-title span {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .hero-sub {
            font-size: 1rem;
            color: #475569;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        .hero-stats {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            border-top: 1px solid #eef2ff;
            padding-top: 1.5rem;
        }
        .hero-stat span {
            display: block;
            font-weight: 800;
            font-size: 1.2rem;
            color: #0f172a;
        }
        .mockup-card {
            background: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.15);
            overflow: hidden;
            border: 1px solid #eef2ff;
            width: 100%;
            max-width: 500px;
        }
        .mockup-header {
            background: #f1f5f9;
            padding: 0.8rem;
            display: flex;
            gap: 0.5rem;
        }
        .mockup-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #cbd5e1;
        }
        .mockup-content {
            padding: 1.5rem;
            background: white;
        }
        .mockup-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        /* Stats con animación */
        .stats-row {
            background: white;
            border-top: 1px solid #eef2ff;
            border-bottom: 1px solid #eef2ff;
            padding: 2.5rem 2rem;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 3rem;
        }
        .stat-card {
            text-align: center;
            min-width: 160px;
        }
        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e293b, #4f46e5);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
            line-height: 1;
        }
        .stat-label {
            font-size: 0.8rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 0.5rem;
        }

        /* Beneficios */
        .benefits-section {
            padding: 5rem 2rem;
            background: #f8fafc;
        }
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }
        .benefit-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            border: 1px solid #eef2ff;
            transition: transform 0.2s;
        }
        .benefit-card:hover {
            transform: translateY(-4px);
        }
        .benefit-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #4f46e5;
        }
        .benefit-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .benefit-card ul {
            list-style: none;
            padding: 0;
        }
        .benefit-card li {
            margin: 0.8rem 0;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.9rem;
            color: #475569;
        }
        .benefit-card li i {
            width: 20px;
            color: #4f46e5;
        }

        /* Timeline (nuevo) */
        .timeline-section {
            padding: 5rem 2rem;
            background: white;
        }
        .timeline {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e2e8f0;
        }
        .timeline-item {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
        }
        .timeline-icon {
            width: 40px;
            height: 40px;
            background: #eef2ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4f46e5;
            z-index: 2;
        }
        .timeline-content {
            flex: 1;
            background: #f8fafc;
            padding: 1rem 1.5rem;
            border-radius: 1rem;
        }

        /* Módulos */
        .features-section {
            padding: 5rem 2rem;
            background: #ffffff;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }
        .feature-card {
            background: #ffffff;
            border-radius: 1.5rem;
            padding: 1.8rem;
            border: 1px solid #eef2ff;
            transition: all 0.25s;
            text-decoration: none;
            display: block;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #cbd5e1;
            box-shadow: 0 20px 30px -12px rgba(0,0,0,0.08);
        }
        .feature-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            font-size: 1.8rem;
            color: #4f46e5;
        }
        .feature-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .feature-desc {
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.5;
        }

        /* Noticias / Blog */
        .blog-section {
            background: #f8fafc;
            padding: 5rem 2rem;
        }
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }
        .blog-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            border: 1px solid #eef2ff;
        }
        .blog-img {
            height: 160px;
            background: linear-gradient(135deg, #d9e2ef, #cbd5e1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #4f46e5;
        }
        .blog-content {
            padding: 1.5rem;
        }

        /* Contacto */
        .contact-section {
            padding: 5rem 2rem;
            background: white;
        }
        .contact-grid {
            display: flex;
            gap: 3rem;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 0 auto;
        }
        .contact-form {
            flex: 1;
        }
        .contact-info {
            flex: 1;
        }

        /* Footer igual */
        .footer {
            background: #0f172a;
            padding: 3rem 2rem 2rem;
            border-top: 1px solid #1e293b;
        }
        /* ... resto de estilos existentes y responsivos ... */
        @media (max-width: 768px) {
            .navbar-custom {
                padding: 0 1rem;
            }
            .nav-links {
                display: none;
            }
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-section {
                flex-direction: column;
                text-align: center;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar-custom">
    <a href="/" class="logo-text">Blue <span>Butterfly</span></a>
    <div class="nav-links">
        <a href="#beneficios" class="nav-link">Beneficios</a>
        <a href="#funciona" class="nav-link">Cómo funciona</a>
        <a href="#modulos" class="nav-link">Módulos</a>
        <a href="#faq" class="nav-link">FAQ</a>
        <a href="#contacto" class="nav-link">Contacto</a>
    </div>
    <div class="nav-buttons">
        <a href="{{ route('login') }}" class="btn-outline">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn-primary"><i class="fas fa-user-plus"></i> Crear cuenta</a>
    </div>
</nav>

<!-- HERO -->
<section class="hero-section">
    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-graduation-cap"></i> Sistema de Matrícula Académica
        </div>
        <h1 class="hero-title">
            La forma más inteligente de<br>gestionar tu<span> institución educativa</span>
        </h1>
        <p class="hero-sub">
            Automatiza matrículas, organiza cursos, controla horarios y obtén reportes en tiempo real. Miles de instituciones ya confían en Blue Butterfly.
        </p>
        <div class="hero-buttons">
            <a href="{{ route('register') }}" class="btn-primary btn-primary-lg">
                Comenzar gratis <i class="fas fa-arrow-right"></i>
            </a>
            <a href="#" class="btn-outline btn-primary-lg">
                Ver demo <i class="fas fa-play"></i>
            </a>
        </div>
        <div class="hero-stats">
            <div class="hero-stat"><span>+50</span> instituciones</div>
            <div class="hero-stat"><span>98%</span> satisfacción</div>
            <div class="hero-stat"><span>24/7</span> soporte</div>
        </div>
    </div>
    <div class="hero-image">
        <div class="mockup-card">
            <div class="mockup-header">
                <div class="mockup-dot"></div>
                <div class="mockup-dot"></div>
                <div class="mockup-dot"></div>
            </div>
            <div class="mockup-content">
                <div class="mockup-row">
                    <strong><i class="fas fa-chart-line"></i> Dashboard</strong>
                    <span>+25% rendimiento</span>
                </div>
                <div class="mockup-row">
                    <span><i class="fas fa-user-graduate"></i> Alumnos: 245</span>
                    <span><i class="fas fa-book"></i> Cursos: 12</span>
                </div>
                <div class="mockup-row">
                    <div style="height:8px; background:#eef2ff; width:100%; border-radius:4px;"><div style="width:65%; height:8px; background:#4f46e5; border-radius:4px;"></div></div>
                </div>
                <div class="mockup-row" style="justify-content: flex-start; gap:1rem;">
                    <span><i class="fas fa-check-circle"></i> Matrículas activas: 189</span>
                    <span><i class="fas fa-clock"></i> Pendientes: 23</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS REALES CON CONTADOR ANIMADO -->
<div class="stats-row" id="stats-counter">
    <div class="stat-card">
        <span class="stat-number" data-target="{{ \App\Models\Alumno::count() }}">0</span>
        <span class="stat-label">Alumnos registrados</span>
    </div>
    <div class="stat-card">
        <span class="stat-number" data-target="{{ \App\Models\Curso::count() }}">0</span>
        <span class="stat-label">Cursos activos</span>
    </div>
    <div class="stat-card">
        <span class="stat-number" data-target="{{ \App\Models\Matricula::count() }}">0</span>
        <span class="stat-label">Matrículas procesadas</span>
    </div>
    <div class="stat-card">
        <span class="stat-number" data-target="{{ \App\Models\Docente::count() }}">0</span>
        <span class="stat-label">Docentes</span>
    </div>
</div>

<!-- BENEFICIOS -->
<section id="beneficios" class="benefits-section">
    <div style="text-align:center; margin-bottom:3rem;">
        <div style="display:inline-block; background:#f3e8ff; padding:0.2rem 1rem; border-radius:2rem; font-size:0.7rem; color:#7c3aed;">Para cada rol</div>
        <h2 style="font-family:'Fraunces',serif; font-size:2rem; margin-top:0.5rem;">Una experiencia diseñada para todos</h2>
        <p style="color:#64748b;">Blue Butterfly se adapta a las necesidades de cada miembro de tu comunidad educativa.</p>
    </div>
    <div class="benefits-grid">
        <div class="benefit-card">
            <div class="benefit-icon"><i class="fas fa-user-graduate"></i></div>
            <h3>Para alumnos</h3>
            <ul>
                <li><i class="fas fa-calendar-alt"></i> Visualiza tus horarios y notas en un solo lugar</li>
                <li><i class="fas fa-laptop"></i> Matrícula online desde cualquier dispositivo</li>
                <li><i class="fas fa-bell"></i> Recibe notificaciones de eventos académicos</li>
            </ul>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon"><i class="fas fa-chalkboard-user"></i></div>
            <h3>Para docentes</h3>
            <ul>
                <li><i class="fas fa-pen-fancy"></i> Registro de calificaciones ágil</li>
                <li><i class="fas fa-list"></i> Acceso a listas de alumnos por curso</li>
                <li><i class="fas fa-chart-simple"></i> Reportes de rendimiento individual</li>
            </ul>
        </div>
        <div class="benefit-card">
            <div class="benefit-icon"><i class="fas fa-building"></i></div>
            <h3>Para administradores</h3>
            <ul>
                <li><i class="fas fa-credit-card"></i> Control total de matrículas y pagos</li>
                <li><i class="fas fa-clock"></i> Gestión de cursos, horarios y aulas</li>
                <li><i class="fas fa-chart-line"></i> Estadísticas y exportación de datos</li>
            </ul>
        </div>
    </div>
</section>

<!-- CÓMO FUNCIONA + TIMELINE (más cositas) -->
<section id="funciona" class="timeline-section">
    <div style="text-align:center; margin-bottom:3rem;">
        <div style="display:inline-block; background:#f3e8ff; padding:0.2rem 1rem; border-radius:2rem; font-size:0.7rem; color:#7c3aed;">Proceso simple</div>
        <h2 style="font-family:'Fraunces',serif; font-size:2rem;">Empieza en 3 pasos</h2>
    </div>
    <div class="timeline">
        <div class="timeline-item">
            <div class="timeline-icon"><i class="fas fa-user-plus"></i></div>
            <div class="timeline-content"><strong>1. Crea tu cuenta</strong><br>Regístrate gratis y configura tu institución en minutos.</div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"><i class="fas fa-database"></i></div>
            <div class="timeline-content"><strong>2. Configura tus datos</strong><br>Añade alumnos, cursos, docentes y horarios.</div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"><i class="fas fa-file-signature"></i></div>
            <div class="timeline-content"><strong>3. Gestiona matrículas</strong><br>Comienza a inscribir alumnos y genera reportes.</div>
        </div>
    </div>
</section>

<!-- MÓDULOS -->
<section id="modulos" class="features-section">
    <div style="text-align:center; margin-bottom:3rem;">
        <div style="display:inline-block; background:#f3e8ff; padding:0.2rem 1rem; border-radius:2rem;">Módulos del sistema</div>
        <h2 style="font-family:'Fraunces',serif; font-size:2rem;">Todo lo que tu institución necesita</h2>
    </div>
    <div class="features-grid">
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-user-graduate"></i></div><h3 class="feature-title">Gestión de Alumnos</h3><p class="feature-desc">Registra, edita y consulta el historial completo de cada alumno.</p></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-book-open"></i></div><h3 class="feature-title">Catálogo de Cursos</h3><p class="feature-desc">Administra cursos, créditos, códigos y descripciones.</p></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-id-card"></i></div><h3 class="feature-title">Proceso de Matrícula</h3><p class="feature-desc">Matricula alumnos con control de horarios y profesores.</p></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-chalkboard-user"></i></div><h3 class="feature-title">Docentes</h3><p class="feature-desc">Registro de docentes por especialidad y asignación.</p></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-calendar-week"></i></div><h3 class="feature-title">Horarios Académicos</h3><p class="feature-desc">Configura días, horas y aulas sin cruces.</p></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-door-open"></i></div><h3 class="feature-title">Aulas</h3><p class="feature-desc">Gestiona espacios físicos y disponibilidad.</p></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-chart-pie"></i></div><h3 class="feature-title">Reportes Avanzados</h3><p class="feature-desc">Exporta estadísticas y analiza el rendimiento académico.</p></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-credit-card"></i></div><h3 class="feature-title">Gestión de Pagos</h3><p class="feature-desc">Control de cuotas, vencimientos y recibos.</p></a>
    </div>
</section>

<!-- BLOG / NOTICIAS (más cositas) -->
<section class="blog-section">
    <div style="text-align:center; margin-bottom:3rem;">
        <div style="display:inline-block; background:#f3e8ff; padding:0.2rem 1rem; border-radius:2rem;">Blog y novedades</div>
        <h2 style="font-family:'Fraunces',serif; font-size:2rem;">Recursos para tu institución</h2>
    </div>
    <div class="blog-grid">
        <div class="blog-card"><div class="blog-img"><i class="fas fa-chalkboard"></i></div><div class="blog-content"><h4>Cómo reducir la deserción escolar</h4><p>Estrategias prácticas usando datos académicos.</p><a href="#" style="color:#4f46e5;">Leer más →</a></div></div>
        <div class="blog-card"><div class="blog-img"><i class="fas fa-laptop-code"></i></div><div class="blog-content"><h4>Guía: Implementa tu sistema en 1 semana</h4><p>Pasos rápidos para migrar tu institución.</p><a href="#" style="color:#4f46e5;">Leer más →</a></div></div>
        <div class="blog-card"><div class="blog-img"><i class="fas fa-chart-line"></i></div><div class="blog-content"><h4>5 indicadores que todo directivo debe seguir</h4><p>Métricas clave para la gestión educativa.</p><a href="#" style="color:#4f46e5;">Leer más →</a></div></div>
    </div>
</section>

<!-- CONTACTO (nuevo) -->
<section id="contacto" class="contact-section">
    <div style="text-align:center; margin-bottom:3rem;">
        <div style="display:inline-block; background:#f3e8ff; padding:0.2rem 1rem; border-radius:2rem;">Contáctanos</div>
        <h2 style="font-family:'Fraunces',serif; font-size:2rem;">¿Necesitas más información?</h2>
    </div>
    <div class="contact-grid">
        <div class="contact-form">
            <form action="#" method="POST">
                @csrf
                <div class="mb-3"><input type="text" class="form-control" placeholder="Nombre completo"></div>
                <div class="mb-3"><input type="email" class="form-control" placeholder="Correo electrónico"></div>
                <div class="mb-3"><textarea class="form-control" rows="4" placeholder="Mensaje"></textarea></div>
                <button class="btn-primary" style="border:none;">Enviar mensaje <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
        <div class="contact-info">
            <p><i class="fas fa-envelope"></i> soporte@bluebutterfly.edu</p>
            <p><i class="fas fa-phone-alt"></i> +51 1 234 5678</p>
            <p><i class="fas fa-map-marker-alt"></i> Av. Principal 123, Lima, Perú</p>
            <div style="background:#eef2ff; height:150px; border-radius:1rem; display:flex; align-items:center; justify-content:center; margin-top:1rem;"><i class="fas fa-map"></i> Mapa interactivo</div>
        </div>
    </div>
</section>

<!-- FAQ (igual pero sin emojis) -->
<section id="faq" class="faq-section" style="background:#f8fafc; padding:5rem 2rem;">
    <div style="text-align:center; margin-bottom:3rem;"><div style="display:inline-block; background:#f3e8ff; padding:0.2rem 1rem; border-radius:2rem;">FAQ</div><h2 style="font-family:'Fraunces',serif; font-size:2rem;">Preguntas frecuentes</h2></div>
    <div class="faq-grid" style="max-width:800px; margin:0 auto;">
        <div class="faq-item" style="border-bottom:1px solid #eef2ff; padding:1rem 0;"><div class="faq-question" style="font-weight:600; display:flex; justify-content:space-between; cursor:pointer;" onclick="toggleFaq(this)">¿Es gratuito? <i class="fas fa-chevron-down"></i></div><div class="faq-answer" style="display:none; color:#64748b;">Sí, ofrecemos un plan gratuito con funcionalidades básicas.</div></div>
        <div class="faq-item" style="border-bottom:1px solid #eef2ff; padding:1rem 0;"><div class="faq-question" style="font-weight:600; display:flex; justify-content:space-between; cursor:pointer;" onclick="toggleFaq(this)">¿Necesito conocimientos técnicos? <i class="fas fa-chevron-down"></i></div><div class="faq-answer" style="display:none;">No, el sistema es muy intuitivo. Nos encargamos del mantenimiento.</div></div>
        <div class="faq-item" style="border-bottom:1px solid #eef2ff; padding:1rem 0;"><div class="faq-question" style="font-weight:600; display:flex; justify-content:space-between; cursor:pointer;" onclick="toggleFaq(this)">¿Puedo migrar mis datos actuales? <i class="fas fa-chevron-down"></i></div><div class="faq-answer" style="display:none;">Sí, ofrecemos asistencia para migrar desde Excel o sistemas antiguos.</div></div>
        <div class="faq-item" style="border-bottom:1px solid #eef2ff; padding:1rem 0;"><div class="faq-question" style="font-weight:600; display:flex; justify-content:space-between; cursor:pointer;" onclick="toggleFaq(this)">¿Qué soporte técnico ofrecen? <i class="fas fa-chevron-down"></i></div><div class="faq-answer" style="display:none;">Soporte por chat, correo y teléfono en horario laboral.</div></div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="cta-final" style="background: linear-gradient(135deg, #0f172a, #1e1b4b); padding:4rem 2rem; text-align:center; color:white;">
    <h2>¿Listo para transformar tu institución?</h2>
    <p>Únete a las instituciones que ya confían en Blue Butterfly</p>
    <a href="{{ route('register') }}" class="btn-primary btn-primary-lg" style="background:white; color:#1e1b4b;">Comenzar ahora <i class="fas fa-arrow-right"></i></a>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:2rem; max-width:1100px; margin:0 auto;">
        <div><h4 style="color:white;">Producto</h4><a href="#">Características</a><a href="#">Precios</a><a href="#">Demo</a></div>
        <div><h4 style="color:white;">Recursos</h4><a href="#">Blog</a><a href="#">Documentación</a><a href="#">Soporte</a></div>
        <div><h4 style="color:white;">Compañía</h4><a href="#">Acerca de</a><a href="#">Equipo</a><a href="#">Contacto</a></div>
        <div><h4 style="color:white;">Legal</h4><a href="#">Privacidad</a><a href="#">Términos</a></div>
    </div>
    <div class="footer-bottom" style="text-align:center; margin-top:2rem; padding-top:1rem; border-top:1px solid #1e293b; font-size:0.7rem; color:#64748b;">© {{ date('Y') }} Blue Butterfly Network — Sistema de Matrícula Académica. Hecho con dedicación para instituciones educativas.</div>
</footer>

<script>
    // Contador animado al hacer scroll
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200;
    const animateNumbers = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / speed;
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(animateNumbers, 20);
            } else {
                counter.innerText = target;
            }
        });
    };
    // Detectar cuando el bloque de stats es visible
    const statsSection = document.getElementById('stats-counter');
    let animated = false;
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !animated) {
            animated = true;
            animateNumbers();
        }
    }, { threshold: 0.3 });
    observer.observe(statsSection);

    // FAQ toggle
    function toggleFaq(element) {
        let answer = element.nextElementSibling;
        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        let icon = element.querySelector('i');
        if (answer.style.display === 'block') {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        } else {
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }
</script>
</body>
</html>