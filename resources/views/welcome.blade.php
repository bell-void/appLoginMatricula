<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blue Butterfly | Gestión Académica Premium</title>
    <meta name="description" content="Blue Butterfly – Sistema de gestión académica de alto rendimiento para instituciones educativas modernas.">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500;9..144,600;9..144,700;9..144,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #0A0A0A;
            color: #E5E5E5;
            line-height: 1.5;
            scroll-behavior: smooth;
            font-size: 16px;
        }
        :root {
            --primary: #6D28D9;
            --primary-light: #8B5CF6;
            --primary-lighter: #A78BFA;
            --primary-dark: #5B21B6;
            --accent: #A78BFA;
            --gray-500: #9CA3AF;
            --gray-700: #D1D5DB;
            --border: #2A2A2A;
            --success: #10B981;
            --black: #0A0A0A;
            --black-card: #111111;
            --black-light: #1A1A1A;
        }
        .section-padding { padding: 5rem 2rem; }

        /* NAVBAR */
        .navbar-custom {
            background: rgba(10,10,10,0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(139,92,246,0.2);
            padding: 0 2rem;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .logo-placeholder { width: 100px; }
        .nav-links { display: flex; align-items: center; gap: 0.5rem; margin: 0 auto; }
        .nav-link { padding: 0.5rem 1.2rem; font-size: 0.9rem; font-weight: 500; color: var(--gray-700); text-decoration: none; border-radius: 2rem; transition: all 0.2s; }
        .nav-link:hover { background: rgba(139,92,246,0.15); color: var(--primary-light); }
        .btn-outline { border: 1.5px solid var(--primary-light); padding: 0.5rem 1.3rem; border-radius: 3rem; font-size: 0.85rem; font-weight: 600; color: var(--primary-light); background: transparent; transition: all 0.2s; text-decoration: none; }
        .btn-outline:hover { background: var(--primary-light); color: var(--black); border-color: var(--primary-light); }
        .btn-primary-black { background: var(--primary-light); padding: 0.5rem 1.8rem; border-radius: 3rem; font-size: 0.85rem; font-weight: 600; color: var(--black); text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.2s; }
        .btn-primary-black:hover { transform: translateY(-2px); background: var(--primary-lighter); color: var(--black); }
        .btn-primary { background: linear-gradient(105deg, var(--primary), var(--primary-light)); padding: 0.5rem 1.8rem; border-radius: 3rem; font-size: 0.85rem; font-weight: 600; color: white; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.2s; border: none; cursor: pointer; }
        .btn-primary:hover { transform: translateY(-2px); background: linear-gradient(105deg, var(--primary-light), var(--primary)); }

        /* HERO CON VIDEO DE FONDO */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 3rem;
            padding: 5rem 3rem 6rem;
            flex-wrap: wrap;
            isolation: isolate;
            border-radius: 2rem;
            margin: 1rem;
            overflow: hidden;
            min-height: 600px;
        }
        
        .hero-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            opacity: 1;
        }
        
        .hero-left, .hero-right {
            position: relative;
            z-index: 3;
        }
        .hero-left { 
            flex: 1.2; 
            max-width: 550px; 
            margin-left: 5%; 
            color: white; 
            text-shadow: 0 2px 15px rgba(0,0,0,0.5);
        }
        .hero-left h1 { 
            font-family: 'Fraunces', serif; 
            font-size: 3.5rem; 
            font-weight: 800; 
            letter-spacing: -0.02em; 
            line-height: 1.2; 
            margin-bottom: 1.5rem; 
            color: white; 
            text-shadow: 0 2px 15px rgba(0,0,0,0.5); 
        }
        .hero-left p { 
            font-size: 1rem; 
            color: rgba(255,255,255,0.9); 
            margin-bottom: 2rem; 
            text-shadow: 0 1px 10px rgba(0,0,0,0.3); 
        }
        .hero-buttons { display: flex; gap: 1.2rem; flex-wrap: wrap; margin-bottom: 2.5rem; }
        .hero .btn-primary { background: white; color: var(--black); border: none; }
        .hero .btn-primary:hover { background: #f5f5f5; transform: translateY(-3px); }
        .hero .btn-outline { border-color: rgba(255,255,255,0.5); color: white; }
        .hero .btn-outline:hover { background: white; color: var(--black); border-color: white; }
        .hero-stats { display: flex; gap: 3rem; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 2rem; }
        .hero-stats div span { display: block; font-weight: 800; font-size: 1.8rem; color: var(--primary-lighter); }
        .hero-stats div small { font-size: 0.8rem; color: rgba(255,255,255,0.8); }
        
        .hero-right { 
            flex: 1; 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            position: relative;
            z-index: 3;
        }
        
        .hero-brand-name {
            font-family: 'Fraunces', serif;
            font-size: 7rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FFFFFF, var(--primary-lighter), #C4B5FD);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
            letter-spacing: -0.02em;
            text-shadow: 0 0 40px rgba(139,92,246,0.4);
            animation: gentleGlow 3s ease-in-out infinite;
            line-height: 1.1;
        }
        
        @keyframes gentleGlow {
            0%, 100% { opacity: 1; text-shadow: 0 0 20px rgba(139,92,246,0.2); }
            50% { opacity: 0.95; text-shadow: 0 0 50px rgba(139,92,246,0.6); }
        }
        
        .hero-image {
            max-width: 65%;
            height: auto;
            border-radius: 2rem;
            filter: drop-shadow(0 20px 30px rgba(0,0,0,0.3));
            animation: floatImage 4s ease-in-out infinite;
            background: transparent;
        }
        
        @keyframes floatImage {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        @media (max-width: 1200px) {
            .hero-left h1 { font-size: 2.8rem; }
            .hero-brand-name { font-size: 5rem; }
            .hero-image { max-width: 55%; }
        }
        @media (max-width: 900px) {
            .hero { flex-direction: column; text-align: center; padding: 4rem 2rem; }
            .hero-left { margin-left: 0; text-align: center; max-width: 100%; }
            .hero-right { margin-top: 2rem; }
            .hero-brand-name { font-size: 4rem; }
            .hero-image { max-width: 45%; }
            .hero-stats { justify-content: center; }
        }
        @media (max-width: 600px) {
            .hero-left h1 { font-size: 2rem; }
            .hero-brand-name { font-size: 3rem; }
            .hero-image { max-width: 65%; }
            .hero { padding: 3rem 1.5rem; }
        }

        .benefits-section, .features-section, .contact-section { background: #0A0A0A; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
        .benefits-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; max-width: 1200px; margin: 0 auto; }
        .benefit-card { background: #1A1A1A; border-radius: 1.5rem; padding: 2rem; border: 1px solid var(--border); transition: all 0.35s; }
        .benefit-card:hover { transform: translateY(-6px); border-color: var(--primary-light); }
        .benefit-icon { font-size: 2.2rem; color: var(--primary-light); margin-bottom: 1rem; }
        .benefit-card h3 { font-size: 1.4rem; font-weight: 700; margin-bottom: 1rem; color: white; }
        .benefit-card li { margin: 0.7rem 0; display: flex; align-items: center; gap: 0.6rem; color: var(--gray-500); list-style: none; }
        .benefit-card li i { color: var(--primary-light); width: 24px; }
        .timeline-section { background: #111111; }
        .timeline { max-width: 900px; margin: 0 auto; position: relative; }
        .timeline::before { content: ''; position: absolute; left: 28px; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--primary), var(--primary-light)); }
        .timeline-item { display: flex; gap: 2rem; margin-bottom: 2rem; }
        .timeline-icon { width: 56px; height: 56px; background: #1A1A1A; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-light); font-size: 1.3rem; border: 1px solid var(--border); }
        .timeline-content { background: #1A1A1A; padding: 1rem 2rem; border-radius: 1rem; flex: 1; color: var(--gray-500); border: 1px solid var(--border); }
        .timeline-content strong { font-size: 1.1rem; display: block; margin-bottom: 0.3rem; color: white; }
        .features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(270px, 1fr)); gap: 1.5rem; max-width: 1200px; margin: 0 auto; }
        .feature-card { background: #1A1A1A; border-radius: 1.3rem; padding: 1.8rem; border: 1px solid var(--border); transition: all 0.3s; text-decoration: none; display: block; }
        .feature-card:hover { transform: translateY(-5px); border-color: var(--primary-light); }
        .feature-icon { width: 55px; height: 55px; background: rgba(139,92,246,0.15); border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; color: var(--primary-light); margin-bottom: 1rem; }
        .feature-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem; color: white; }
        .feature-desc { font-size: 0.85rem; color: var(--gray-500); }
        
        .contact-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .contact-form-col { flex: 1.2; min-width: 280px; }
        .contact-info-col { flex: 1; min-width: 280px; }
        .contact-form input, .contact-form textarea {
            width: 100%; padding: 0.9rem 1rem; margin-bottom: 1rem; border: 1px solid var(--border); border-radius: 1rem;
            background: #1A1A1A; color: white; font-family: inherit; font-size: 0.9rem;
        }
        .contact-form input:focus, .contact-form textarea:focus { border-color: var(--primary-light); outline: none; }
        .contact-info-item { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.2rem; color: var(--gray-500); }
        .contact-info-item i { width: 36px; height: 36px; background: #1A1A1A; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-light); font-size: 1rem; border: 1px solid var(--border); }
        .map-wrapper { margin-top: 1.5rem; border-radius: 1rem; overflow: hidden; border: 1px solid var(--border); height: 240px; }
        .map-wrapper iframe { width: 100%; height: 100%; border: 0; }

        /* BLOG SECTION - VIDEO DE FONDO EN TODO EL MÓDULO */
        .blog-section {
            position: relative;
            isolation: isolate;
            border-radius: 2rem;
            margin: 2rem;
            overflow: hidden;
        }
        
        .blog-video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }
        
        .blog-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(10,10,10,0.7), rgba(109,40,217,0.5));
            z-index: 1;
        }
        
        .blog-section .section-title,
        .blog-section .section-sub {
            position: relative;
            z-index: 2;
            color: white;
        }
        
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 3rem;
            position: relative;
            z-index: 2;
        }
        
        .blog-card {
            background: rgba(26,26,26,0.8);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.4s;
            border: 1px solid rgba(139,92,246,0.2);
        }
        
        .blog-card:hover {
            transform: translateY(-8px);
            border-color: rgba(139,92,246,0.6);
            background: rgba(26,26,26,0.95);
        }
        
        .blog-img {
            height: 200px;
            overflow: hidden;
        }
        
        .blog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-card:hover .blog-img img {
            transform: scale(1.05);
        }
        
        .blog-content {
            padding: 1.5rem;
        }
        
        .blog-content h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
        }
        
        .blog-content p {
            color: rgba(255,255,255,0.7);
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }
        
        .blog-content a {
            color: var(--primary-light);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .blog-content a:hover {
            color: var(--primary-lighter);
            gap: 8px;
        }
        
        .faq-section { background: #111111; }
        .faq-grid { max-width: 900px; margin: 0 auto; }
        .faq-question { font-weight: 700; font-size: 1rem; display: flex; justify-content: space-between; cursor: pointer; padding: 0.8rem 0; color: white; border-bottom: 1px solid var(--border); }
        .faq-question i { color: var(--primary-light); }
        .faq-answer { color: var(--gray-500); padding: 1rem 0; display: none; line-height: 1.6; font-size: 0.9rem; }
        .faq-answer.show { display: block; }
        .footer { background: #050505; padding: 3rem 2rem 2rem; border-top: 1px solid var(--border); }
        .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 2rem; max-width: 1100px; margin: 0 auto; }
        .footer-col h4 { color: var(--primary-light); margin-bottom: 1rem; font-size: 0.9rem; }
        .footer-col a { color: #8A8A8A; text-decoration: none; font-size: 0.8rem; display: block; margin-bottom: 0.5rem; transition: all 0.2s; }
        .footer-col a:hover { color: var(--primary-light); transform: translateX(4px); }
        .footer-social a { color: #8A8A8A; font-size: 1rem; margin-right: 1rem; display: inline-block; }
        .footer-social a:hover { color: var(--primary-light); transform: translateY(-2px); }
        .footer-bottom { text-align: center; margin-top: 2.5rem; padding-top: 1rem; border-top: 1px solid #1A1A1A; font-size: 0.7rem; color: #6B6B6B; }

        .section-title { font-size: 2rem; font-weight: 700; color: white; margin-bottom: 1rem; text-align: center; }
        .section-sub { text-align: center; color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto 2rem; font-size: 0.95rem; }

        /* CHATBOT */
        .chatbot-float { position: fixed; bottom: 28px; right: 28px; width: 65px; height: 65px; background: linear-gradient(135deg, #6D28D9, #8B5CF6); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; z-index: 1000; box-shadow: 0 8px 20px rgba(0,0,0,0.25); }
        .chatbot-float:hover { transform: scale(1.08); }
        .chatbot-float i { font-size: 2rem; color: white; }
        .chatbot-pulse { position: absolute; width: 100%; height: 100%; background: rgba(139,92,246,0.4); border-radius: 50%; animation: pulse 2s infinite; z-index: -1; }
        @keyframes pulse { 0% { transform: scale(1); opacity: 0.6; } 70% { transform: scale(1.3); opacity: 0; } 100% { transform: scale(1.3); opacity: 0; } }
        .chatbot-modal { position: fixed; bottom: 110px; right: 28px; width: 380px; height: 550px; background: #1A1A1A; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.4); z-index: 1001; display: none; flex-direction: column; overflow: hidden; border: 1px solid var(--border); animation: fadeInUp 0.3s ease; }
        .chatbot-modal.show { display: flex; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .chatbot-modal-header { background: linear-gradient(135deg, #6D28D9, #8B5CF6); padding: 18px 20px; display: flex; justify-content: space-between; color: white; border-radius: 24px 24px 0 0; }
        .chatbot-header-info { display: flex; align-items: center; gap: 12px; }
        .chatbot-header-info i { font-size: 1.8rem; color: #A78BFA; }
        .chatbot-close { background: none; border: none; color: white; font-size: 1.8rem; cursor: pointer; }
        .chatbot-close:hover { color: #A78BFA; }
        .chatbot-messages { flex: 1; overflow-y: auto; padding: 20px; background: #0A0A0A; display: flex; flex-direction: column; gap: 16px; }
        .message { display: flex; gap: 10px; animation: messageFade 0.3s ease; }
        .message.user { flex-direction: row-reverse; }
        .message-avatar { width: 32px; height: 32px; background: linear-gradient(135deg, #8B5CF6, #A78BFA); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; flex-shrink: 0; }
        .message.user .message-avatar { background: #10b981; }
        .message-content { max-width: 75%; padding: 10px 14px; background: #1A1A1A; border-radius: 18px; font-size: 0.85rem; color: #E5E5E5; border: 1px solid var(--border); }
        .message.user .message-content { background: linear-gradient(135deg, #8B5CF6, #A78BFA); color: white; }
        .typing-indicator { display: flex; gap: 4px; padding: 10px 14px; background: #1A1A1A; border-radius: 18px; width: fit-content; border: 1px solid var(--border); }
        .typing-indicator span { width: 7px; height: 7px; background: #8B5CF6; border-radius: 50%; animation: typing 1.4s infinite; }
        @keyframes typing { 0%, 60%, 100% { transform: translateY(0); opacity: 0.4; } 30% { transform: translateY(-6px); opacity: 1; } }
        .chatbot-input-area { display: flex; padding: 16px; background: #1A1A1A; border-top: 1px solid var(--border); gap: 10px; }
        .chatbot-input-area input { flex: 1; padding: 12px 16px; border: 1px solid var(--border); border-radius: 30px; font-size: 0.85rem; outline: none; background: #0A0A0A; color: white; }
        .chatbot-input-area input:focus { border-color: #8B5CF6; }
        .chatbot-input-area button { width: 44px; height: 44px; background: #8B5CF6; border: none; border-radius: 50%; color: white; cursor: pointer; }
        .chatbot-input-area button:hover { background: #6D28D9; }

        @media (max-width: 1000px) {
            .blog-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .blog-grid { grid-template-columns: 1fr; }
            .hero { flex-direction: column; text-align: center; padding: 3rem 1.5rem; }
            .hero-left { margin-left: 0; text-align: center; max-width: 100%; }
            .hero-right { margin-top: 2rem; }
            .nav-links { display: none; }
            .navbar-custom { padding: 0 1rem; }
            .contact-wrapper { flex-direction: column; }
            .chatbot-float { width: 60px; height: 60px; bottom: 20px; right: 20px; }
            .chatbot-modal { width: calc(100% - 40px); right: 20px; bottom: 100px; height: 500px; }
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
        <a href="#recursos" class="nav-link">Recursos</a>
        <a href="#contacto" class="nav-link">Contacto</a>
        <a href="#faq" class="nav-link">FAQ</a>
    </div>
    <div class="nav-buttons">
        <a href="{{ route('login') }}" class="btn-outline">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn-primary-black"><i class="fas fa-user-plus"></i> Crear cuenta</a>
    </div>
</nav>

<!-- HERO -->
<section class="hero" data-aos="fade-up" data-aos-duration="1000">
    <video class="hero-video" autoplay loop muted playsinline preload="metadata">
        <source src="{{ asset('videos/mona.mp4#t=20') }}" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>
    
    <div class="hero-left">
        <h1>La forma más inteligente de gestionar tu institución educativa</h1>
        <p>Automatiza matrículas, organiza cursos, controla horarios y obtén reportes en tiempo real. Miles de instituciones ya confían en Blue Butterfly.</p>
        <div class="hero-buttons">
            <a href="{{ route('register') }}" class="btn-primary">Comenzar gratis <i class="fas fa-arrow-right"></i></a>
            <a href="#" class="btn-outline" onclick="abrirModalDemo(); return false;">Ver demo <i class="fas fa-play"></i></a>
        </div>
        <div class="hero-stats">
            <div><span>+50</span><small>instituciones</small></div>
            <div><span>98%</span><small>satisfacción</small></div>
            <div><span>24/7</span><small>soporte</small></div>
        </div>
    </div>
    <div class="hero-right">
        <div class="hero-brand-name">Blue Butterfly</div>
        <img src="{{ asset('images/chica.png') }}" alt="Estudiante" class="hero-image" onerror="this.style.display='none'">
    </div>
</section>

<!-- BENEFICIOS -->
<section id="beneficios" class="benefits-section section-padding" data-aos="fade-up">
    <div><h2 class="section-title">Una experiencia diseñada para todos</h2><p class="section-sub">Blue Butterfly se adapta a cada miembro de tu comunidad educativa.</p></div>
    <div class="benefits-grid">
        <div class="benefit-card"><div class="benefit-icon"><i class="fas fa-user-graduate"></i></div><h3>Para alumnos</h3><ul><li><i class="fas fa-calendar-alt"></i> Horarios y notas en un solo lugar</li><li><i class="fas fa-laptop"></i> Matrícula online</li><li><i class="fas fa-bell"></i> Notificaciones académicas</li></ul></div>
        <div class="benefit-card"><div class="benefit-icon"><i class="fas fa-chalkboard-user"></i></div><h3>Para docentes</h3><ul><li><i class="fas fa-pen-fancy"></i> Calificaciones ágiles</li><li><i class="fas fa-list"></i> Listas de alumnos por curso</li><li><i class="fas fa-chart-simple"></i> Reportes de rendimiento</li></ul></div>
        <div class="benefit-card"><div class="benefit-icon"><i class="fas fa-building"></i></div><h3>Para administradores</h3><ul><li><i class="fas fa-credit-card"></i> Control de pagos</li><li><i class="fas fa-clock"></i> Gestión de horarios y aulas</li><li><i class="fas fa-chart-line"></i> Estadísticas y exportación</li></ul></div>
    </div>
</section>

<!-- CÓMO FUNCIONA -->
<section id="funciona" class="timeline-section section-padding" data-aos="fade-right">
    <div><h2 class="section-title">Empieza en 3 pasos</h2><p class="section-sub">Configuración rápida y sencilla.</p></div>
    <div class="timeline">
        <div class="timeline-item"><div class="timeline-icon"><i class="fas fa-user-plus"></i></div><div class="timeline-content"><strong>1. Crea tu cuenta</strong> Regístrate gratis y configura tu institución.</div></div>
        <div class="timeline-item"><div class="timeline-icon"><i class="fas fa-database"></i></div><div class="timeline-content"><strong>2. Configura tus datos</strong> Añade alumnos, cursos, docentes y horarios.</div></div>
        <div class="timeline-item"><div class="timeline-icon"><i class="fas fa-file-signature"></i></div><div class="timeline-content"><strong>3. Gestiona matrículas</strong> Inscribe alumnos y genera reportes.</div></div>
    </div>
</section>

<!-- MÓDULOS -->
<section id="modulos" class="features-section section-padding" data-aos="fade-up">
    <div><h2 class="section-title">Todo lo que tu institución necesita</h2><p class="section-sub">Módulos integrados para una gestión completa.</p></div>
    <div class="features-grid">
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-user-graduate"></i></div><div class="feature-title">Gestión de Alumnos</div><div class="feature-desc">Registra y consulta el historial completo.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-book-open"></i></div><div class="feature-title">Catálogo de Cursos</div><div class="feature-desc">Administra cursos, créditos y descripciones.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-id-card"></i></div><div class="feature-title">Proceso de Matrícula</div><div class="feature-desc">Matricula alumnos con control de horarios.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-chalkboard-user"></i></div><div class="feature-title">Docentes</div><div class="feature-desc">Registro por especialidad y asignación.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-calendar-week"></i></div><div class="feature-title">Horarios Académicos</div><div class="feature-desc">Configura días, horas y aulas sin cruces.</div></a>
        <a href="{{ route('login') }}" class="feature-card"><div class="feature-icon"><i class="fas fa-door-open"></i></div><div class="feature-title">Aulas</div><div class="feature-desc">Gestiona espacios físicos y disponibilidad.</div></a>
    </div>
</section>

<!-- RECURSOS PARA TU INSTITUCIÓN - VIDEO DE FONDO + 3 IMÁGENES (m1.png, m2.png, m3.png) -->
<section id="recursos" class="blog-section section-padding" data-aos="zoom-in">
    <video class="blog-video-bg" autoplay loop muted playsinline preload="metadata">
        <source src="{{ asset('videos/bell.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>
    <div class="blog-overlay"></div>
    
    <div style="position: relative; z-index: 2;">
        <h2 class="section-title">Recursos para tu institución</h2>
        <p class="section-sub">Artículos y guías del sector educativo.</p>
    </div>
    
    <div class="blog-grid">
        <!-- Tarjeta 1 - Imagen m1.png -->
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('images/m1.png') }}" alt="Cómo reducir la deserción escolar" onerror="this.src='https://placehold.co/400x250/8B5CF6/white?text=Deserci%C3%B3n+Escolar'">
            </div>
            <div class="blog-content">
                <h4>Cómo reducir la deserción escolar</h4>
                <p>Estrategias prácticas con datos académicos para mantener a los estudiantes comprometidos.</p>
                <a href="https://larepublica.pe/educacion/2025/02/05/desercion-escolar-el-reto-que-afecta-a-la-juventud-y-limita-sus-oportunidades-en-el-mercado-laboral-como-combatirlo-atmpa-391915/" target="_blank">Leer más →</a>
            </div>
        </div>
        
        <!-- Tarjeta 2 - Imagen m2.png -->
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('images/m2.png') }}" alt="Implementa tu sistema en 1 semana" onerror="this.src='https://placehold.co/400x250/8B5CF6/white?text=Implementaci%C3%B3n'">
            </div>
            <div class="blog-content">
                <h4>Implementa tu sistema en 1 semana</h4>
                <p>Pasos para migrar tu institución rápidamente sin complicaciones técnicas.</p>
                <a href="https://www.gob.pe/82034-impacto-de-la-innovacion-digital-en-el-acceso-a-la-educacion-en-el-peru" target="_blank">Leer más →</a>
            </div>
        </div>
        
        <!-- Tarjeta 3 - Imagen m3.png -->
        <div class="blog-card">
            <div class="blog-img">
                <img src="{{ asset('images/m3.png') }}" alt="5 indicadores clave para directivos" onerror="this.src='https://placehold.co/400x250/8B5CF6/white?text=Indicadores+Clave'">
            </div>
            <div class="blog-content">
                <h4>5 indicadores clave para directivos</h4>
                <p>Métricas esenciales para una gestión educativa exitosa y basada en datos.</p>
                <a href="https://www.gob.pe/institucion/minedu/noticias/1226128/gobierno-impulsa-transformacion-digital-que-beneficia-a-mas-de-4-6-millones-de-estudiantes" target="_blank">Leer más →</a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACTO CON MAPA A LA DERECHA -->
<section id="contacto" class="contact-section section-padding" data-aos="fade-up">
    <div style="text-align:center; margin-bottom:2rem;"><div style="display:inline-block; background:rgba(139,92,246,0.15); padding:0.2rem 1rem; border-radius:2rem; font-size:0.7rem; color:var(--primary-light);">Contáctanos</div><h2 class="section-title" style="margin-top:0.5rem;">¿Necesitas más información?</h2><p class="section-sub">Estamos aquí para ayudarte.</p></div>
    <div class="contact-wrapper">
        <div class="contact-form-col">
            <div class="contact-form">
                <form action="#" method="POST">@csrf<input type="text" placeholder="Nombre completo" required><input type="email" placeholder="Correo electrónico" required><textarea rows="4" placeholder="Mensaje" required></textarea><button type="submit" class="btn-primary">Enviar mensaje <i class="fas fa-paper-plane"></i></button></form>
            </div>
        </div>
        <div class="contact-info-col">
            <div class="contact-info-item"><i class="fas fa-envelope"></i> <span>soporte.bluebutterfly@gmail.com</span></div>
            <div class="contact-info-item"><i class="fas fa-phone-alt"></i> <span>+51 1 234 5678</span></div>
            <div class="contact-info-item"><i class="fas fa-map-marker-alt"></i> <span>Av. Principal 123, Lima, Perú</span></div>
            <div class="map-wrapper"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.6431376191754!2d-77.06416518843093!3d-11.999176640969388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ce568c042771%3A0x6072f46c2b26e80!2sSENATI%20Sede%20Principal!5e0!3m2!1ses-419!2spe!4v1780272662053!5m2!1ses-419!2spe" allowfullscreen="" loading="lazy"></iframe></div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section id="faq" class="faq-section section-padding" data-aos="fade-up">
    <div><h2 class="section-title">Preguntas frecuentes</h2><p class="section-sub">Resolvemos tus dudas.</p></div>
    <div class="faq-grid">
        <div><div class="faq-question" onclick="toggleFaq(this)">¿Es gratuito? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">Sí, ofrecemos un plan gratuito con funcionalidades básicas para hasta 100 alumnos, gestión de cursos y matrículas. Luego puedes escalar según tus necesidades.</div></div>
        <div><div class="faq-question" onclick="toggleFaq(this)">¿Necesito conocimientos técnicos? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">No, el sistema es intuitivo y diseñado para cualquier usuario. Además contamos con tutoriales y soporte personalizado.</div></div>
        <div><div class="faq-question" onclick="toggleFaq(this)">¿Puedo migrar mis datos actuales? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">Sí, ofrecemos asistencia para migrar desde Excel, CSV u otros sistemas educativos sin costo durante el primer mes.</div></div>
        <div><div class="faq-question" onclick="toggleFaq(this)">¿Qué soporte técnico ofrecen? <i class="fas fa-chevron-down"></i></div><div class="faq-answer">Soporte por chat, correo y teléfono en horario laboral, con respuesta en menos de 2 horas.</div></div>
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

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true, offset: 100 });
    function toggleFaq(element) { let answer = element.nextElementSibling; answer.classList.toggle('show'); let icon = element.querySelector('i'); if (answer.classList.contains('show')) { icon.classList.remove('fa-chevron-down'); icon.classList.add('fa-chevron-up'); } else { icon.classList.remove('fa-chevron-up'); icon.classList.add('fa-chevron-down'); } }
    document.querySelectorAll('.nav-link').forEach(anchor => { anchor.addEventListener('click', function(e) { e.preventDefault(); const target = document.querySelector(this.getAttribute('href')); if (target) target.scrollIntoView({ behavior: 'smooth' }); }); });

    function abrirModalDemo() {
        alert("Demo próximamente disponible.");
    }
</script>

<!-- CHATBOT -->
<div class="chatbot-float" id="chatbotFloat"><i class="fas fa-robot"></i><div class="chatbot-pulse"></div></div>
<div class="chatbot-modal" id="chatbotModal"><div class="chatbot-modal-header"><div class="chatbot-header-info"><i class="fas fa-robot"></i><div><h4>Asistente Blue Butterfly</h4><p>Responde tus dudas</p></div></div><button class="chatbot-close" id="chatbotClose">&times;</button></div><div class="chatbot-messages" id="chatbotMessages"><div class="message bot"><div class="message-avatar"><i class="fas fa-robot"></i></div><div class="message-content">¡Hola! Soy el asistente virtual de Blue Butterfly.<br>¿En qué puedo ayudarte?</div></div></div><div class="chatbot-input-area"><input type="text" id="chatbotInput" placeholder="Escribe tu mensaje..."><button id="chatbotSendBtn"><i class="fas fa-paper-plane"></i></button></div></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const floatBtn = document.getElementById('chatbotFloat');
        const modal = document.getElementById('chatbotModal');
        const closeBtn = document.getElementById('chatbotClose');
        const sendBtn = document.getElementById('chatbotSendBtn');
        const input = document.getElementById('chatbotInput');
        const messages = document.getElementById('chatbotMessages');
        function toggleModal() { modal.classList.toggle('show'); if (modal.classList.contains('show')) input.focus(); }
        floatBtn.addEventListener('click', toggleModal);
        closeBtn.addEventListener('click', toggleModal);
        function addMessage(text, isUser) {
            const div = document.createElement('div');
            div.className = `message ${isUser ? 'user' : 'bot'}`;
            div.innerHTML = `<div class="message-avatar"><i class="fas ${isUser ? 'fa-user' : 'fa-robot'}"></i></div><div class="message-content">${text.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</div>`;
            messages.appendChild(div);
            messages.scrollTop = messages.scrollHeight;
        }
        function showTyping() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'message bot';
            typingDiv.id = 'typingIndicator';
            typingDiv.innerHTML = `<div class="message-avatar"><i class="fas fa-robot"></i></div><div class="typing-indicator"><span></span><span></span><span></span></div>`;
            messages.appendChild(typingDiv);
            messages.scrollTop = messages.scrollHeight;
        }
        function removeTyping() { const typing = document.getElementById('typingIndicator'); if (typing) typing.remove(); }
        async function sendMessage() {
            const message = input.value.trim();
            if (!message) return;
            addMessage(message, true);
            input.value = '';
            showTyping();
            setTimeout(() => {
                removeTyping();
                addMessage("Gracias por tu consulta. Un asesor te contactará pronto.", false);
            }, 1000);
        }
        sendBtn.addEventListener('click', sendMessage);
        input.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });
    });
</script>
</body>
</html>