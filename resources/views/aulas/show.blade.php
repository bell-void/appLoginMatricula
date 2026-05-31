@extends('layouts.app')

@section('content')
<div class="bbn-show-container">
    <div class="show-header">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <h1>Detalle del Aula</h1>
        <div></div>
    </div>

    <div class="show-card">
        <div class="detail-info">
            <div class="detail-row">
                <span class="detail-label">ID</span>
                <span class="detail-value">{{ $aula->id_aula }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Nombre</span>
                <span class="detail-value">{{ $aula->nombre_aula }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Capacidad</span>
                <span class="detail-value">{{ $aula->capacidad }} personas</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Ubicación</span>
                <span class="detail-value">{{ $aula->ubicacion ?? 'No especificada' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Registro</span>
                <span class="detail-value">{{ $aula->created_at->format('d/m/Y H:i') }}</span>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('aulas.edit', $aula->id_aula) }}" class="btn-edit">
                <i class="fas fa-edit"></i> Editar aula
            </a>
            <a href="{{ route('aulas.index') }}" class="btn-back-list">
                <i class="fas fa-list"></i> Volver al listado
            </a>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

    .bbn-show-container {
        padding: 2rem;
        background: linear-gradient(145deg, #0a0a0f 0%, #1a1a2e 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .show-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 700px;
        margin-bottom: 2rem;
    }

    .show-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 1.8rem;
        font-weight: 700;
        background: linear-gradient(135deg, #fff, #a78bfa);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        border-radius: 40px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(168,85,247,0.3);
        color: #a78bfa;
        text-decoration: none;
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        transition: all 0.2s;
    }

    .btn-back:hover {
        background: rgba(168,85,247,0.15);
        color: white;
        transform: translateY(-2px);
    }

    .show-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 32px;
        padding: 2rem;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
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
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .detail-label {
        width: 140px;
        font-family: 'Space Mono', monospace;
        font-size: 0.8rem;
        font-weight: 600;
        color: #c4b5fd;
        letter-spacing: 0.5px;
    }

    .detail-value {
        flex: 1;
        font-size: 0.9rem;
        color: #e2e8f0;
        word-break: break-word;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1rem;
    }

    .btn-edit, .btn-back-list {
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
    }

    .btn-edit {
        background: #7c3aed;
        color: white;
        box-shadow: 0 2px 8px rgba(124,58,237,0.3);
    }

    .btn-edit:hover {
        background: #6d28d9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124,58,237,0.4);
    }

    .btn-back-list {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.15);
        color: #e2e8f0;
    }

    .btn-back-list:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .bbn-show-container {
            padding: 1rem;
        }
        .show-header {
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
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
        .btn-edit, .btn-back-list {
            justify-content: center;
        }
    }
</style>
@endsection