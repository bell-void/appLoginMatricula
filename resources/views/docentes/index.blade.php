@extends('layouts.app')

@section('content')
<div class="bbn-list-container">
    <div class="list-header">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <h1>Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="btn-new">
            <i class="fas fa-plus"></i> Nuevo docente
        </a>
    </div>

    <!-- Tarjetas de estadísticas -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-chalkboard-user"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Docente::count() }}</span>
                <span class="stat-label">Total docentes</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-tag"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Docente::distinct('especialidad')->count('especialidad') }}</span>
                <span class="stat-label">Especialidades</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <span class="stat-value">{{ \App\Models\Docente::latest()->first()->nombre ?? 'N/A' }}</span>
                <span class="stat-label">Último docente</span>
            </div>
        </div>
    </div>

    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <input type="text" id="searchDocente" placeholder="Buscar por nombre, apellido o especialidad..." class="search-input">
    </div>

    <div class="table-responsive">
        <table class="bbn-table" id="docentes-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($docentes as $docente)
                <tr>
                    <td data-label="ID">{{ $docente->id_docente }}</td>
                    <td data-label="Nombre">{{ $docente->nombre }}</td>
                    <td data-label="Apellido">{{ $docente->apellido }}</td>
                    <td data-label="Especialidad">{{ $docente->especialidad ?? '—' }}</td>
                    <td data-label="Email">{{ $docente->email }}</td>
                    <td data-label="Teléfono">{{ $docente->telefono ?? '—' }}</td>
                    <td class="actions">
                        <a href="{{ route('docentes.show', $docente->id_docente) }}" class="btn-icon" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('docentes.edit', $docente->id_docente) }}" class="btn-icon" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('docentes.destroy', $docente->id_docente) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar este docente?')">
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
                    <td colspan="7" class="empty-row">No hay docentes registrados. Crea el primero.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $docentes->links() }}
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
    document.getElementById('searchDocente').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('.bbn-table tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection