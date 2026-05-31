@extends('layouts.app')

@section('content')
<div class="bbn-list-container">
    <div class="list-header">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <h1>Matrículas</h1>
        <a href="{{ route('matriculas.create') }}" class="btn-new">
            <i class="fas fa-plus"></i> Nueva matrícula
        </a>
    </div>

    <!-- Tarjetas de estadísticas -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-id-card"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Matricula::count() }}</span>
                <span class="stat-label">Total matrículas</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Matricula::where('estado', 'Activo')->count() }}</span>
                <span class="stat-label">Activas</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Matricula::where('estado', 'Pendiente')->count() }}</span>
                <span class="stat-label">Pendientes</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Matricula::where('estado', 'Retirado')->count() }}</span>
                <span class="stat-label">Retiradas</span>
            </div>
        </div>
    </div>

    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <input type="text" id="searchMatricula" placeholder="Buscar por alumno o curso..." class="search-input">
    </div>

    <div class="table-responsive">
        <table class="bbn-table" id="matriculas-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Curso</th>
                    <th>Fecha matrícula</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($matriculas as $matricula)
                <tr>
                    <td data-label="ID">{{ $matricula->id_matricula }}</td>
                    <td data-label="Alumno">{{ $matricula->alumno->nombre ?? 'N/A' }} {{ $matricula->alumno->apellido ?? '' }}</td>
                    <td data-label="Curso">{{ $matricula->curso->nombre_curso ?? 'N/A' }}</td>
                    <td data-label="Fecha">{{ \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y') }}</td>
                    <td data-label="Estado">
                        <span class="estado-badge 
                            @if($matricula->estado == 'Activo') estado-activo
                            @elseif($matricula->estado == 'Pendiente') estado-pendiente
                            @else estado-retirado @endif">
                            {{ $matricula->estado }}
                        </span>
                    </td>
                    <td class="actions">
                        <a href="{{ route('matriculas.show', $matricula->id_matricula) }}" class="btn-icon" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('matriculas.edit', $matricula->id_matricula) }}" class="btn-icon" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('matriculas.destroy', $matricula->id_matricula) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar esta matrícula?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty-row">No hay matrículas registradas. Crea la primera.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $matriculas->links() }}
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

    .bbn-list-container {
        padding: 2rem;
        background: linear-gradient(145deg, #0a0a0f 0%, #1a1a2e 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
    }

    .list-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .list-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #fff, #a78bfa);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
    }

    .btn-back, .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        border-radius: 40px;
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-back {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(168,85,247,0.3);
        color: #a78bfa;
    }

    .btn-back:hover {
        background: rgba(168,85,247,0.15);
        color: white;
        transform: translateY(-2px);
    }

    .btn-new {
        background: #7c3aed;
        color: white;
        border: none;
    }

    .btn-new:hover {
        background: #6d28d9;
        transform: translateY(-2px);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(20,20,35,0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        font-size: 1.8rem;
        color: #a78bfa;
    }

    .stat-info {
        display: flex;
        flex-direction: column;
    }

    .stat-value {
        font-size: 1.6rem;
        font-weight: 700;
        font-family: 'Space Mono', monospace;
        color: #a78bfa;
    }

    .stat-label {
        font-size: 0.7rem;
        color: #94a3b8;
        letter-spacing: 1px;
    }

    .search-bar {
        margin-bottom: 1.5rem;
    }

    .search-input {
        width: 100%;
        max-width: 320px;
        background: rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 40px;
        padding: 10px 18px;
        color: white;
        font-family: 'Space Mono', monospace;
        outline: none;
    }

    .search-input:focus {
        border-color: #a78bfa;
    }

    .table-responsive {
        overflow-x: auto;
        border-radius: 24px;
        background: rgba(20,20,35,0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .bbn-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
        color: #e2e8f0;
    }

    .bbn-table th {
        text-align: left;
        padding: 16px 20px;
        background: rgba(0,0,0,0.3);
        font-family: 'Space Mono', monospace;
        font-weight: 600;
        color: #c4b5fd;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .bbn-table td {
        padding: 14px 20px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        vertical-align: middle;
    }

    .bbn-table tr:hover td {
        background: rgba(255,255,255,0.03);
    }

    .empty-row {
        text-align: center;
        color: #94a3b8;
        padding: 40px !important;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: rgba(255,255,255,0.08);
        color: #cbd5e1;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-icon:hover {
        background: rgba(255,255,255,0.18);
        color: white;
        transform: translateY(-2px);
    }

    .delete-form {
        display: inline;
    }

    .estado-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .estado-activo {
        background: rgba(34,197,94,0.15);
        color: #4ade80;
    }

    .estado-pendiente {
        background: rgba(245,158,11,0.15);
        color: #fbbf24;
    }

    .estado-retirado {
        background: rgba(239,68,68,0.15);
        color: #f87171;
    }

    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    .pagination-wrapper .pagination {
        gap: 6px;
    }

    .pagination-wrapper .page-item .page-link {
        background: rgba(20,20,35,0.8);
        border: 1px solid rgba(255,255,255,0.1);
        color: #e2e8f0;
        border-radius: 12px;
        padding: 8px 14px;
        font-family: 'Space Mono', monospace;
        transition: all 0.2s;
    }

    .pagination-wrapper .page-item.active .page-link {
        background: #7c3aed;
        border-color: #7c3aed;
        color: white;
    }

    .pagination-wrapper .page-link:hover {
        background: rgba(124,58,237,0.5);
        color: white;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .bbn-list-container { padding: 1rem; }
        .list-header { flex-direction: column; align-items: stretch; text-align: center; }
        .stats-grid { grid-template-columns: 1fr; }
        .bbn-table th, .bbn-table td { padding: 10px 12px; font-size: 0.8rem; }
        .actions { justify-content: center; }
    }
</style>

<script>
    document.getElementById('searchMatricula').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('.bbn-table tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection