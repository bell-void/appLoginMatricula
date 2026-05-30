@extends('layouts.app')

@section('content')

<!-- HERO PRINCIPAL -->
<div class="bbn-hero">
    <div class="bbn-hero-bg"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-hero">
            <div class="col-lg-6">
                <div class="bbn-tag mb-3">
                    <i class="ti ti-butterfly"></i> Blue Butterfly Network
                </div>
                <h1 class="bbn-hero-title">Sistema de<br><span class="text-accent">Matrícula</span><br>Académica</h1>
                <p class="bbn-hero-sub">Gestiona alumnos, cursos, profesores, horarios y matrículas desde una sola plataforma profesional.</p>
                <div class="d-flex gap-3 flex-wrap mt-4">
                    <a href="{{ route('register') }}" class="btn bbn-btn-primary">
                        <i class="ti ti-rocket"></i> Empezar ahora
                    </a>
                    <a href="{{ route('login') }}" class="btn bbn-btn-ghost">
                        <i class="ti ti-login"></i> Iniciar sesión
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                <div class="bbn-hero-card">
                    <div class="bbn-card-inner">
                        <div class="bbn-module-grid">
                            <div class="bbn-module-item blue">
                                <i class="ti ti-users"></i>
                                <span>Alumnos</span>
                            </div>
                            <div class="bbn-module-item green">
                                <i class="ti ti-book-2"></i>
                                <span>Cursos</span>
                            </div>
                            <div class="bbn-module-item purple">
                                <i class="ti ti-clipboard-list"></i>
                                <span>Matrículas</span>
                            </div>
                            <div class="bbn-module-item amber">
                                <i class="ti ti-chalkboard"></i>
                                <span>Profesores</span>
                            </div>
                            <div class="bbn-module-item teal">
                                <i class="ti ti-calendar-event"></i>
                                <span>Horarios</span>
                            </div>
                            <div class="bbn-module-item red">
                                <i class="ti ti-chart-bar"></i>
                                <span>Reportes</span>
                            </div>
                        </div>
                        <a href="{{ route('login') }}" class="btn bbn-btn-primary w-100 mt-3">
                            <i class="ti ti-arrow-right"></i> Iniciar Matrícula
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STATS BAR -->
<div class="bbn-stats">
    <div class="container">
        <div class="row text-center">
            <div class="col-6 col-md-3 bbn-stat-item">
                <div class="bbn-stat-val">+2,400</div>
                <div class="bbn-stat-label">Alumnos registrados</div>
            </div>
            <div class="col-6 col-md-3 bbn-stat-item">
                <div class="bbn-stat-val">148</div>
                <div class="bbn-stat-label">Cursos disponibles</div>
            </div>
            <div class="col-6 col-md-3 bbn-stat-item">
                <div class="bbn-stat-val">+8,600</div>
                <div class="bbn-stat-label">Matrículas procesadas</div>
            </div>
            <div class="col-6 col-md-3 bbn-stat-item">
                <div class="bbn-stat-val">99.9%</div>
                <div class="bbn-stat-label">Disponibilidad</div>
            </div>
        </div>
    </div>
</div>

<!-- MÓDULOS -->
<div class="bbn-modules py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="bbn-section-tag">Módulos del sistema</span>
            <h2 class="bbn-section-title">Todo lo que necesita tu institución</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bbn-feat-card">
                    <div class="bbn-feat-icon blue"><i class="ti ti-users"></i></div>
                    <h3>Gestión de Alumnos</h3>
                    <p>Registra, edita y consulta el historial completo de cada alumno con control de estado y expediente.</p>
                    <a href="{{ route('login') }}" class="bbn-feat-link">Ver módulo <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bbn-feat-card">
                    <div class="bbn-feat-icon green"><i class="ti ti-book-2"></i></div>
                    <h3>Catálogo de Cursos</h3>
                    <p>Administra cursos, créditos, códigos y descripciones por semestre académico.</p>
                    <a href="{{ route('login') }}" class="bbn-feat-link">Ver módulo <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bbn-feat-card">
                    <div class="bbn-feat-icon purple"><i class="ti ti-clipboard-list"></i></div>
                    <h3>Proceso de Matrícula</h3>
                    <p>Matricula alumnos a cursos con control de horarios, profesores y seguimiento de notas.</p>
                    <a href="{{ route('login') }}" class="bbn-feat-link">Ver módulo <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bbn-feat-card">
                    <div class="bbn-feat-icon amber"><i class="ti ti-chalkboard"></i></div>
                    <h3>Profesores</h3>
                    <p>Registro de docentes por especialidad con asignación de cursos y horarios académicos.</p>
                    <a href="{{ route('login') }}" class="bbn-feat-link">Ver módulo <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bbn-feat-card">
                    <div class="bbn-feat-icon teal"><i class="ti ti-calendar-event"></i></div>
                    <h3>Horarios Académicos</h3>
                    <p>Configura días, horas y aulas para cada curso. Evita cruces y optimiza el tiempo.</p>
                    <a href="{{ route('login') }}" class="bbn-feat-link">Ver módulo <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bbn-feat-card">
                    <div class="bbn-feat-icon red"><i class="ti ti-chart-bar"></i></div>
                    <h3>Reportes y Estadísticas</h3>
                    <p>Visualiza métricas en tiempo real: matrículas, aprobados, reprobados y tendencias.</p>
                    <a href="{{ route('login') }}" class="bbn-feat-link">Ver reportes <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="bbn-cta">
    <div class="container text-center">
        <h2>¿Listo para modernizar tu institución?</h2>
        <p>Únete a las instituciones que ya gestionan sus matrículas con Blue Butterfly Network</p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('register') }}" class="btn bbn-btn-primary">
                <i class="ti ti-rocket"></i> Comenzar gratis
            </a>
            <a href="{{ route('login') }}" class="btn bbn-btn-outline-white">
                Iniciar sesión
            </a>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="bbn-footer">
    <div class="container d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div class="d-flex align-items-center gap-2">
            <div class="bbn-footer-icon"><i class="ti ti-butterfly"></i></div>
            <span class="bbn-footer-text">© 2025 Blue Butterfly Network — Sistema de Matrícula Académica</span>
        </div>
        <div class="d-flex gap-4">
            <a href="#" class="bbn-footer-link">Privacidad</a>
            <a href="#" class="bbn-footer-link">Términos</a>
            <a href="#" class="bbn-footer-link">Soporte</a>
        </div>
    </div>
</footer>

@endsection