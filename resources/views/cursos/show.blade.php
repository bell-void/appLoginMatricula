@extends('layouts.app')

@section('content')
<div class="bbn-show-container">
    <div class="show-header">
        <h1>Detalle del Curso</h1>
    </div>

    <div class="show-card">
        <div class="detail-info">
            <div class="detail-row">
                <span class="detail-label">ID</span>
                <span class="detail-value">{{ $curso->id_curso }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Nombre del curso</span>
                <span class="detail-value">{{ $curso->nombre_curso }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Créditos</span>
                <span class="detail-value">{{ $curso->creditos }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Descripción</span>
                <span class="detail-value">{{ $curso->descripcion ?: 'Sin descripción' }}</span>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('cursos.edit', $curso->id_curso) }}" class="btn-edit">
                <i class="fas fa-edit"></i> Editar curso
            </a>
            <a href="{{ route('cursos.index') }}" class="btn-cancel">
                <i class="fas fa-list"></i> Volver al listado
            </a>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

    .bbn-show-container {
        padding: 2rem;
        background: #ffffff;
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .show-header {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 700px;
        margin-bottom: 2rem;
    }

    .show-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #1e293b, #7c3aed);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
    }

    .show-card {
        background: #ffffff;
        border: 1px solid #e9e9ef;
        border-radius: 24px;
        padding: 2rem;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.03);
    }

    .detail-info {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .detail-row {
        display: flex;
        align-items: baseline;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #e9e9ef;
    }

    .detail-label {
        width: 140px;
        font-family: 'Space Mono', monospace;
        font-size: 0.8rem;
        font-weight: 600;
        color: #4c1d95;
        letter-spacing: 0.5px;
    }

    .detail-value {
        flex: 1;
        font-size: 0.9rem;
        color: #1e293b;
        word-break: break-word;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .btn-edit, .btn-cancel {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        border-radius: 40px;
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        cursor: pointer;
        border: none;
    }

    .btn-edit {
        background: #7c3aed;
        color: white;
        box-shadow: 0 2px 8px rgba(124,58,237,0.2);
    }

    .btn-edit:hover {
        background: #6d28d9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124,58,237,0.3);
    }

    .btn-cancel {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #475569;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
        color: #1e293b;
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .bbn-show-container {
            padding: 1rem;
        }
        .show-header {
            margin-bottom: 1.5rem;
        }
        .detail-row {
            flex-direction: column;
            gap: 0.3rem;
        }
        .detail-label {
            width: auto;
        }
        .action-buttons {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-edit, .btn-cancel {
            justify-content: center;
        }
    }
</style>
@endsection