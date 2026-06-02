<?php $__env->startSection('content'); ?>
<div class="bbn-dash">

    <!-- TOPBAR SIMPLE -->
    <div class="bbn-dash-top">
        <div class="bbn-dash-top-left"></div>
        <div class="bbn-dash-top-right">
            <div class="bbn-dash-user">
                <div class="bbn-dash-avatar"><?php echo e(strtoupper(substr(Auth::user()->name, 0, 2))); ?></div>
                <div class="user-info">
                    <div class="bbn-dash-uname"><?php echo e(Auth::user()->name); ?></div>
                    <div class="bbn-dash-urole">Administrador</div>
                </div>
            </div>
            <a href="#" class="bbn-dash-logout"
               onclick="event.preventDefault(); document.getElementById('logout-dash').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
            <form id="logout-dash" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none;"><?php echo csrf_field(); ?></form>
        </div>
    </div>

    <div class="bbn-dash-body">

        <!-- Hero -->
        <div class="hero-title" data-aos="fade-up" data-aos-duration="800">
            <h1 class="main-title">Blue Butterfly</h1>
            <p class="main-sub">Sistema de Matrícula Académica</p>
        </div>

        <div class="welcome-message" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <p>Bienvenido, <strong><?php echo e(explode(' ', Auth::user()->name)[0]); ?></strong><br>
            <span class="date-info">Panel de control · Semestre 2025-I · <?php echo e(now()->format('d/m/Y')); ?></span></p>
        </div>

        <!-- TARJETAS DE ESTADÍSTICAS (más grandes) -->
        <div class="stats-grid" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                <div class="stat-info">
                    <div class="stat-number"><?php echo e($totalAlumnos); ?></div>
                    <div class="stat-label">Alumnos</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-book-open"></i></div>
                <div class="stat-info">
                    <div class="stat-number"><?php echo e($totalCursos); ?></div>
                    <div class="stat-label">Cursos</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-chalkboard-user"></i></div>
                <div class="stat-info">
                    <div class="stat-number"><?php echo e($totalDocentes); ?></div>
                    <div class="stat-label">Docentes</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-id-card"></i></div>
                <div class="stat-info">
                    <div class="stat-number"><?php echo e($totalMatriculas); ?></div>
                    <div class="stat-label">Matrículas</div>
                </div>
            </div>
        </div>

        <!-- GRÁFICO -->
        <div class="chart-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            <div class="chart-header">
                <h3 class="chart-title">Top 5 cursos con más matrículas</h3>
                <p class="chart-subtitle">Alumnos inscritos por curso este semestre</p>
            </div>
            <div class="chart-container">
                <canvas id="coursesChart"></canvas>
            </div>
        </div>

        <!-- TABLA ÚLTIMAS MATRÍCULAS -->
        <div class="recent-matriculas-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
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
                        <?php $__empty_1 = true; $__currentLoopData = $ultimasMatriculas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matricula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($matricula->alumno->nombre ?? ''); ?> <?php echo e($matricula->alumno->apellido ?? ''); ?></td>
                            <td><?php echo e($matricula->curso->nombre_curso ?? $matricula->curso->nombre ?? 'N/A'); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($matricula->fecha_matricula ?? $matricula->created_at)->format('d/m/Y')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-center">No hay matrículas registradas</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SECCIÓN CONSEJO DEL DÍA -->
        <div class="tip-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="500">
            <div class="tip-icon">
                <i class="fas fa-lightbulb"></i>
            </div>
            <div class="tip-content">
                <h4>Consejo del día</h4>
                <p id="tipText">Cargando consejo...</p>
            </div>
        </div>

        <!-- MÓDULOS VERTICALES (más grandes y con animación) -->
        <div class="dashboard-list" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
            <a href="<?php echo e(route('alumnos.index')); ?>" class="dashboard-card" data-aos="fade-right" data-aos-delay="100">
                <div class="card-left"><div class="card-icon"><i class="fas fa-user-graduate"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Alumnos</div>
                    <div class="card-desc">Gestión de estudiantes</div>
                </div>
                <div class="card-right">
                    <div class="card-count"><?php echo e($totalAlumnos); ?></div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="<?php echo e(route('cursos.index')); ?>" class="dashboard-card" data-aos="fade-right" data-aos-delay="150">
                <div class="card-left"><div class="card-icon"><i class="fas fa-book-open"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Cursos</div>
                    <div class="card-desc">Catálogo académico</div>
                </div>
                <div class="card-right">
                    <div class="card-count"><?php echo e($totalCursos); ?></div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="<?php echo e(route('matriculas.index')); ?>" class="dashboard-card" data-aos="fade-right" data-aos-delay="200">
                <div class="card-left"><div class="card-icon"><i class="fas fa-id-card"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Matrículas</div>
                    <div class="card-desc">Control de inscripciones</div>
                </div>
                <div class="card-right">
                    <div class="card-count"><?php echo e($totalMatriculas); ?></div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="<?php echo e(route('docentes.index')); ?>" class="dashboard-card" data-aos="fade-right" data-aos-delay="250">
                <div class="card-left"><div class="card-icon"><i class="fas fa-chalkboard-user"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Docentes</div>
                    <div class="card-desc">Personal académico</div>
                </div>
                <div class="card-right">
                    <div class="card-count"><?php echo e($totalDocentes); ?></div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="<?php echo e(route('horarios.index')); ?>" class="dashboard-card" data-aos="fade-right" data-aos-delay="300">
                <div class="card-left"><div class="card-icon"><i class="fas fa-calendar-week"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Horarios</div>
                    <div class="card-desc">Programación académica</div>
                </div>
                <div class="card-right">
                    <div class="card-count"><?php echo e($totalHorarios ?? \App\Models\Horario::count()); ?></div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>

            <a href="<?php echo e(route('aulas.index')); ?>" class="dashboard-card" data-aos="fade-right" data-aos-delay="350">
                <div class="card-left"><div class="card-icon"><i class="fas fa-door-open"></i></div></div>
                <div class="card-center">
                    <div class="card-title">Aulas</div>
                    <div class="card-desc">Espacios educativos</div>
                </div>
                <div class="card-right">
                    <div class="card-count"><?php echo e($totalAulas ?? \App\Models\Aula::count()); ?></div>
                    <i class="fas fa-chevron-right card-arrow"></i>
                </div>
            </a>
        </div>

        <!-- BOTÓN VOLVER A LA PÁGINA PRINCIPAL -->
        <div class="back-to-home" data-aos="fade-up" data-aos-duration="800" data-aos-delay="700">
            <a href="<?php echo e(url('/')); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Volver a la página principal
            </a>
        </div>

        <div class="bbn-dash-footer">
            Blue Butterfly Network · Sistema de Matrícula © <?php echo e(date('Y')); ?> · Laravel <?php echo e(app()->version()); ?> · PHP <?php echo e(phpversion()); ?>

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
    background: #f8fafc;
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
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #7c3aed, #4f46e5);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
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
    font-size: 14px;
    font-weight: 600;
    color: #111827;
}

.bbn-dash-urole {
    font-size: 11px;
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
    font-size: 13px;
    font-weight: 500;
    color: #dc2626;
    text-decoration: none;
    transition: all 0.2s;
}

.bbn-dash-logout:hover {
    background: #dc2626;
    color: white;
    border-color: #dc2626;
    transform: translateY(-2px);
}

/* BODY */
.bbn-dash-body {
    padding: 32px 40px;
    max-width: 1400px;
    margin: 0 auto;
    background: #f8fafc;
}

/* TÍTULOS */
.hero-title {
    text-align: center;
    margin: 20px 0 20px;
}
.main-title {
    font-family: 'Space Mono', monospace;
    font-size: 4.5rem;
    font-weight: 700;
    letter-spacing: -1px;
    background: linear-gradient(135deg, #1e293b, #7c3aed);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 8px;
}
.main-sub {
    font-family: 'Space Mono', monospace;
    font-size: 0.9rem;
    color: #64748b;
    letter-spacing: 2px;
}

.welcome-message {
    text-align: center;
    margin-bottom: 40px;
}
.welcome-message p {
    font-size: 1.1rem;
    color: #334155;
}
.welcome-message strong {
    color: #7c3aed;
    font-weight: 700;
}
.date-info {
    font-size: 0.75rem;
    color: #94a3b8;
    display: block;
    margin-top: 6px;
}

/* ESTADÍSTICAS - ICONOS MÁS GRANDES */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 28px;
    margin-bottom: 48px;
}

.stat-card {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 32px;
    padding: 28px 24px;
    display: flex;
    align-items: center;
    gap: 24px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}

.stat-card:hover {
    transform: translateY(-8px) scale(1.02);
    border-color: #c4b5fd;
    box-shadow: 0 20px 30px -12px rgba(124,58,237,0.15);
}

.stat-icon {
    font-size: 3.5rem;
    color: #7c3aed;
    background: #faf5ff;
    width: 90px;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 32px;
}

.stat-info {
    flex: 1;
}

.stat-number {
    font-size: 2.8rem;
    font-weight: 800;
    background: linear-gradient(135deg, #1e293b, #7c3aed);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-family: 'Space Mono', monospace;
    line-height: 1;
}

.stat-label {
    font-size: 0.95rem;
    color: #64748b;
    font-weight: 500;
    margin-top: 8px;
}

/* GRÁFICO */
.chart-section {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 32px;
    padding: 28px;
    margin-bottom: 48px;
    transition: all 0.3s;
}
.chart-section:hover {
    border-color: #c4b5fd;
    box-shadow: 0 12px 20px -12px rgba(124,58,237,0.1);
}
.chart-header {
    text-align: center;
    margin-bottom: 28px;
}
.chart-title {
    font-family: 'Space Mono', monospace;
    font-size: 1.6rem;
    font-weight: 700;
    color: #0f172a;
}
.chart-subtitle {
    color: #64748b;
    font-size: 0.85rem;
    margin-top: 6px;
}
.chart-container {
    position: relative;
    width: 100%;
    height: 420px;
}

/* ÚLTIMAS MATRÍCULAS */
.recent-matriculas-section {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 32px;
    padding: 28px;
    margin-bottom: 48px;
    transition: all 0.3s;
}
.recent-matriculas-section:hover {
    border-color: #c4b5fd;
    box-shadow: 0 12px 20px -12px rgba(124,58,237,0.1);
}
.section-title-sm {
    font-family: 'Space Mono', monospace;
    font-size: 1.5rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 4px;
}
.section-subtitle-sm {
    color: #64748b;
    font-size: 0.85rem;
    margin-bottom: 24px;
}
.table-responsive {
    overflow-x: auto;
}
.recent-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.95rem;
}
.recent-table th {
    text-align: left;
    padding: 16px 16px;
    background-color: #faf5ff;
    color: #4c1d95;
    font-weight: 600;
    border-radius: 20px;
}
.recent-table td {
    padding: 16px 16px;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
}
.recent-table tr:hover td {
    background-color: #fefcff;
}
.text-center {
    text-align: center;
}

/* CONSEJO DEL DÍA - ICONO MÁS GRANDE */
.tip-card {
    background: linear-gradient(135deg, #ffffff, #faf5ff);
    border-radius: 32px;
    padding: 28px 36px;
    margin-bottom: 48px;
    display: flex;
    align-items: center;
    gap: 28px;
    border: 1px solid #f0e7ff;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}
.tip-card:hover {
    transform: translateY(-6px);
    border-color: #c4b5fd;
    box-shadow: 0 20px 30px -12px rgba(124,58,237,0.15);
}
.tip-icon {
    font-size: 3.8rem;
    color: #f59e0b;
    background: rgba(245, 158, 11, 0.1);
    width: 100px;
    height: 100px;
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
    font-size: 1.4rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 8px;
}
.tip-content p {
    font-size: 1rem;
    color: #475569;
    line-height: 1.5;
}

/* MÓDULOS VERTICALES - ICONOS MÁS GRANDES */
.dashboard-list {
    display: flex;
    flex-direction: column;
    gap: 28px;
    margin-bottom: 60px;
}

.dashboard-card {
    background: #ffffff;
    border: 1px solid #f0e7ff;
    border-radius: 36px;
    padding: 36px 48px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    text-decoration: none;
    transition: all 0.3s ease;
    width: 100%;
}

.dashboard-card:hover {
    transform: translateY(-8px);
    border-color: #c4b5fd;
    box-shadow: 0 24px 36px -12px rgba(124,58,237,0.18);
    background: #ffffff;
}

.card-left {
    margin-right: 32px;
}
.card-icon {
    font-size: 4rem;
    color: #7c3aed;
    background: #faf5ff;
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 32px;
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
    font-size: 2rem;
    font-weight: 700;
    color: #0f172a;
    letter-spacing: -0.5px;
}
.card-desc {
    font-size: 1rem;
    color: #64748b;
    margin-top: 6px;
}

.card-right {
    display: flex;
    align-items: center;
    gap: 28px;
}
.card-count {
    font-size: 2.8rem;
    font-weight: 800;
    background: linear-gradient(135deg, #1e293b, #7c3aed);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-family: 'Space Mono', monospace;
}
.card-arrow {
    color: #cbd5e1;
    font-size: 1.6rem;
    transition: transform 0.2s, color 0.2s;
}
.dashboard-card:hover .card-arrow {
    color: #7c3aed;
    transform: translateX(10px);
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
    border-radius: 60px;
    padding: 14px 32px;
    font-size: 1rem;
    font-weight: 500;
    color: #1e293b;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-back:hover {
    background: #faf5ff;
    border-color: #c4b5fd;
    color: #7c3aed;
    transform: translateY(-2px);
}

/* FOOTER */
.bbn-dash-footer {
    text-align: center;
    font-size: 0.8rem;
    color: #94a3b8;
    padding: 24px 0 16px;
    border-top: 1px solid #f0e7ff;
    margin-top: 20px;
    font-family: 'Space Mono', monospace;
}

/* RESPONSIVE */
@media (max-width: 1200px) {
    .stats-grid {
        gap: 20px;
    }
    .stat-icon {
        width: 75px;
        height: 75px;
        font-size: 2.8rem;
    }
    .card-icon {
        width: 85px;
        height: 85px;
        font-size: 3.2rem;
    }
    .card-title {
        font-size: 1.6rem;
    }
    .card-count {
        font-size: 2.2rem;
    }
    .dashboard-card {
        padding: 28px 36px;
    }
}
@media (max-width: 900px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    .bbn-dash-body {
        padding: 24px;
    }
    .main-title {
        font-size: 3rem;
    }
    .dashboard-card {
        padding: 24px 28px;
    }
    .card-title {
        font-size: 1.4rem;
    }
    .card-icon {
        width: 70px;
        height: 70px;
        font-size: 2.5rem;
    }
    .stat-icon {
        width: 65px;
        height: 65px;
        font-size: 2.5rem;
    }
    .chart-container {
        height: 320px;
    }
}
@media (max-width: 600px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    .dashboard-card {
        flex-direction: column;
        text-align: center;
        gap: 24px;
    }
    .card-left {
        margin-right: 0;
    }
    .card-right {
        justify-content: center;
    }
    .main-title {
        font-size: 2.2rem;
    }
    .tip-card {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Inicializar AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Gráfico de barras
        const ctx = document.getElementById('coursesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($cursosLabels, 15, 512) ?>,
                datasets: [{
                    label: 'Alumnos matriculados',
                    data: <?php echo json_encode($cursosData, 15, 512) ?>,
                    backgroundColor: 'rgba(124, 58, 237, 0.75)',
                    borderRadius: 12,
                    barPercentage: 0.65,
                    categoryPercentage: 0.8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { position: 'top', labels: { font: { size: 12 }, color: '#334155' } },
                    tooltip: { backgroundColor: '#1e293b', titleColor: '#f1f5f9', bodyColor: '#cbd5e1', padding: 10, cornerRadius: 12 }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#e9d5ff' }, title: { display: true, text: 'Cantidad de alumnos', color: '#64748b' }, ticks: { stepSize: 1, precision: 0 } },
                    x: { grid: { display: false }, title: { display: true, text: 'Cursos', color: '#64748b' } }
                }
            }
        });

        // Consejo del día aleatorio
        const tips = [
            "La planificación anticipada de horarios reduce conflictos en un 40%. Revisa los espacios disponibles antes de asignar nuevos cursos.",
            "Matricular alumnos temprano ayuda a equilibrar la carga docente. ¡Incentiva la matrícula anticipada!",
            "Actualizar los datos de contacto de los alumnos es clave para una comunicación efectiva.",
            "Un curso con más de 30 alumnos puede requerir un asistente de docencia.",
            "Los reportes de rendimiento académico ayudan a identificar estudiantes en riesgo.",
            "Organizar los horarios con al menos dos semanas de anticipación evita cruces innecesarios.",
            "La deserción se reduce cuando hay seguimiento personalizado.",
            "Aprovecha los gráficos del dashboard para detectar tendencias."
        ];
        document.getElementById('tipText').innerText = tips[Math.floor(Math.random() * tips.length)];
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\appLoginMatricula\resources\views/dashboard.blade.php ENDPATH**/ ?>