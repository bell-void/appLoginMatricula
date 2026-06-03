@extends('layouts.app')

@section('content')
<div class="bbn-list-container">
    <div class="list-header">
        <h1>Matrículas</h1>
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
                    <td>{{ $matricula->id_matricula }}</td>
                    <td>{{ $matricula->alumno->nombre ?? 'N/A' }} {{ $matricula->alumno->apellido ?? '' }}</td>
                    <td>{{ $matricula->curso->nombre_curso ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y') }}</td>
                    <td class="estado-cell">
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

    <div class="list-footer">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <a href="{{ route('matriculas.create') }}" class="btn-new">
            <i class="fas fa-plus"></i> Nueva matrícula
        </a>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

    .bbn-list-container {
        padding: 2rem;
        background: #ffffff;
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .list-header {
        text-align: center;
        margin-bottom: 2rem;
        width: 100%;
    }

    .list-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #1e293b, #7c3aed);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
        display: inline-block;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
        width: 100%;
        max-width: 1200px;
    }

    .stat-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.2s;
    }

    .stat-card:hover {
        border-color: #c4b5fd;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .stat-icon {
        font-size: 1.8rem;
        color: #7c3aed;
    }

    .stat-info {
        display: flex;
        flex-direction: column;
    }

    .stat-value {
        font-size: 1.6rem;
        font-weight: 700;
        font-family: 'Space Mono', monospace;
        color: #1e293b;
    }

    .stat-label {
        font-size: 0.7rem;
        color: #64748b;
        letter-spacing: 1px;
    }

    .search-bar {
        margin-bottom: 1.5rem;
        width: 100%;
        max-width: 1200px;
    }

    .search-input {
        width: 100%;
        max-width: 320px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 40px;
        padding: 10px 18px;
        color: #1e293b;
        font-family: 'Space Mono', monospace;
        outline: none;
    }

    .search-input:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 0 2px rgba(124,58,237,0.1);
    }

    .table-responsive {
        width: 100%;
        max-width: 1200px;
        overflow-x: auto;
        border-radius: 24px;
        background: #ffffff;
        border: 1px solid #e9e9ef;
        box-shadow: 0 8px 20px rgba(0,0,0,0.03);
        margin-bottom: 1.5rem;
    }

    .bbn-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
        color: #1e293b;
    }

    .bbn-table th {
        text-align: left;
        padding: 16px 20px;
        background: #f8fafc;
        font-family: 'Space Mono', monospace;
        font-weight: 600;
        color: #4c1d95;
        border-bottom: 1px solid #e9d5ff;
    }

    .bbn-table td {
        padding: 14px 20px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .bbn-table tr:hover td {
        background: #faf5ff;
    }

    .empty-row {
        text-align: center;
        color: #94a3b8;
        padding: 40px !important;
    }

    .estado-cell {
        vertical-align: middle;
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
        color: #10b981;
    }

    .estado-pendiente {
        background: rgba(245,158,11,0.15);
        color: #f59e0b;
    }

    .estado-retirado {
        background: rgba(239,68,68,0.15);
        color: #ef4444;
    }

    .actions {
        display: flex;
        gap: 8px;
        white-space: nowrap;
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #f8fafc;
        color: #475569;
        text-decoration: none;
        border: 1px solid #e2e8f0;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-icon:hover {
        background: #e9d5ff;
        color: #6d28d9;
        transform: translateY(-2px);
        border-color: #c4b5fd;
    }

    .delete-form {
        display: inline;
    }

    .pagination-wrapper {
        margin-top: 1rem;
        margin-bottom: 2rem;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .pagination-wrapper .pagination {
        gap: 6px;
    }

    .pagination-wrapper .page-item .page-link {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        color: #475569;
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
        background: #e9d5ff;
        color: #6d28d9;
        transform: translateY(-1px);
    }

    .list-footer {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 1rem;
        flex-wrap: wrap;
        width: 100%;
    }

    .btn-back, .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        border-radius: 40px;
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-back {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #475569;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
        transform: translateY(-2px);
    }

    .btn-new {
        background: #7c3aed;
        color: white;
        border: none;
        box-shadow: 0 2px 8px rgba(124,58,237,0.2);
    }

    .btn-new:hover {
        background: #6d28d9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124,58,237,0.3);
    }

    @media (max-width: 768px) {
        .bbn-list-container {
            padding: 1rem;
        }
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .list-footer {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-back, .btn-new {
            justify-content: center;
        }
    }
</style>

<script>
    document.getElementById('searchMatricula').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#matriculas-table tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection