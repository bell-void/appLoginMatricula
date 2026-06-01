@extends('layouts.app')

@section('content')
<div class="bbn-dash">

    <!-- TOPBAR SIMPLE -->
    <div class="bbn-dash-top">
        <div class="bbn-dash-top-left"></div>
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

        <!-- Hero -->
        <div class="hero-title">
            <h1 class="main-title">Blue Butterfly</h1>
            <p class="main-sub">Sistema de Matrícula Académica</p>
        </div>

        <div class="welcome-message">
            <p>Bienvenido, <strong>{{ explode(' ', Auth::user()->name)[0] }}</strong><br>
            <span class="date-info">Panel de control · Semestre 2025-I · {{ now()->format('d/m/Y') }}</span></p>
        </div>

        <!-- TARJETAS DE ESTADÍSTICAS -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalAlumnos }}</div>
                    <div class="stat-label">Alumnos</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-book-open"></i></div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalCursos }}</div>
                    <div class="stat-label">Cursos</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-chalkboard-user"></i></div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalDocentes }}</div>
                    <div class="stat-label">Docentes</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-id-card"></i></div>
                <div class="stat-info">
                    <div class="stat-number">{{ $totalMatriculas }}</div>
                    <div class="stat-label">Matrículas</div>
                </div>
            </div>
        </div>

        <!-- GRÁFICO -->
        <div class="chart-section">
            <div class="chart-header">
                <h3 class="chart-title">Top 5 cursos con más matrículas</h3>
                <p class="chart-subtitle">Alumnos inscritos por curso este semestre</p>
            </div>
            <div class="chart-container">
                <canvas id="coursesChart"></canvas>
            </div>
        </div>

        <!-- TABLA ÚLTIMAS MATRÍCULAS -->
        <div class="recent-matriculas-section">
            <div class="section-header">
                <h3 class="section-title-sm">Últimas matrículas</h3>
                <p class="section-subtitle-sm">Registros recientes de inscripciones</p>
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
                            <td>{{ $matricula->alumno->nombre ?? '' }} {{ $matricula->alumno->apellido ?? '' }}</td>
                            <td>{{ $matricula->curso->nombre_curso ?? $matricula->curso->nombre ?? 'N/A' }}</td>
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

        <!-- SECCIÓN CONSEJO DEL DÍA -->
        <div class="tip-card">
            <div class="tip-icon">
                <i class="fas fa-lightbulb"></i>
            </div>
            <div class="tip-content">
                <h4>Consejo del día</h4>
                <p id="tipText">Cargando consejo...</p>
            </div>
        </div>

        <!-- MÓDULOS VERTICALES -->
        <div class="dashboard-list">
            <a href="{{ route('alumnos.index') }}" class="dashboard-card">
                <div class="card-left"><div class="card-icon"><i class="fas fa-user-graduate"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Alumnos</div>
                    <div class="card-desc">Gestión de estudiantes</div>
                </div>
                <div class="card-right">
                    <div class="card-count">{{ $totalAlumnos }}</div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="{{ route('cursos.index') }}" class="dashboard-card">
                <div class="card-left"><div class="card-icon"><i class="fas fa-book-open"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Cursos</div>
                    <div class="card-desc">Catálogo académico</div>
                </div>
                <div class="card-right">
                    <div class="card-count">{{ $totalCursos }}</div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="{{ route('matriculas.index') }}" class="dashboard-card">
                <div class="card-left"><div class="card-icon"><i class="fas fa-id-card"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Matrículas</div>
                    <div class="card-desc">Control de inscripciones</div>
                </div>
                <div class="card-right">
                    <div class="card-count">{{ $totalMatriculas }}</div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="{{ route('docentes.index') }}" class="dashboard-card">
                <div class="card-left"><div class="card-icon"><i class="fas fa-chalkboard-user"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Docentes</div>
                    <div class="card-desc">Personal académico</div>
                </div>
                <div class="card-right">
                    <div class="card-count">{{ $totalDocentes }}</div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="{{ route('horarios.index') }}" class="dashboard-card">
                <div class="card-left"><div class="card-icon"><i class="fas fa-calendar-week"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Horarios</div>
                    <div class="card-desc">Programación académica</div>
                </div>
                <div class="card-right">
                    <div class="card-count">{{ $totalHorarios ?? \App\Models\Horario::count() }}</div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="{{ route('aulas.index') }}" class="dashboard-card">
                <div class="card-left"><div class="card-icon"><i class="fas fa-door-open"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Aulas</div>
                    <div class="card-desc">Espacios educativos</div>
                </div>
                <div class="card-right">
                    <div class="card-count">{{ $totalAulas ?? \App\Models\Aula::count() }}</div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>
        </div>

        <!-- BOTÓN VOLVER A LA PÁGINA PRINCIPAL -->
        <div class="back-to-home">
            <a href="{{ url('/') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Volver a la página principal
            </a>
        </div>

        <div class="bbn-dash-footer">
            Blue Butterfly Network · Sistema de Matrícula © {{ date('Y') }} · Laravel {{ app()->version() }} · PHP {{ phpversion() }}
        </div>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.bbn-dash {
    font-family: 'Inter', sans-serif;
    background: #ffffff;
    min-height: 100vh;
}

/* TOPBAR SIMPLE */
.bbn-dash-top {
    background: #ffffff;
    border-bottom: 1px solid #e9d5ff;
    padding: 12px 32px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    position: sticky;
    top: 0;
    z-index: 50;
}

.bbn-dash-top-left {
    flex: 1;
}

.bbn-dash-top-right {
    display: flex;
    align-items: center;
    gap: 24px;
}

.bbn-dash-user {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #faf5ff;
    padding: 6px 16px 6px 10px;
    border-radius: 40px;
    border: 1px solid #f0e7ff;
    transition: all 0.2s;
}

.bbn-dash-user:hover {
    background: #f5f0ff;
    border-color: #e9d5ff;
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
    box-shadow: 0 2px 6px rgba(124,58,237,0.2);
}

.user-info {
    display: flex;
    flex-direction: column;
    line-height: 1.3;
}

.bbn-dash-uname {
    font-size: 13px;
    font-weight: 600;
    color: #111827;
}

.bbn-dash-urole {
    font-size: 10px;
    color: #7c3aed;
    font-weight: 500;
}

.bbn-dash-logout {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 18px;
    background: rgba(220, 38, 38, 0.08);
    border: 1px solid rgba(220, 38, 38, 0.2);
    border-radius: 40px;
    font-size: 12px;
    font-weight: 500;
    color: #dc2626;
    text-decoration: none;
    transition: all 0.2s;
}

.bbn-dash-logout:hover {
    background: #dc2626;
    color: white;
    border-color: #dc2626;
    transform: translateY(-1px);
}

/* BODY */
.bbn-dash-body {
    padding: 24px 28px;
    max-width: 1400px;
    margin: 0 auto;
    background: #ffffff;
}

/* TÍTULOS */
.hero-title {
    text-align: center;
    margin: 40px 0 30px;
}
.main-title {
    font-family: 'Space Mono', monospace;
    font-size: 5rem;
    font-weight: 700;
    letter-spacing: -1px;
    background: linear-gradient(135deg, #111827, #7c3aed);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 8px;
}
.main-sub {
    font-family: 'Space Mono', monospace;
    font-size: 1rem;
    color: #6b7280;
    letter-spacing: 2px;
}

.welcome-message {
    text-align: center;
    margin-bottom: 50px;
    font-family: 'Space Mono', monospace;
}
.welcome-message p {
    font-size: 1.2rem;
    color: #374151;
}
.welcome-message strong {
    color: #7c3aed;
    font-weight: 700;
}
.date-info {
    font-size: 0.8rem;
    color: #9ca3af;
    display: block;
    margin-top: 8px;
}

/* ESTADÍSTICAS */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-bottom: 40px;
}

.stat-card {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 24px;
    padding: 20px 16px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.25s;
    box-shadow: 0 2px 6px rgba(0,0,0,0.02);
}

.stat-card:hover {
    transform: translateY(-4px);
    border-color: #c4b5fd;
    box-shadow: 0 12px 20px -10px rgba(124, 58, 237, 0.12);
}

.stat-icon {
    font-size: 2.5rem;
    color: #7c3aed;
}

.stat-info {
    flex: 1;
}

.stat-number {
    font-size: 2.2rem;
    font-weight: 800;
    background: linear-gradient(135deg, #111827, #7c3aed);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-family: 'Space Mono', monospace;
    line-height: 1;
}

.stat-label {
    font-size: 0.9rem;
    color: #6b7280;
    font-weight: 500;
    margin-top: 6px;
}

/* GRÁFICO */
.chart-section {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 28px;
    padding: 24px;
    margin-bottom: 40px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    transition: all 0.25s;
}
.chart-section:hover {
    border-color: #c4b5fd;
    box-shadow: 0 12px 20px -10px rgba(124, 58, 237, 0.1);
}
.chart-header {
    text-align: center;
    margin-bottom: 24px;
}
.chart-title {
    font-family: 'Space Mono', monospace;
    font-size: 1.5rem;
    font-weight: 700;
    color: #111827;
}
.chart-subtitle {
    color: #6b7280;
    font-size: 0.9rem;
    margin-top: 4px;
}
.chart-container {
    position: relative;
    width: 100%;
    height: 400px;
}

/* ÚLTIMAS MATRÍCULAS */
.recent-matriculas-section {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 24px;
    padding: 24px;
    margin-bottom: 40px;
    transition: all 0.25s;
}
.recent-matriculas-section:hover {
    border-color: #c4b5fd;
    box-shadow: 0 12px 20px -10px rgba(124, 58, 237, 0.1);
}
.section-title-sm {
    font-family: 'Space Mono', monospace;
    font-size: 1.3rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 4px;
}
.section-subtitle-sm {
    color: #6b7280;
    font-size: 0.85rem;
    margin-bottom: 20px;
}
.table-responsive {
    overflow-x: auto;
}
.recent-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9rem;
}
.recent-table th {
    text-align: left;
    padding: 12px 8px;
    background-color: #faf5ff;
    color: #4c1d95;
    font-weight: 600;
    border-bottom: 1px solid #e9d5ff;
}
.recent-table td {
    padding: 12px 8px;
    border-bottom: 1px solid #f0e7ff;
    color: #374151;
}
.recent-table tr:hover td {
    background-color: #fefcff;
}
.text-center {
    text-align: center;
}

/* CONSEJO DEL DÍA */
.tip-card {
    background: linear-gradient(135deg, #faf5ff 0%, #ffffff 100%);
    border-radius: 24px;
    padding: 24px 28px;
    margin-bottom: 40px;
    display: flex;
    align-items: center;
    gap: 20px;
    border: 1px solid #f0e7ff;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.tip-card:hover {
    transform: translateY(-3px);
    border-color: #c4b5fd;
    box-shadow: 0 12px 24px -12px rgba(124, 58, 237, 0.15);
}
.tip-icon {
    font-size: 2.8rem;
    color: #f59e0b;
    background: rgba(245, 158, 11, 0.1);
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.2s;
}
.tip-card:hover .tip-icon {
    background: rgba(245, 158, 11, 0.2);
    transform: scale(1.05);
}
.tip-content {
    flex: 1;
}
.tip-content h4 {
    font-family: 'Space Mono', monospace;
    font-size: 1.2rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 6px;
}
.tip-content p {
    font-size: 1rem;
    color: #4b5563;
    line-height: 1.5;
}

/* MÓDULOS VERTICALES */
.dashboard-list {
    display: flex;
    flex-direction: column;
    gap: 24px;
    margin-bottom: 50px;
}

.dashboard-card {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 28px;
    padding: 28px 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    text-decoration: none;
    transition: all 0.3s ease;
    width: 100%;
}

.dashboard-card:hover {
    transform: translateY(-4px);
    border-color: #c4b5fd;
    box-shadow: 0 20px 30px -12px rgba(124, 58, 237, 0.15);
    background: #fefcff;
}

.card-left {
    margin-right: 24px;
}
.card-icon {
    font-size: 3rem;
    color: #7c3aed;
    transition: transform 0.2s;
}
.dashboard-card:hover .card-icon {
    transform: scale(1.05);
}

.card-center {
    flex: 1;
}
.card-title {
    font-family: 'Space Mono', monospace;
    font-size: 1.8rem;
    font-weight: 700;
    color: #111827;
    letter-spacing: -0.5px;
}
.card-desc {
    font-size: 0.95rem;
    color: #6b7280;
    font-family: 'Space Mono', monospace;
    margin-top: 4px;
}

.card-right {
    display: flex;
    align-items: center;
    gap: 20px;
}
.card-count {
    font-size: 2.2rem;
    font-weight: 800;
    background: linear-gradient(135deg, #111827, #7c3aed);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-family: 'Space Mono', monospace;
}
.card-arrow {
    color: #cbd5e1;
    font-size: 1.3rem;
    transition: transform 0.2s, color 0.2s;
}
.dashboard-card:hover .card-arrow {
    color: #7c3aed;
    transform: translateX(6px);
}

/* BOTÓN VOLVER */
.back-to-home {
    text-align: center;
    margin: 20px 0 30px;
}
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    border: 1px solid #e9d5ff;
    border-radius: 40px;
    padding: 12px 28px;
    font-size: 0.95rem;
    font-weight: 500;
    color: #111827;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-back:hover {
    background: #f5f3ff;
    border-color: #c4b5fd;
    color: #7c3aed;
    transform: translateY(-2px);
}

/* FOOTER */
.bbn-dash-footer {
    text-align: center;
    font-size: 0.75rem;
    color: #9ca3af;
    padding: 24px 0 16px;
    border-top: 1px solid #f0e7ff;
    margin-top: 20px;
    font-family: 'Space Mono', monospace;
}

/* RESPONSIVE */
@media (max-width: 1000px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
}
@media (max-width: 900px) {
    .bbn-dash-body {
        padding: 16px;
    }
    .main-title {
        font-size: 3.5rem;
    }
    .dashboard-card {
        padding: 20px;
    }
    .card-title {
        font-size: 1.4rem;
    }
    .card-count {
        font-size: 1.6rem;
    }
    .card-icon {
        font-size: 2.2rem;
    }
    .chart-container {
        height: 300px;
    }
    .chart-title {
        font-size: 1.2rem;
    }
}
@media (max-width: 600px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    .dashboard-card {
        flex-direction: column;
        text-align: center;
        gap: 16px;
    }
    .card-left {
        margin-right: 0;
    }
    .card-right {
        justify-content: center;
    }
    .main-title {
        font-size: 2.5rem;
    }
}
</style>

<!-- Script de Chart.js y consejos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gráfico de barras
        const ctx = document.getElementById('coursesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($cursosLabels),
                datasets: [{
                    label: 'Alumnos matriculados',
                    data: @json($cursosData),
                    backgroundColor: 'rgba(124, 58, 237, 0.7)',
                    borderColor: '#7c3aed',
                    borderWidth: 1.5,
                    borderRadius: 8,
                    barPercentage: 0.65,
                    categoryPercentage: 0.8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: { size: 12, family: "'Inter', sans-serif" },
                            color: '#374151'
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#f3f4f6',
                        bodyColor: '#cbd5e1',
                        padding: 10,
                        cornerRadius: 8,
                        titleFont: { size: 13 },
                        bodyFont: { size: 12 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#e9d5ff', drawBorder: true },
                        title: {
                            display: true,
                            text: 'Cantidad de alumnos',
                            color: '#6b7280',
                            font: { weight: 'bold', size: 12, family: "'Inter', sans-serif" }
                        },
                        ticks: { stepSize: 1, precision: 0, font: { size: 11 } }
                    },
                    x: {
                        grid: { display: false },
                        title: {
                            display: true,
                            text: 'Cursos',
                            color: '#6b7280',
                            font: { weight: 'bold', size: 12, family: "'Inter', sans-serif" }
                        },
                        ticks: { font: { size: 11, family: "'Inter', sans-serif" } }
                    }
                },
                layout: {
                    padding: { top: 10, bottom: 10, left: 10, right: 10 }
                }
            }
        });

        // Consejo del día aleatorio
        const tips = [
            "La planificación anticipada de horarios reduce conflictos en un 40%. Revisa los espacios disponibles antes de asignar nuevos cursos.",
            "Matricular alumnos temprano ayuda a equilibrar la carga docente. ¡Incentiva la matrícula anticipada!",
            "Actualizar los datos de contacto de los alumnos es clave para una comunicación efectiva. Revisa esta información cada semestre.",
            "Un curso con más de 30 alumnos puede requerir un asistente de docencia. Evalúa la relación alumno-docente.",
            "Los reportes de rendimiento académico ayudan a identificar estudiantes en riesgo. Revísalos periódicamente.",
            "Organizar los horarios con al menos dos semanas de anticipación evita cruces innecesarios. Usa el planificador integrado.",
            "La deserción se reduce cuando hay seguimiento personalizado. Implementa tutorías para alumnos con bajo rendimiento.",
            "Aprovecha los gráficos del dashboard para detectar tendencias. Un vistazo rápido puede darte grandes ideas.",
            "Recuerda que el sistema permite exportar datos a Excel. Úsalo para análisis más detallados fuera de la plataforma.",
            "Cada fin de mes, revisa las matrículas pendientes y contacta a los alumnos que aún no completan el proceso."
        ];
        document.getElementById('tipText').innerText = tips[Math.floor(Math.random() * tips.length)];
    });
</script>

@endsection