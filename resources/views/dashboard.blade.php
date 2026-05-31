@extends('layouts.app')

@section('content')
<div class="bbn-dash">

    <!-- TOPBAR SIN LOGO -->
    <div class="bbn-dash-top">
        <div class="bbn-dash-top-left">
            <!-- Sin logo, solo espacio -->
        </div>
        <div class="bbn-dash-top-right">
            <div class="bbn-dash-user">
                <div class="bbn-dash-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <div>
                    <div class="bbn-dash-uname">{{ Auth::user()->name }}</div>
                    <div class="bbn-dash-urole">Administrador</div>
                </div>
            </div>
            <a href="#" class="bbn-dash-logout"
               onclick="event.preventDefault(); document.getElementById('logout-dash').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
            <form id="logout-dash" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </div>
    </div>

    <!-- BODY CON FONDO OSCURO Y TÍTULO GIGANTE CENTRADO -->
    <div class="bbn-dash-body">
        
        <!-- Título central gigante (Blue Butterfly) -->
        <div class="hero-title">
            <h1 class="main-title">Blue Butterfly</h1>
            <p class="main-sub">Sistema de Matrícula Académica</p>
        </div>

        <!-- Saludo al usuario (centrado, sin números) -->
        <div class="welcome-message">
            <p>Bienvenido, <strong>{{ explode(' ', Auth::user()->name)[0] }}</strong><br>
            <span class="date-info">Panel de control · Semestre 2025-I · {{ now()->format('d/m/Y') }}</span></p>
        </div>

        <!-- GRID DE 6 TARJETAS ENLAZABLES -->
        <div class="dashboard-grid">
            <!-- Alumnos -->
            <a href="{{ route('alumnos.index') }}" class="dashboard-card">
                <div class="card-icon"><i class="fas fa-user-graduate"></i></div>
                <div class="card-title">Alumnos</div>
                <div class="card-count">{{ \App\Models\Alumno::count() }}</div>
                <div class="card-desc">Gestionar registros de alumnos</div>
            </a>

            <!-- Cursos -->
            <a href="{{ route('cursos.index') }}" class="dashboard-card">
                <div class="card-icon"><i class="fas fa-book-open"></i></div>
                <div class="card-title">Cursos</div>
                <div class="card-count">{{ \App\Models\Curso::count() }}</div>
                <div class="card-desc">Catálogo académico</div>
            </a>

            <!-- Matrículas -->
            <a href="{{ route('matriculas.index') }}" class="dashboard-card">
                <div class="card-icon"><i class="fas fa-id-card"></i></div>
                <div class="card-title">Matrículas</div>
                <div class="card-count">{{ \App\Models\Matricula::count() }}</div>
                <div class="card-desc">Control de inscripciones</div>
            </a>

            <!-- Docentes -->
            <a href="{{ route('docentes.index') }}" class="dashboard-card">
                <div class="card-icon"><i class="fas fa-chalkboard-user"></i></div>
                <div class="card-title">Docentes</div>
                <div class="card-count">{{ \App\Models\Docente::count() }}</div>
                <div class="card-desc">Personal académico</div>
            </a>

            <!-- Horarios -->
            <a href="{{ route('horarios.index') }}" class="dashboard-card">
                <div class="card-icon"><i class="fas fa-calendar-week"></i></div>
                <div class="card-title">Horarios</div>
                <div class="card-count">{{ \App\Models\Horario::count() }}</div>
                <div class="card-desc">Programación académica</div>
            </a>

            <!-- Aulas -->
            <a href="{{ route('aulas.index') }}" class="dashboard-card">
                <div class="card-icon"><i class="fas fa-door-open"></i></div>
                <div class="card-title">Aulas</div>
                <div class="card-count">{{ \App\Models\Aula::count() }}</div>
                <div class="card-desc">Espacios educativos</div>
            </a>
        </div>

        <!-- FOOTER -->
        <div class="bbn-dash-footer">
            Blue Butterfly Network · Sistema de Matrícula © {{ date('Y') }} · Laravel {{ app()->version() }} · PHP {{ phpversion() }}
        </div>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

.bbn-dash {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(145deg, #0a0a0f 0%, #1a1a2e 100%);
    min-height: 100vh;
}

/* TOPBAR (oscuro) */
.bbn-dash-top {
    background: rgba(10, 10, 15, 0.8);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(255,255,255,0.05);
    padding: 12px 28px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    position: sticky;
    top: 0;
    z-index: 50;
}

.bbn-dash-top-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.bbn-dash-user {
    display: flex;
    align-items: center;
    gap: 10px;
    color: white;
}

.bbn-dash-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #7c3aed, #4f46e5);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
    color: white;
}

.bbn-dash-uname {
    font-size: 13px;
    font-weight: 500;
}

.bbn-dash-urole {
    font-size: 11px;
    color: rgba(255,255,255,0.5);
}

.bbn-dash-logout {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    background: rgba(220,38,38,0.15);
    border: 1px solid rgba(220,38,38,0.3);
    border-radius: 30px;
    font-size: 12px;
    font-weight: 500;
    color: #f87171;
    text-decoration: none;
    transition: all 0.2s;
}

.bbn-dash-logout:hover {
    background: rgba(220,38,38,0.25);
}

/* BODY */
.bbn-dash-body {
    padding: 24px 28px;
    max-width: 1400px;
    margin: 0 auto;
}

/* Título gigante centrado */
.hero-title {
    text-align: center;
    margin: 60px 0 40px;
}
.main-title {
    font-family: 'Space Mono', monospace;
    font-size: 5rem;
    font-weight: 700;
    letter-spacing: -1px;
    background: linear-gradient(135deg, #fff, #a78bfa);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 8px;
    text-shadow: 0 0 20px rgba(168,85,247,0.3);
}
.main-sub {
    font-family: 'Space Mono', monospace;
    font-size: 1rem;
    color: rgba(255,255,255,0.5);
    letter-spacing: 2px;
}

/* Mensaje de bienvenida centrado */
.welcome-message {
    text-align: center;
    margin-bottom: 60px;
    font-family: 'Space Mono', monospace;
}
.welcome-message p {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.7);
}
.welcome-message strong {
    color: #a78bfa;
    font-weight: 700;
}
.date-info {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.4);
    display: block;
    margin-top: 8px;
}

/* GRID DE TARJETAS */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 28px;
    margin-bottom: 60px;
}

.dashboard-card {
    background: rgba(20, 20, 35, 0.6);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 28px;
    padding: 32px 24px;
    text-align: center;
    text-decoration: none;
    transition: all 0.25s ease;
    display: block;
}

.dashboard-card:hover {
    transform: translateY(-6px);
    background: rgba(30, 30, 50, 0.85);
    border-color: rgba(168, 85, 247, 0.5);
    box-shadow: 0 12px 24px rgba(0,0,0,0.3);
}

.card-icon {
    font-size: 3.2rem;
    color: #a78bfa;
    margin-bottom: 20px;
}

.card-title {
    font-family: 'Space Mono', monospace;
    font-size: 1.8rem;
    font-weight: 700;
    color: white;
    margin-bottom: 12px;
    letter-spacing: -0.5px;
}

.card-count {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #fff, #a78bfa);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 12px;
}

.card-desc {
    font-size: 0.85rem;
    color: rgba(255,255,255,0.5);
    font-family: 'Space Mono', monospace;
}

/* Footer */
.bbn-dash-footer {
    text-align: center;
    font-size: 0.7rem;
    color: rgba(255,255,255,0.3);
    padding: 20px 0;
    border-top: 1px solid rgba(255,255,255,0.05);
    margin-top: 20px;
    font-family: 'Space Mono', monospace;
}

/* Responsive */
@media (max-width: 900px) {
    .main-title { font-size: 3rem; }
    .card-title { font-size: 1.4rem; }
    .dashboard-card { padding: 24px 20px; }
    .bbn-dash-body { padding: 16px; }
}
@media (max-width: 600px) {
    .main-title { font-size: 2rem; }
    .card-title { font-size: 1.2rem; }
    .card-icon { font-size: 2.5rem; }
}
</style>

@endsection