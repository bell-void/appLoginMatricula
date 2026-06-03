@extends('layouts.app')

@section('content')
<style>
    /* ===== FORZAR OCULTACIÓN COMPLETA DE LA NAVBAR DEL LAYOUT ===== */
    .navbar,
    nav.navbar,
    .navbar.navbar-expand-md,
    .navbar-light,
    .navbar-brand,
    .navbar-nav,
    .navbar-collapse,
    .navbar .container,
    .navbar .container-fluid,
    .navbar .container-lg,
    .navbar .container-md,
    .navbar .container-sm,
    .navbar .container-xl,
    header nav,
    header .navbar,
    nav:first-of-type,
    .navbar:first-of-type {
        display: none !important;
    }
    /* Eliminar cualquier espacio reservado */
    body {
        padding-top: 0 !important;
        margin-top: 0 !important;
    }
    /* Asegurar que el contenido del dashboard ocupe todo el ancho */
    .bbn-dash {
        margin-top: 0;
        padding-top: 0;
    }
</style>

<div class="bbn-dash">

    <!-- TOPBAR SIMPLIFICADA (sin nombre de usuario) -->
    <div class="bbn-dash-top">
        <div class="bbn-dash-top-left">
            <div class="brand-mini">
                <i class="fas fa-butterfly"></i>
                <span>Blue Butterfly</span>
            </div>
        </div>
        <div class="bbn-dash-top-right">
            <div class="bbn-dash-user">
                <div class="bbn-dash-avatar">AD</div>
                <div class="user-info">
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

    <div class="bbn-dash-body">

        <!-- ========== HERO CON VIDEO ========== -->
        <div class="hero-section" data-aos="fade-up" data-aos-duration="1000">
            <video class="hero-video-bg" autoplay muted loop playsinline>
                <source src="{{ asset('videos/final.mp4') }}" type="video/mp4">
            </video>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="badge">Panel de Control</span>
                </div>
                <h1 class="main-title">
                    <span class="title-line">Blue Butterfly</span>
                    <span class="title-accent">Gestión Académica</span>
                </h1>
                <div class="hero-decoration"></div>
                <p class="main-sub">Sistema de administración educativa de alto rendimiento</p>
                <div class="welcome-message-giant">
                    <p>Bienvenido de nuevo, <strong>Administrador</strong></p>
                    <span class="date-info">Semestre Académico 2025-I · {{ now()->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>

        <!-- TARJETAS DE ESTADÍSTICAS -->
        <div class="stats-grid" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/alumnos_activos.png') }}" alt="Alumnos Activos" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=A'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalAlumnos ?? 0 }}</div>
                    <div class="stat-label">Alumnos Activos</div>
                    <div class="stat-trend"><i class="fas fa-arrow-up"></i> +12% este mes</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/cursos_activos.png') }}" alt="Cursos Activos" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=C'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalCursos ?? 0 }}</div>
                    <div class="stat-label">Cursos Activos</div>
                    <div class="stat-trend"><i class="fas fa-chart-line"></i> En progreso</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/docentes1.png') }}" alt="Docentes" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=D'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalDocentes ?? 0 }}</div>
                    <div class="stat-label">Docentes</div>
                    <div class="stat-trend"><i class="fas fa-user-plus"></i> Cuerpo académico</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/matricula1.png') }}" alt="Matrículas" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=M'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalMatriculas ?? 0 }}</div>
                    <div class="stat-label">Matrículas</div>
                    <div class="stat-trend"><i class="fas fa-calendar-check"></i> Este semestre</div>
                </div>
            </div>
        </div>

        <!-- GRÁFICO PRINCIPAL -->
        <div class="chart-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <div class="section-header">
                <div class="header-left">
                    <h3 class="section-title">Top 5 cursos con más matrículas</h3>
                    <p class="section-subtitle">Distribución de inscripciones por curso académico</p>
                </div>
                <div class="header-right">
                    <span class="badge-info"><i class="fas fa-chart-bar"></i> Datos en tiempo real</span>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="coursesChart"></canvas>
            </div>
        </div>

        <!-- ÚLTIMAS MATRÍCULAS Y CONSEJO -->
        <div class="two-columns" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            <div class="recent-matriculas-section">
                <div class="section-header-sm">
                    <div class="header-icon">
                        <img src="{{ asset('images/matricula.png') }}" alt="Matrículas" class="header-icon-img" onerror="this.src='https://placehold.co/56x56/A78BFA/white?text=M'">
                    </div>
                    <div>
                        <h4>Últimas matrículas</h4>
                        <p>Registros recientes de inscripciones</p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="recent-table">
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>Curso</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $matriculasOrdenadas = isset($ultimasMatriculas) ? $ultimasMatriculas->sortByDesc(function($mat) {
                                    return $mat->fecha_matricula ?? $mat->created_at;
                                }) : collect();
                            @endphp
                            @forelse($matriculasOrdenadas as $matricula)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar-sm">{{ strtoupper(substr($matricula->alumno->nombre ?? '', 0, 1)) }}{{ strtoupper(substr($matricula->alumno->apellido ?? '', 0, 1)) }}</div>
                                        <span>{{ $matricula->alumno->nombre ?? '' }} {{ $matricula->alumno->apellido ?? '' }}</span>
                                    </div>
                                </td>
                                <td><span class="course-badge">{{ $matricula->curso->nombre_curso ?? $matricula->curso->nombre ?? 'N/A' }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($matricula->fecha_matricula ?? $matricula->created_at)->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center">No hay matrículas registradas<\/td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tip-card">
                <div class="tip-icon">
                    <img src="{{ asset('images/consejo.png') }}" alt="Consejo del día" class="tip-icon-img" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=💡'">
                </div>
                <div class="tip-content">
                    <h4>Consejo del día</h4>
                    <p id="tipText">Cargando consejo...</p>
                </div>
            </div>
        </div>

        <!-- MÓDULOS DE GESTIÓN -->
        <div class="modules-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <div class="modules-header">
                <h3>Módulos de Gestión</h3>
                <p>Haz clic en cualquier tarjeta para ver información detallada</p>
            </div>
            <div class="modules-grid">
                @php
                    $modulos = [
                        ['mod'=>'alumnos', 'titulo'=>'Alumnos', 'desc'=>'Gestión completa de estudiantes', 'ruta'=>route('alumnos.index'), 'pdf'=>route('pdf.alumnos'), 'total'=>$totalAlumnos ?? 0],
                        ['mod'=>'cursos', 'titulo'=>'Cursos', 'desc'=>'Catálogo académico', 'ruta'=>route('cursos.index'), 'pdf'=>route('pdf.cursos'), 'total'=>$totalCursos ?? 0],
                        ['mod'=>'matriculas', 'titulo'=>'Matrículas', 'desc'=>'Control de inscripciones', 'ruta'=>route('matriculas.index'), 'pdf'=>route('pdf.matriculas'), 'total'=>$totalMatriculas ?? 0],
                        ['mod'=>'docentes', 'titulo'=>'Docentes', 'desc'=>'Personal académico', 'ruta'=>route('docentes.index'), 'pdf'=>route('pdf.docentes'), 'total'=>$totalDocentes ?? 0],
                        ['mod'=>'horarios', 'titulo'=>'Horarios', 'desc'=>'Programación académica', 'ruta'=>route('horarios.index'), 'pdf'=>route('pdf.horarios'), 'total'=>$totalHorarios ?? 0],
                        ['mod'=>'aulas', 'titulo'=>'Aulas', 'desc'=>'Espacios educativos', 'ruta'=>route('aulas.index'), 'pdf'=>route('pdf.aulas'), 'total'=>$totalAulas ?? 0],
                    ];
                @endphp
                @foreach($modulos as $mod)
                <div class="module-card" data-module="{{ $mod['mod'] }}" data-route="{{ $mod['ruta'] }}" data-title="{{ $mod['titulo'] }}" data-desc="{{ $mod['desc'] }}" data-count="{{ $mod['total'] }}">
                    <div class="module-card-inner">
                        <div class="module-icon">
                            <img src="{{ asset('images/'.$mod['mod'].'.png') }}" alt="{{ $mod['titulo'] }}" onerror="this.src='https://placehold.co/85x85/A78BFA/white?text={{ substr($mod['titulo'],0,1) }}'">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">{{ $mod['titulo'] }}</h3>
                            <p class="module-desc">{{ $mod['desc'] }}</p>
                        </div>
                        <div class="module-count">
                            <a href="{{ $mod['pdf'] }}" class="btn-pdf" title="Exportar a PDF" target="_blank">
                                <img src="{{ asset('images/expediente.png') }}" alt="PDF" style="width:32px;height:32px;object-fit:contain;">
                            </a>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- BOTÓN VOLVER -->
        <div class="back-to-home" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
            <a href="{{ url('/') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Volver a la página principal
            </a>
        </div>

        <div class="bbn-dash-footer">
            <p>Blue Butterfly Network · Sistema de Gestión Académica © {{ date('Y') }}</p>
            <p class="tech-stack">Laravel {{ app()->version() }} · PHP {{ phpversion() }}</p>
        </div>
    </div>
</div>

<!-- MODAL INFORMATIVO -->
<div id="moduleModal" class="module-modal">
    <div class="module-modal-content">
        <div class="module-modal-header">
            <div class="modal-icon" id="modalIcon"><i class="fas fa-info-circle"></i></div>
            <h2 id="modalTitle">Información del Módulo</h2>
            <button class="modal-close" id="closeModalBtn">&times;</button>
        </div>
        <div class="module-modal-body">
            <p id="modalDescription">Descripción del módulo...</p>
            <div class="modal-stats">
                <div class="stat-item">
                    <span class="stat-label-modal">Total registros</span>
                    <span class="stat-value-modal" id="modalCount">0</span>
                </div>
            </div>
            <div class="modal-preview">
                <h4>Vista previa de datos</h4>
                <div class="preview-table-container">
                    <table class="preview-table" id="previewTable">
                        <thead><tr><th>ID</th><th>Nombre</th><th>Estado</th></tr></thead>
                        <tbody><tr><td>1</td><td>Ejemplo de registro</td><td>Activo</td></tr></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="module-modal-footer">
            <button class="btn-secondary" id="cancelModalBtn">Cerrar</button>
            <a href="#" id="goToModuleBtn" class="btn-primary-modal">Ver módulo completo →</a>
        </div>
    </div>
</div>

<style>
/* ===== ESTILOS COMPLETOS (FONDO NEGRO, VIDEO EN HERO) ===== */
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

* { margin: 0; padding: 0; box-sizing: border-box; }

.bbn-dash {
    font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    background: #0a0a0a;
    min-height: 100vh;
}

/* TOPBAR */
.bbn-dash-top {
    background: #111111;
    border-bottom: 1px solid rgba(139,92,246,0.3);
    padding: 20px 48px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 100;
}
.brand-mini {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 700;
    font-size: 1.3rem;
    color: #f0f0f0;
}
.brand-mini i { color: #A78BFA; font-size: 1.6rem; }
.bbn-dash-top-right { display: flex; align-items: center; gap: 28px; }
.bbn-dash-user {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #1f1f1f;
    padding: 6px 18px 6px 12px;
    border-radius: 80px;
    border: 1px solid rgba(167,139,250,0.3);
    transition: all 0.2s;
}
.bbn-dash-user:hover { background: #2a2a2a; border-color: rgba(167,139,250,0.5); }
.bbn-dash-avatar {
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, #A78BFA, #8B5CF6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 700;
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(167,139,250,0.3);
}
.user-info { display: flex; flex-direction: column; }
.bbn-dash-urole { font-size: 12px; color: #A78BFA; font-weight: 600; letter-spacing: 0.5px; }
.bbn-dash-logout {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 20px;
    background: rgba(220,38,38,0.1);
    border: 1px solid rgba(220,38,38,0.3);
    border-radius: 80px;
    font-size: 13px;
    font-weight: 600;
    color: #f87171;
    text-decoration: none;
    transition: all 0.2s;
}
.bbn-dash-logout:hover { background: #dc2626; color: white; transform: translateY(-2px); }
.bbn-dash-body { padding: 56px 64px; max-width: 1600px; margin: 0 auto; }

/* ========== HERO CON VIDEO ========== */
.hero-section {
    position: relative;
    text-align: center;
    margin-bottom: 80px;
    border-radius: 48px;
    overflow: hidden;
    box-shadow: 0 20px 40px -12px rgba(0,0,0,0.5);
}
.hero-video-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
}
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.65);
    z-index: 1;
}
.hero-content {
    position: relative;
    z-index: 2;
    padding: 40px 20px 60px;
}
.hero-badge { margin-bottom: 24px; }
.badge {
    display: inline-block;
    background: rgba(139,92,246,0.2);
    backdrop-filter: blur(4px);
    color: #c4b5fd;
    font-size: 0.85rem;
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 60px;
    border: 1px solid rgba(139,92,246,0.6);
}
.main-title {
    font-size: 4.5rem;
    font-weight: 800;
    margin-bottom: 0;
    line-height: 1.2;
}
.title-line {
    background: linear-gradient(135deg, #ffffff, #d9c8ff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    display: block;
}
.title-accent {
    background: linear-gradient(135deg, #a78bfa, #8b5cf6);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-size: 3rem;
    display: block;
    margin-top: 8px;
}
.hero-decoration {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #8b5cf6, #a78bfa, #8b5cf6);
    margin: 24px auto 20px;
    border-radius: 4px;
}
.main-sub {
    font-size: 1rem;
    color: #d1d1e0;
    letter-spacing: 2px;
    font-weight: 500;
    text-transform: uppercase;
    margin-bottom: 32px;
}
.welcome-message-giant {
    margin-top: 24px;
    background: rgba(0,0,0,0.5);
    display: inline-block;
    padding: 12px 28px;
    border-radius: 60px;
    backdrop-filter: blur(4px);
}
.welcome-message-giant p {
    font-size: 1.3rem;
    color: #f0f0f0;
    margin-bottom: 0;
}
.welcome-message-giant strong {
    color: #c4b5fd;
    font-weight: 800;
}
.date-info {
    font-size: 0.75rem;
    color: #b9b9c3;
    background: transparent;
    padding: 0;
}

/* ESTADÍSTICAS */
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px; margin-bottom: 64px; }
.stat-card {
    background: #16161a;
    border-radius: 32px;
    padding: 36px 32px;
    display: flex;
    align-items: center;
    gap: 24px;
    transition: all 0.35s ease;
    border: 1px solid rgba(167,139,250,0.2);
}
.stat-card:hover { transform: translateY(-6px); border-color: #A78BFA; box-shadow: 0 25px 40px -18px rgba(167,139,250,0.3); }
.stat-icon {
    width: 90px; height: 90px;
    background: #2a2a2e;
    border-radius: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.stat-icon img { width: 100%; height: 100%; object-fit: cover; }
.stat-info { flex: 1; }
.stat-number { font-size: 3.5rem; font-weight: 800; color: #fff; font-family: monospace; letter-spacing: -2px; }
.stat-label { font-size: 1rem; color: #a0a0b0; font-weight: 500; margin-top: 8px; }
.stat-trend { font-size: 0.8rem; color: #10b981; margin-top: 10px; display: flex; align-items: center; gap: 6px; }

/* GRÁFICO */
.chart-section {
    background: #16161a;
    border-radius: 32px;
    padding: 40px;
    margin-bottom: 64px;
    border: 1px solid rgba(167,139,250,0.2);
    transition: all 0.35s ease;
}
.chart-section:hover { border-color: rgba(167,139,250,0.5); box-shadow: 0 12px 30px -12px rgba(167,139,250,0.1); }
.section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; flex-wrap: wrap; gap: 20px; }
.section-title { font-size: 1.6rem; font-weight: 700; color: #f0f0f0; }
.section-subtitle { font-size: 0.9rem; color: #a0a0b0; margin-top: 8px; }
.badge-info { background: #2a2a2e; padding: 10px 22px; border-radius: 60px; font-size: 0.85rem; font-weight: 500; color: #A78BFA; border: 1px solid #A78BFA; }
.chart-container { position: relative; width: 100%; height: 460px; }

/* DOS COLUMNAS */
.two-columns { display: grid; grid-template-columns: 1.8fr 1fr; gap: 32px; margin-bottom: 64px; }
.recent-matriculas-section {
    background: #16161a;
    border-radius: 32px;
    padding: 32px;
    border: 1px solid rgba(167,139,250,0.2);
    transition: all 0.35s ease;
}
.recent-matriculas-section:hover { border-color: rgba(167,139,250,0.4); }
.section-header-sm { display: flex; align-items: center; gap: 18px; margin-bottom: 28px; }
.header-icon {
    width: 56px; height: 56px;
    background: #2a2a2e;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.header-icon-img { width: 100%; height: 100%; object-fit: cover; }
.section-header-sm h4 { font-size: 1.4rem; font-weight: 700; color: #f0f0f0; }
.section-header-sm p { font-size: 0.85rem; color: #a0a0b0; }
.table-responsive { overflow-x: auto; }
.recent-table { width: 100%; border-collapse: collapse; }
.recent-table th { text-align: left; padding: 18px 16px; background: #2a2a2e; color: #A78BFA; font-weight: 600; font-size: 0.9rem; border-radius: 16px; }
.recent-table td {
    padding: 16px;
    border-bottom: 1px solid #2a2a2e;
    color: #e0e0e0;
    font-size: 0.95rem;
}
.recent-table td .user-cell span { color: #e0e0e0; }
.recent-table tr:hover td { background: #1e1e22; }
.user-cell { display: flex; align-items: center; gap: 14px; }
.user-avatar-sm {
    width: 44px; height: 44px;
    background: linear-gradient(135deg, #2a2a2e, #3a3a40);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 700;
    color: #A78BFA;
}
.course-badge { background: #2a2a2e; padding: 8px 18px; border-radius: 30px; font-size: 0.85rem; font-weight: 500; color: #f0f0f0; border: 1px solid rgba(167,139,250,0.3); }

/* TARJETA CONSEJO */
.tip-card {
    background: linear-gradient(135deg, #1a1a2e, #16161a);
    border-radius: 32px;
    padding: 40px 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 24px;
    border: 1px solid rgba(167,139,250,0.2);
    transition: all 0.35s ease;
}
.tip-card:hover { transform: translateY(-6px); border-color: rgba(167,139,250,0.5); }
.tip-icon { width: 90px; height: 90px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 50%; background: #2a2a2e; }
.tip-icon-img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
.tip-content h4 { font-size: 1.4rem; font-weight: 700; color: #f0f0f0; margin-bottom: 16px; }
.tip-content p { font-size: 1rem; color: #c0c0d0; line-height: 1.6; }

/* MÓDULOS */
.modules-section { margin-bottom: 64px; }
.modules-header { text-align: center; margin-bottom: 48px; }
.modules-header h3 { font-size: 2.2rem; font-weight: 700; color: #f0f0f0; margin-bottom: 12px; }
.modules-header p { color: #a0a0b0; font-size: 1rem; }
.modules-grid { display: flex; flex-direction: column; gap: 24px; }
.module-card {
    background: #16161a;
    border-radius: 28px;
    border: 1px solid rgba(167,139,250,0.2);
    cursor: pointer;
    transition: all 0.35s ease;
}
.module-card:hover {
    transform: translateX(12px) translateY(-4px);
    border-color: #A78BFA;
    box-shadow: 0 25px 40px -18px rgba(167,139,250,0.25);
    background: #1e1e2a;
}
.module-card-inner {
    display: flex;
    align-items: center;
    gap: 28px;
    padding: 32px 42px;
}
.module-icon {
    width: 85px; height: 85px;
    flex-shrink: 0;
    border-radius: 24px;
    overflow: hidden;
    background: #2a2a2e;
    display: flex;
    align-items: center;
    justify-content: center;
}
.module-icon img { width: 100%; height: 100%; object-fit: cover; }
.module-info { flex: 1; }
.module-title { font-size: 1.8rem; font-weight: 700; color: #fff; letter-spacing: -0.5px; margin-bottom: 8px; }
.module-desc { font-size: 0.95rem; color: #a0a0b0; }
.module-count {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-shrink: 0;
}
.btn-pdf {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: transform 0.2s;
}
.btn-pdf:hover { transform: scale(1.05); }
.module-count i {
    color: #4a4a5a;
    font-size: 1.4rem;
    transition: all 0.2s;
}
.module-card:hover .module-count i {
    color: #A78BFA;
    transform: translateX(8px);
}

/* BOTÓN VOLVER */
.back-to-home { text-align: center; margin: 48px 0 32px; }
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    background: transparent;
    border: 1.5px solid rgba(167,139,250,0.4);
    border-radius: 80px;
    padding: 16px 40px;
    font-size: 1rem;
    font-weight: 600;
    color: #e0e0e0;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-back:hover { background: rgba(167,139,250,0.1); border-color: #A78BFA; color: #A78BFA; transform: translateY(-3px); }

/* FOOTER */
.bbn-dash-footer { text-align: center; padding: 40px 0 20px; border-top: 1px solid rgba(167,139,250,0.1); margin-top: 24px; }
.bbn-dash-footer p { font-size: 0.85rem; color: #808090; }
.tech-stack { margin-top: 10px; font-size: 0.75rem !important; font-family: monospace; color: #606070; }

/* MODAL OSCURO */
.module-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.8);
    backdrop-filter: blur(8px);
    justify-content: center;
    align-items: center;
}
.module-modal-content {
    background: #1e1e2a;
    border-radius: 36px;
    width: 90%;
    max-width: 720px;
    max-height: 85vh;
    overflow-y: auto;
    border: 1px solid rgba(167,139,250,0.3);
    animation: modalFadeIn 0.3s ease;
}
@keyframes modalFadeIn {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}
.module-modal-header {
    padding: 28px 32px;
    border-bottom: 1px solid rgba(167,139,250,0.2);
    display: flex;
    align-items: center;
    gap: 20px;
}
.modal-icon {
    width: 60px; height: 60px;
    background: #2a2a30;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: #A78BFA;
    border: 1px solid rgba(167,139,250,0.2);
}
.module-modal-header h2 { flex: 1; font-size: 1.8rem; font-weight: 700; color: #f0f0f0; }
.modal-close { background: none; border: none; font-size: 2.2rem; cursor: pointer; color: #9CA3AF; }
.modal-close:hover { color: #ef4444; transform: scale(1.1); }
.module-modal-body { padding: 32px; }
.module-modal-body p { font-size: 1rem; color: #d0d0e0; line-height: 1.6; margin-bottom: 28px; }
.modal-stats { background: #2a2a30; border-radius: 24px; padding: 24px; margin-bottom: 28px; display: flex; justify-content: center; border: 1px solid rgba(167,139,250,0.1); }
.stat-label-modal { display: block; font-size: 0.85rem; color: #a0a0b0; margin-bottom: 10px; }
.stat-value-modal { font-size: 2.5rem; font-weight: 800; color: #A78BFA; font-family: monospace; }
.modal-preview h4 { font-size: 1.1rem; font-weight: 600; color: #f0f0f0; margin-bottom: 20px; }
.preview-table-container { overflow-x: auto; }
.preview-table { width: 100%; border-collapse: collapse; background: #2a2a30; border-radius: 20px; overflow: hidden; }
.preview-table th { text-align: left; padding: 14px 18px; background: #1e1e2a; color: #A78BFA; font-weight: 600; font-size: 0.85rem; }
.preview-table td { padding: 12px 18px; border-bottom: 1px solid #1e1e2a; color: #d0d0e0; font-size: 0.9rem; }
.module-modal-footer { padding: 24px 32px 32px; display: flex; justify-content: flex-end; gap: 20px; }
.btn-secondary {
    background: transparent;
    border: 1px solid rgba(167,139,250,0.4);
    border-radius: 80px;
    padding: 12px 28px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #e0e0e0;
    cursor: pointer;
}
.btn-secondary:hover { background: rgba(167,139,250,0.1); border-color: #A78BFA; color: #A78BFA; }
.btn-primary-modal {
    background: linear-gradient(135deg, #A78BFA, #8B5CF6);
    border: none;
    border-radius: 80px;
    padding: 12px 32px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #FFFFFF;
    text-decoration: none;
    cursor: pointer;
}
.btn-primary-modal:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(167,139,250,0.4); }
.text-center { text-align: center; }

/* CHATBOT OSCURO */
.chatbot-float {
    position: fixed;
    bottom: 32px;
    right: 32px;
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #A78BFA, #8B5CF6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 1000;
    box-shadow: 0 8px 20px rgba(167,139,250,0.4);
    transition: transform 0.2s ease;
}
.chatbot-float:hover { transform: scale(1.08); }
.chatbot-float i { font-size: 2rem; color: #FFFFFF; }
.chatbot-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(167,139,250,0.4);
    border-radius: 50%;
    animation: pulse 2s infinite;
    z-index: -1;
}
@keyframes pulse {
    0% { transform: scale(1); opacity: 0.6; }
    70% { transform: scale(1.3); opacity: 0; }
    100% { transform: scale(1.3); opacity: 0; }
}
.chatbot-modal {
    position: fixed;
    bottom: 115px;
    right: 32px;
    width: 400px;
    height: 580px;
    background: #1e1e2a;
    border-radius: 28px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    z-index: 1001;
    display: none;
    flex-direction: column;
    overflow: hidden;
    border: 1px solid rgba(167,139,250,0.3);
    animation: fadeInUp 0.3s ease;
}
.chatbot-modal.show { display: flex; }
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
.chatbot-modal-header {
    background: linear-gradient(135deg, #A78BFA, #8B5CF6);
    padding: 20px 24px;
    display: flex;
    justify-content: space-between;
    color: #FFFFFF;
}
.chatbot-header-info { display: flex; align-items: center; gap: 14px; }
.chatbot-header-info i { font-size: 1.8rem; color: #FFFFFF; }
.chatbot-close { background: none; border: none; color: #FFFFFF; font-size: 2rem; cursor: pointer; }
.chatbot-close:hover { color: #1A1A1A; }
.chatbot-messages { flex: 1; overflow-y: auto; padding: 24px; background: #16161a; display: flex; flex-direction: column; gap: 16px; }
.message { display: flex; gap: 12px; }
.message.user { flex-direction: row-reverse; }
.message-avatar {
    width: 36px; height: 36px;
    background: linear-gradient(135deg, #A78BFA, #8B5CF6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
}
.message.user .message-avatar { background: #10b981; }
.message-content {
    max-width: 75%;
    padding: 12px 16px;
    background: #2a2a30;
    border-radius: 22px;
    font-size: 0.9rem;
    color: #f0f0f0;
    border: 1px solid #3a3a40;
}
.message.user .message-content { background: linear-gradient(135deg, #A78BFA, #8B5CF6); color: #FFFFFF; border: none; }
.typing-indicator { display: flex; gap: 5px; padding: 12px 16px; background: #2a2a30; border-radius: 22px; width: fit-content; border: 1px solid #3a3a40; }
.typing-indicator span { width: 8px; height: 8px; background: #A78BFA; border-radius: 50%; animation: typing 1.4s infinite; }
@keyframes typing {
    0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
    30% { transform: translateY(-6px); opacity: 1; }
}
.chatbot-input-area { display: flex; padding: 18px; background: #16161a; border-top: 1px solid #2a2a30; gap: 12px; }
.chatbot-input-area input {
    flex: 1;
    padding: 14px 18px;
    border: 1px solid #3a3a40;
    border-radius: 40px;
    font-size: 0.9rem;
    outline: none;
    background: #2a2a30;
    color: #f0f0f0;
}
.chatbot-input-area input:focus { border-color: #A78BFA; }
.chatbot-input-area button {
    width: 50px; height: 50px;
    background: #A78BFA;
    border: none;
    border-radius: 50%;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 1.2rem;
}
.chatbot-input-area button:hover { background: #8B5CF6; }

/* RESPONSIVE */
@media (max-width: 1300px) {
    .stats-grid { gap: 24px; }
    .stat-number { font-size: 2.8rem; }
    .stat-icon { width: 75px; height: 75px; }
    .module-icon { width: 70px; height: 70px; }
    .module-title { font-size: 1.5rem; }
    .module-card-inner { padding: 28px 36px; gap: 24px; }
    .bbn-dash-body { padding: 40px; }
    .main-title { font-size: 3rem; }
    .title-accent { font-size: 2.2rem; }
    .hero-section { margin-bottom: 48px; }
}
@media (max-width: 1100px) {
    .two-columns { grid-template-columns: 1fr; }
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .chart-container { height: 380px; }
}
@media (max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr; }
    .bbn-dash-top { padding: 16px 24px; flex-direction: column; gap: 16px; }
    .bbn-dash-top-right { width: 100%; justify-content: center; }
    .bbn-dash-body { padding: 24px; }
    .module-card-inner { flex-wrap: wrap; justify-content: center; text-align: center; gap: 20px; }
    .module-info { text-align: center; }
    .main-title { font-size: 2.2rem; }
    .title-accent { font-size: 1.8rem; }
    .welcome-message-giant p { font-size: 1rem; }
    .chart-container { height: 280px; }
    .chatbot-float { width: 60px; height: 60px; bottom: 20px; right: 20px; }
    .chatbot-float i { font-size: 1.6rem; }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out-quad' });

    const modulePreviews = {
        alumnos: [{ id: 1, nombre: "Ana García Gómez", estado: "Activo" }, { id: 2, nombre: "Carlos López Pérez", estado: "Activo" }],
        cursos: [{ id: 1, nombre: "Matemáticas I", estado: "Activo" }, { id: 2, nombre: "Programación I", estado: "Activo" }],
        matriculas: [{ id: 1, nombre: "Ana García - Matemáticas", estado: "Confirmada" }, { id: 2, nombre: "Carlos López - Programación", estado: "Confirmada" }],
        docentes: [{ id: 1, nombre: "Dr. Roberto Sánchez", estado: "Activo" }, { id: 2, nombre: "Mg. Elena Torres", estado: "Activo" }],
        horarios: [{ id: 1, nombre: "Matemáticas - Lun 8am", estado: "Activo" }, { id: 2, nombre: "Programación - Mar 10am", estado: "Activo" }],
        aulas: [{ id: 1, nombre: "Aula 101 - Capacidad 30", estado: "Disponible" }, { id: 2, nombre: "Aula 102 - Capacidad 25", estado: "Disponible" }]
    };

    const modal = document.getElementById('moduleModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const modalCount = document.getElementById('modalCount');
    const modalIcon = document.getElementById('modalIcon');
    const previewTableBody = document.querySelector('#previewTable tbody');
    const goToModuleBtn = document.getElementById('goToModuleBtn');
    let currentRoute = '';

    document.querySelectorAll('.module-card').forEach(card => {
        card.addEventListener('click', (e) => {
            if (e.target.closest('.module-count')) return;
            const title = card.dataset.title;
            const description = card.dataset.desc;
            const count = card.dataset.count;
            const route = card.dataset.route;
            const module = card.dataset.module;
            currentRoute = route;
            modalTitle.textContent = title;
            modalDescription.textContent = description;
            modalCount.textContent = count;
            const iconMap = { alumnos: 'user-graduate', cursos: 'book-open', matriculas: 'id-card', docentes: 'chalkboard-user', horarios: 'calendar-week', aulas: 'door-open' };
            modalIcon.innerHTML = `<i class="fas fa-${iconMap[module] || 'info-circle'}"></i>`;
            const previewData = modulePreviews[module] || modulePreviews.alumnos;
            previewTableBody.innerHTML = '';
            previewData.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${item.id}</td><td>${item.nombre}</td><td><span class="course-badge" style="background: ${item.estado === 'Activo' || item.estado === 'Confirmada' ? 'rgba(16,185,129,0.15)' : 'rgba(239,68,68,0.15)'}">${item.estado}</span></td>`;
                previewTableBody.appendChild(row);
            });
            goToModuleBtn.href = route;
            modal.style.display = 'flex';
        });
    });

    function closeModal() { modal.style.display = 'none'; }
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('cancelModalBtn').addEventListener('click', closeModal);
    window.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('coursesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: { labels: @json($cursosLabels), datasets: [{ label: 'Alumnos matriculados', data: @json($cursosData), backgroundColor: '#A78BFA', borderRadius: 14, barPercentage: 0.65 }] },
            options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'top', labels: { color: '#c0c0d0' } } }, scales: { y: { grid: { color: '#2a2a30' }, title: { display: true, text: 'Cantidad de alumnos', color: '#a0a0b0' }, ticks: { stepSize: 1, color: '#a0a0b0' } }, x: { ticks: { color: '#c0c0d0' }, title: { display: true, text: 'Cursos', color: '#a0a0b0' } } } }
        });
        const tips = ["La planificación anticipada de horarios reduce conflictos en un 40%", "Matricular alumnos temprano ayuda a equilibrar la carga docente", "Actualizar los datos de contacto de los alumnos es clave", "Un curso con más de 30 alumnos puede requerir un asistente", "Los reportes de rendimiento académico ayudan a identificar estudiantes en riesgo"];
        document.getElementById('tipText').innerText = tips[Math.floor(Math.random() * tips.length)];
    });
</script>

<!-- CHATBOT -->
<div class="chatbot-float" id="chatbotFloat"><i class="fas fa-robot"></i><div class="chatbot-pulse"></div></div>
<div class="chatbot-modal" id="chatbotModal">
    <div class="chatbot-modal-header"><div class="chatbot-header-info"><i class="fas fa-robot"></i><div><h4>Asistente Blue Butterfly</h4><p>Responde tus dudas</p></div></div><button class="chatbot-close" id="chatbotClose">&times;</button></div>
    <div class="chatbot-messages" id="chatbotMessages"><div class="message bot"><div class="message-avatar"><i class="fas fa-robot"></i></div><div class="message-content">¡Hola! Soy el asistente virtual de Blue Butterfly.<br>¿En qué puedo ayudarte?</div></div></div>
    <div class="chatbot-input-area"><input type="text" id="chatbotInput" placeholder="Escribe tu mensaje..."><button id="chatbotSendBtn"><i class="fas fa-paper-plane"></i></button></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const floatBtn = document.getElementById('chatbotFloat');
        const modalChat = document.getElementById('chatbotModal');
        const closeBtn = document.getElementById('chatbotClose');
        const sendBtn = document.getElementById('chatbotSendBtn');
        const input = document.getElementById('chatbotInput');
        const messages = document.getElementById('chatbotMessages');
        function toggleModal() { modalChat.classList.toggle('show'); if (modalChat.classList.contains('show')) input.focus(); }
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
            try {
                const response = await fetch('/chatbot/send', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                    body: JSON.stringify({ message })
                });
                const data = await response.json();
                removeTyping();
                addMessage(data.bot, false);
            } catch(error) { removeTyping(); addMessage('Lo siento, hubo un error. Intenta de nuevo.', false); }
        }
        sendBtn.addEventListener('click', sendMessage);
        input.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });
    });
</script>
@endsection