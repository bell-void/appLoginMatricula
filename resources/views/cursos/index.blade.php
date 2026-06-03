@extends('layouts.app')

@section('content')
<div class="bbn-list-container">
    <div class="list-header">
        <h1>Cursos</h1>
    </div>

    <!-- Tarjetas de estadísticas -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-book"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Curso::count() }}</span>
                <span class="stat-label">Total cursos</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-chart-simple"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Curso::sum('creditos') }}</span>
                <span class="stat-label">Créditos totales</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Curso::latest()->first()->nombre_curso ?? 'N/A' }}</span>
                <span class="stat-label">Último curso</span>
            </div>
        </div>
    </div>

    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <input type="text" id="searchCurso" placeholder="Buscar por nombre o descripción..." class="search-input">
    </div>

    <div class="table-responsive">
        <table class="bbn-table" id="cursos-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del curso</th>
                    <th>Créditos</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cursos as $curso)
                <tr>
                    <td>{{ $curso->id_curso }}</td>
                    <td>{{ $curso->nombre_curso }}</td>
                    <td>{{ $curso->creditos }}</td>
                    <td>{{ Str::limit($curso->descripcion, 60) }}</td>
                    <td class="actions">
                        <a href="{{ route('cursos.show', $curso->id_curso) }}" class="btn-icon" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('cursos.edit', $curso->id_curso) }}" class="btn-icon" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('cursos.destroy', $curso->id_curso) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar este curso?')">
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
                    <td colspan="5" class="empty-row">No hay cursos registrados. Crea tu primer curso.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $cursos->links() }}
    </div>

    <div class="list-footer">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <a href="{{ route('cursos.create') }}" class="btn-new">
            <i class="fas fa-plus"></i> Nuevo curso
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
        display: flex;
        align-items: center;
        justify-content: center;
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
        margin-top: 1.5rem;
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
    document.getElementById('searchCurso').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#cursos-table tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection