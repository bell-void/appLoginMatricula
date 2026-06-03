@extends('layouts.app')

@section('content')
<div class="bbn-dash">

    <!-- TOPBAR ELEGANTE -->
    <div class="bbn-dash-top">
        <div class="bbn-dash-top-left">
            <div class="brand-mini">
                <i class="fas fa-butterfly"></i>
                <span>Blue Butterfly</span>
            </div>
        </div>
        <div class="bbn-dash-top-right">
            <div class="bbn-dash-user">
                <div class="bbn-dash-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <div class="user-info">
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

    <div class="bbn-dash-body">

        <!-- HERO SECTION - GIGANTE -->
        <div class="hero-section" data-aos="fade-up" data-aos-duration="1000">
            <div class="hero-badge">
                <span class="badge">Panel de Control</span>
            </div>
            <h1 class="main-title">Blue Butterfly</h1>
            <p class="main-sub">Sistema de Gestión Académica</p>
            <div class="welcome-message-giant">
                <p>Bienvenido de nuevo, <strong>{{ explode(' ', Auth::user()->name)[0] }}</strong></p>
                <span class="date-info">Semestre Académico 2025-I · {{ now()->format('d/m/Y') }}</span>
            </div>
        </div>

        <!-- TARJETAS DE ESTADÍSTICAS - CON IMÁGENES -->
        <div class="stats-grid" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/alumnos_activos.png') }}" alt="Alumnos Activos" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=A'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">6</div>
                    <div class="stat-label">Alumnos Activos</div>
                    <div class="stat-trend"><i class="fas fa-arrow-up"></i> +12% este mes</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/cursos_activos.png') }}" alt="Cursos Activos" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=C'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Cursos Activos</div>
                    <div class="stat-trend"><i class="fas fa-chart-line"></i> En progreso</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/docentes1.png') }}" alt="Docentes" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=D'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Docentes</div>
                    <div class="stat-trend"><i class="fas fa-user-plus"></i> Cuerpo académico</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('images/matricula1.png') }}" alt="Matrículas" onerror="this.src='https://placehold.co/90x90/A78BFA/white?text=M'">
                </div>
                <div class="stat-info">
                    <div class="stat-number">4</div>
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

        <!-- ÚLTIMAS MATRÍCULAS Y ACTIVIDAD RECIENTE -->
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
                            @forelse($ultimasMatriculas as $matricula)
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
                            <tr>
                                <td colspan="3" class="text-center">No hay matrículas registradas</td>
                            </tr>
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

        <!-- MÓDULOS DE GESTIÓN - TARJETAS ENORMES CON IMAGEN -->
        <div class="modules-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <div class="modules-header">
                <h3>Módulos de Gestión</h3>
                <p>Haz clic en cualquier tarjeta para ver información detallada</p>
            </div>
            <div class="modules-grid">
                <!-- Alumnos -->
                <div class="module-card" data-module="alumnos" data-route="{{ route('alumnos.index') }}" data-title="Alumnos" data-desc="Gestión completa de estudiantes. Permite registrar, editar, eliminar y consultar el historial académico de cada alumno." data-count="6">
                    <div class="module-card-inner">
                        <div class="module-icon">
                            <img src="{{ asset('images/alumnos.png') }}" alt="Alumnos" onerror="this.src='https://placehold.co/85x85/A78BFA/white?text=A'">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">Alumnos</h3>
                            <p class="module-desc">Gestión completa de estudiantes</p>
                        </div>
                        <div class="module-count">
                            <span class="count-number">6</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Cursos -->
                <div class="module-card" data-module="cursos" data-route="{{ route('cursos.index') }}" data-title="Cursos" data-desc="Catálogo académico completo. Administra toda la oferta educativa, incluyendo nombre del curso, créditos, descripción y docentes." data-count="3">
                    <div class="module-card-inner">
                        <div class="module-icon">
                            <img src="{{ asset('images/cursos.png') }}" alt="Cursos" onerror="this.src='https://placehold.co/85x85/A78BFA/white?text=C'">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">Cursos</h3>
                            <p class="module-desc">Catálogo académico</p>
                        </div>
                        <div class="module-count">
                            <span class="count-number">3</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Matrículas -->
                <div class="module-card" data-module="matriculas" data-route="{{ route('matriculas.index') }}" data-title="Matrículas" data-desc="Control central de inscripciones. Registra qué alumnos están matriculados en qué cursos." data-count="4">
                    <div class="module-card-inner">
                        <div class="module-icon">
                            <img src="{{ asset('images/matricula.png') }}" alt="Matrículas" onerror="this.src='https://placehold.co/85x85/A78BFA/white?text=M'">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">Matrículas</h3>
                            <p class="module-desc">Control de inscripciones</p>
                        </div>
                        <div class="module-count">
                            <span class="count-number">4</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Docentes -->
                <div class="module-card" data-module="docentes" data-route="{{ route('docentes.index') }}" data-title="Docentes" data-desc="Gestión del personal académico. Registra información de profesores, especialidades y cursos asignados." data-count="3">
                    <div class="module-card-inner">
                        <div class="module-icon">
                            <img src="{{ asset('images/docentes.png') }}" alt="Docentes" onerror="this.src='https://placehold.co/85x85/A78BFA/white?text=D'">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">Docentes</h3>
                            <p class="module-desc">Personal académico</p>
                        </div>
                        <div class="module-count">
                            <span class="count-number">3</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Horarios -->
                <div class="module-card" data-module="horarios" data-route="{{ route('horarios.index') }}" data-title="Horarios" data-desc="Programación académica completa. Define días, horas, aulas y docentes para cada curso." data-count="3">
                    <div class="module-card-inner">
                        <div class="module-icon">
                            <img src="{{ asset('images/horarios.png') }}" alt="Horarios" onerror="this.src='https://placehold.co/85x85/A78BFA/white?text=H'">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">Horarios</h3>
                            <p class="module-desc">Programación académica</p>
                        </div>
                        <div class="module-count">
                            <span class="count-number">3</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Aulas -->
                <div class="module-card" data-module="aulas" data-route="{{ route('aulas.index') }}" data-title="Aulas" data-desc="Gestión de espacios educativos. Administra disponibilidad, capacidad y equipamiento." data-count="3">
                    <div class="module-card-inner">
                        <div class="module-icon">
                            <img src="{{ asset('images/aulas.png') }}" alt="Aulas" onerror="this.src='https://placehold.co/85x85/A78BFA/white?text=A'">
                        </div>
                        <div class="module-info">
                            <h3 class="module-title">Aulas</h3>
                            <p class="module-desc">Espacios educativos</p>
                        </div>
                        <div class="module-count">
                            <span class="count-number">3</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
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
            <div class="modal-icon" id="modalIcon">
                <i class="fas fa-info-circle"></i>
            </div>
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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ejemplo de registro</td>
                                <td>Activo</td>
                            </tr>
                        </tbody>
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
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

* { margin: 0; padding: 0; box-sizing: border-box; }

.bbn-dash {
    font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    background: #FFFFFF;
    min-height: 100vh;
}

/* TOPBAR */
.bbn-dash-top {
    background: #FFFFFF;
    border-bottom: 1px solid rgba(167,139,250,0.2);
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
    color: #1A1A1A;
}
.brand-mini i {
    color: #A78BFA;
    font-size: 1.6rem;
}

.bbn-dash-top-right {
    display: flex;
    align-items: center;
    gap: 28px;
}

.bbn-dash-user {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #F8F8F8;
    padding: 8px 24px 8px 14px;
    border-radius: 80px;
    border: 1px solid rgba(167,139,250,0.2);
    transition: all 0.2s;
}
.bbn-dash-user:hover { background: #F0F0F0; border-color: rgba(167,139,250,0.4); }

.bbn-dash-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #A78BFA, #8B5CF6);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 700;
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(167,139,250,0.3);
}

.user-info { display: flex; flex-direction: column; }
.bbn-dash-uname { font-size: 15px; font-weight: 700; color: #1A1A1A; }
.bbn-dash-urole { font-size: 12px; color: #A78BFA; font-weight: 600; }

.bbn-dash-logout {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 24px;
    background: rgba(220,38,38,0.05);
    border: 1px solid rgba(220,38,38,0.15);
    border-radius: 80px;
    font-size: 14px;
    font-weight: 600;
    color: #dc2626;
    text-decoration: none;
    transition: all 0.2s;
}
.bbn-dash-logout:hover { background: #dc2626; color: white; transform: translateY(-2px); }

.bbn-dash-body { padding: 56px 64px; max-width: 1600px; margin: 0 auto; }

/* HERO - GIGANTE */
.hero-section { text-align: center; margin-bottom: 64px; }
.hero-badge { margin-bottom: 24px; }
.badge {
    display: inline-block;
    background: #F5F0FF;
    color: #A78BFA;
    font-size: 0.85rem;
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 60px;
    border: 1px solid rgba(167,139,250,0.3);
}
.main-title {
    font-size: 6rem;
    font-weight: 800;
    letter-spacing: -2px;
    background: linear-gradient(135deg, #1A1A1A, #A78BFA, #8B5CF6);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 16px;
}
.main-sub { font-size: 1.2rem; color: #6B7280; letter-spacing: 4px; font-weight: 500; }
.welcome-message-giant { margin-top: 32px; }
.welcome-message-giant p { font-size: 2rem; font-weight: 600; color: #1A1A1A; margin-bottom: 12px; }
.welcome-message-giant strong { color: #A78BFA; font-weight: 800; font-size: 2.2rem; }
.date-info { font-size: 0.9rem; color: #6B7280; display: inline-block; margin-top: 8px; padding: 6px 16px; background: #F8F8F8; border-radius: 40px; }

/* ESTADÍSTICAS - ENORMES */
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px; margin-bottom: 64px; }
.stat-card {
    background: #F8F8F8;
    border-radius: 32px;
    padding: 36px 32px;
    display: flex;
    align-items: center;
    gap: 24px;
    transition: all 0.35s ease;
    border: 1px solid rgba(167,139,250,0.15);
}
.stat-card:hover { transform: translateY(-6px); border-color: rgba(167,139,250,0.4); box-shadow: 0 25px 40px -18px rgba(167,139,250,0.2); }
.stat-icon {
    width: 90px;
    height: 90px;
    background: #FFFFFF;
    border-radius: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.stat-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.stat-info { flex: 1; }
.stat-number { font-size: 3.5rem; font-weight: 800; color: #1A1A1A; font-family: monospace; letter-spacing: -2px; }
.stat-label { font-size: 1rem; color: #6B7280; font-weight: 500; margin-top: 8px; }
.stat-trend { font-size: 0.8rem; color: #10b981; margin-top: 10px; display: flex; align-items: center; gap: 6px; }

/* GRÁFICO */
.chart-section {
    background: #F8F8F8;
    border-radius: 32px;
    padding: 40px;
    margin-bottom: 64px;
    border: 1px solid rgba(167,139,250,0.15);
    transition: all 0.3s;
}
.chart-section:hover { border-color: rgba(167,139,250,0.3); box-shadow: 0 12px 30px -12px rgba(167,139,250,0.1); }
.section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; flex-wrap: wrap; gap: 20px; }
.section-title { font-size: 1.6rem; font-weight: 700; color: #1A1A1A; }
.section-subtitle { font-size: 0.9rem; color: #6B7280; margin-top: 8px; }
.badge-info { background: #FFFFFF; padding: 10px 22px; border-radius: 60px; font-size: 0.85rem; font-weight: 500; color: #A78BFA; border: 1px solid rgba(167,139,250,0.3); }
.chart-container { position: relative; width: 100%; height: 460px; }

/* DOS COLUMNAS */
.two-columns { display: grid; grid-template-columns: 1.8fr 1fr; gap: 32px; margin-bottom: 64px; }
.recent-matriculas-section {
    background: #F8F8F8;
    border-radius: 32px;
    padding: 32px;
    border: 1px solid rgba(167,139,250,0.15);
    transition: all 0.3s;
}
.recent-matriculas-section:hover { border-color: rgba(167,139,250,0.3); box-shadow: 0 12px 30px -12px rgba(167,139,250,0.1); }
.section-header-sm { display: flex; align-items: center; gap: 18px; margin-bottom: 28px; }
.header-icon {
    width: 56px;
    height: 56px;
    background: #FFFFFF;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.header-icon-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.section-header-sm h4 { font-size: 1.4rem; font-weight: 700; color: #1A1A1A; }
.section-header-sm p { font-size: 0.85rem; color: #6B7280; }
.table-responsive { overflow-x: auto; }
.recent-table { width: 100%; border-collapse: collapse; }
.recent-table th { text-align: left; padding: 18px 16px; background: #FFFFFF; color: #A78BFA; font-weight: 600; font-size: 0.9rem; border-radius: 16px; }
.recent-table td { padding: 16px; border-bottom: 1px solid #E5E7EB; color: #4B5563; font-size: 0.95rem; }
.recent-table tr:hover td { background: #FFFFFF; }
.user-cell { display: flex; align-items: center; gap: 14px; }
.user-avatar-sm { width: 44px; height: 44px; background: linear-gradient(135deg, #F5F0FF, #EDE9FE); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: #A78BFA; }
.course-badge { background: #FFFFFF; padding: 8px 18px; border-radius: 30px; font-size: 0.85rem; font-weight: 500; color: #4B5563; border: 1px solid rgba(167,139,250,0.2); }

/* TARJETA CONSEJO */
.tip-card {
    background: linear-gradient(135deg, #F5F0FF, #FFFFFF);
    border-radius: 32px;
    padding: 40px 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 24px;
    border: 1px solid rgba(167,139,250,0.2);
    transition: all 0.3s;
}
.tip-card:hover { transform: translateY(-6px); border-color: rgba(167,139,250,0.4); box-shadow: 0 25px 40px -18px rgba(167,139,250,0.2); }
.tip-icon { width: 90px; height: 90px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 50%; }
.tip-icon-img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
.tip-content h4 { font-size: 1.4rem; font-weight: 700; color: #1A1A1A; margin-bottom: 16px; }
.tip-content p { font-size: 1rem; color: #4B5563; line-height: 1.6; }

/* MÓDULOS - TARJETAS ENORMES */
.modules-section { margin-bottom: 64px; }
.modules-header { text-align: center; margin-bottom: 48px; }
.modules-header h3 { font-size: 2.2rem; font-weight: 700; color: #1A1A1A; margin-bottom: 12px; }
.modules-header p { color: #6B7280; font-size: 1rem; }

.modules-grid {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.module-card {
    background: #F8F8F8;
    border-radius: 28px;
    border: 1px solid rgba(167,139,250,0.15);
    cursor: pointer;
    transition: all 0.35s ease;
}

.module-card:hover {
    transform: translateX(12px) translateY(-4px);
    border-color: rgba(167,139,250,0.45);
    box-shadow: 0 25px 40px -18px rgba(167,139,250,0.25);
    background: #FFFFFF;
}

.module-card-inner {
    display: flex;
    align-items: center;
    gap: 28px;
    padding: 32px 42px;
}

.module-icon {
    width: 85px;
    height: 85px;
    flex-shrink: 0;
    border-radius: 24px;
    overflow: hidden;
    background: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
}

.module-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.module-info {
    flex: 1;
}

.module-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1A1A1A;
    letter-spacing: -0.5px;
    margin-bottom: 8px;
}

.module-desc {
    font-size: 0.95rem;
    color: #6B7280;
}

.module-count {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-shrink: 0;
}

.count-number {
    font-size: 2.8rem;
    font-weight: 800;
    color: #A78BFA;
    font-family: monospace;
}

.module-count i {
    color: #D1D5DB;
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
    border: 1.5px solid rgba(167,139,250,0.3);
    border-radius: 80px;
    padding: 16px 40px;
    font-size: 1rem;
    font-weight: 600;
    color: #4B5563;
    text-decoration: none;
    transition: all 0.25s;
}
.btn-back:hover { background: rgba(167,139,250,0.05); border-color: rgba(167,139,250,0.6); color: #A78BFA; transform: translateY(-3px); }

/* FOOTER */
.bbn-dash-footer { text-align: center; padding: 40px 0 20px; border-top: 1px solid rgba(167,139,250,0.1); margin-top: 24px; }
.bbn-dash-footer p { font-size: 0.85rem; color: #6B7280; }
.tech-stack { margin-top: 10px; font-size: 0.75rem !important; font-family: monospace; }

/* MODAL */
.module-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);
    backdrop-filter: blur(8px);
    justify-content: center;
    align-items: center;
}
.module-modal-content {
    background: #FFFFFF;
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
    border-bottom: 1px solid rgba(167,139,250,0.15);
    display: flex;
    align-items: center;
    gap: 20px;
}
.modal-icon {
    width: 60px;
    height: 60px;
    background: #F5F0FF;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: #A78BFA;
    border: 1px solid rgba(167,139,250,0.2);
}
.module-modal-header h2 { flex: 1; font-size: 1.8rem; font-weight: 700; color: #1A1A1A; }
.modal-close { background: none; border: none; font-size: 2.2rem; cursor: pointer; color: #9CA3AF; transition: all 0.2s; }
.modal-close:hover { color: #ef4444; transform: scale(1.1); }
.module-modal-body { padding: 32px; }
.module-modal-body p { font-size: 1rem; color: #4B5563; line-height: 1.6; margin-bottom: 28px; }
.modal-stats { background: #F8F8F8; border-radius: 24px; padding: 24px; margin-bottom: 28px; display: flex; justify-content: center; border: 1px solid rgba(167,139,250,0.1); }
.stat-item { text-align: center; }
.stat-label-modal { display: block; font-size: 0.85rem; color: #6B7280; margin-bottom: 10px; }
.stat-value-modal { font-size: 2.5rem; font-weight: 800; color: #A78BFA; font-family: monospace; }
.modal-preview h4 { font-size: 1.1rem; font-weight: 600; color: #1A1A1A; margin-bottom: 20px; }
.preview-table-container { overflow-x: auto; }
.preview-table { width: 100%; border-collapse: collapse; background: #F8F8F8; border-radius: 20px; overflow: hidden; }
.preview-table th { text-align: left; padding: 14px 18px; background: #FFFFFF; color: #A78BFA; font-weight: 600; font-size: 0.85rem; }
.preview-table td { padding: 12px 18px; border-bottom: 1px solid #E5E7EB; color: #4B5563; font-size: 0.9rem; }
.module-modal-footer { padding: 24px 32px 32px; display: flex; justify-content: flex-end; gap: 20px; }
.btn-secondary {
    background: transparent;
    border: 1px solid rgba(167,139,250,0.3);
    border-radius: 80px;
    padding: 12px 28px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #4B5563;
    cursor: pointer;
    transition: all 0.2s;
}
.btn-secondary:hover { background: rgba(167,139,250,0.05); border-color: rgba(167,139,250,0.5); color: #A78BFA; }
.btn-primary-modal {
    background: linear-gradient(135deg, #A78BFA, #8B5CF6);
    border: none;
    border-radius: 80px;
    padding: 12px 32px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #FFFFFF;
    text-decoration: none;
    transition: all 0.2s;
    cursor: pointer;
}
.btn-primary-modal:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(167,139,250,0.4); }
.text-center { text-align: center; }

/* CHATBOT */
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
    background: #FFFFFF;
    border-radius: 28px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
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
    border-radius: 28px 28px 0 0;
}
.chatbot-header-info { display: flex; align-items: center; gap: 14px; }
.chatbot-header-info i { font-size: 1.8rem; color: #FFFFFF; }
.chatbot-close { background: none; border: none; color: #FFFFFF; font-size: 2rem; cursor: pointer; }
.chatbot-close:hover { color: #1A1A1A; }
.chatbot-messages { flex: 1; overflow-y: auto; padding: 24px; background: #F8F8F8; display: flex; flex-direction: column; gap: 16px; }
.message { display: flex; gap: 12px; animation: messageFade 0.3s ease; }
.message.user { flex-direction: row-reverse; }
.message-avatar { width: 36px; height: 36px; background: linear-gradient(135deg, #A78BFA, #8B5CF6); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FFFFFF; flex-shrink: 0; }
.message.user .message-avatar { background: #10b981; }
.message-content { max-width: 75%; padding: 12px 16px; background: #FFFFFF; border-radius: 22px; font-size: 0.9rem; color: #1A1A1A; border: 1px solid #E5E7EB; }
.message.user .message-content { background: linear-gradient(135deg, #A78BFA, #8B5CF6); color: #FFFFFF; border: none; }
.typing-indicator { display: flex; gap: 5px; padding: 12px 16px; background: #FFFFFF; border-radius: 22px; width: fit-content; border: 1px solid #E5E7EB; }
.typing-indicator span { width: 8px; height: 8px; background: #A78BFA; border-radius: 50%; animation: typing 1.4s infinite; }
@keyframes typing {
    0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
    30% { transform: translateY(-6px); opacity: 1; }
}
.chatbot-input-area { display: flex; padding: 18px; background: #FFFFFF; border-top: 1px solid #E5E7EB; gap: 12px; }
.chatbot-input-area input { flex: 1; padding: 14px 18px; border: 1px solid #E5E7EB; border-radius: 40px; font-size: 0.9rem; outline: none; background: #F8F8F8; color: #1A1A1A; }
.chatbot-input-area input:focus { border-color: #A78BFA; }
.chatbot-input-area button { width: 50px; height: 50px; background: #A78BFA; border: none; border-radius: 50%; color: #FFFFFF; cursor: pointer; font-size: 1.2rem; }
.chatbot-input-area button:hover { background: #8B5CF6; }

@media (max-width: 1300px) {
    .stats-grid { gap: 24px; }
    .stat-number { font-size: 2.8rem; }
    .stat-icon { width: 75px; height: 75px; }
    .module-icon { width: 70px; height: 70px; }
    .module-title { font-size: 1.5rem; }
    .count-number { font-size: 2.2rem; }
    .module-card-inner { padding: 28px 36px; gap: 24px; }
    .bbn-dash-body { padding: 40px; }
}
@media (max-width: 1100px) {
    .two-columns { grid-template-columns: 1fr; }
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .main-title { font-size: 4rem; }
    .welcome-message-giant p { font-size: 1.6rem; }
    .welcome-message-giant strong { font-size: 1.8rem; }
    .chart-container { height: 380px; }
}
@media (max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr; }
    .bbn-dash-top { padding: 16px 24px; flex-direction: column; gap: 16px; }
    .bbn-dash-top-right { width: 100%; justify-content: center; }
    .bbn-dash-body { padding: 24px; }
    .module-card-inner { flex-wrap: wrap; justify-content: center; text-align: center; gap: 20px; }
    .module-info { text-align: center; }
    .main-title { font-size: 3rem; }
    .welcome-message-giant p { font-size: 1.3rem; }
    .welcome-message-giant strong { font-size: 1.5rem; }
    .chart-container { height: 280px; }
    .chatbot-float { width: 60px; height: 60px; bottom: 20px; right: 20px; }
    .chatbot-float i { font-size: 1.6rem; }
}
</style>

<!-- Scripts -->
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
            options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'top', labels: { color: '#4B5563' } } }, scales: { y: { grid: { color: '#E5E7EB' }, title: { display: true, text: 'Cantidad de alumnos', color: '#6B7280' }, ticks: { stepSize: 1, color: '#6B7280' } }, x: { ticks: { color: '#4B5563' }, title: { display: true, text: 'Cursos', color: '#6B7280' } } } }
        });
        const tips = ["La planificación anticipada de horarios reduce conflictos en un 40%", "Matricular alumnos temprano ayuda a equilibrar la carga docente", "Actualizar los datos de contacto de los alumnos es clave para una comunicación efectiva", "Un curso con más de 30 alumnos puede requerir un asistente de docencia", "Los reportes de rendimiento académico ayudan a identificar estudiantes en riesgo"];
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