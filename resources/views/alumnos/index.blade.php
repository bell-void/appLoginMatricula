@extends('layouts.app')

@section('content')
<div class="bbn-list-container">
    <div class="list-header">
        <h1>Alumnos</h1>
    </div>

    <div class="table-responsive">
        <table class="bbn-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id_alumno }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->telefono ?? '—' }}</td>
                    <td class="actions">
                        <a href="{{ route('alumnos.show', $alumno->id_alumno) }}" class="btn-icon" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('alumnos.edit', $alumno->id_alumno) }}" class="btn-icon" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('alumnos.destroy', $alumno->id_alumno) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar este alumno?')">
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
                    <td colspan="6" class="empty-row">No hay alumnos registrados. ¡Crea tu primer alumno!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $alumnos->links() }}
    </div>

    <div class="list-footer">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <a href="{{ route('alumnos.create') }}" class="btn-new">
            <i class="fas fa-plus"></i> Nuevo alumno
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

    .table-responsive {
        width: 100%;
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
        flex-wrap: wrap;
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
        .list-header {
            margin-bottom: 1rem;
        }
        .bbn-table th,
        .bbn-table td {
            padding: 10px 12px;
            font-size: 0.8rem;
        }
        .btn-icon {
            width: 28px;
            height: 28px;
        }
        .list-footer {
            flex-direction: column;
            align-items: stretch;
            gap: 1rem;
        }
        .btn-back, .btn-new {
            justify-content: center;
        }
    }
</style>
@endsection