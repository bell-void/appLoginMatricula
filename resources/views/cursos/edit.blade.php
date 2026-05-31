@extends('layouts.app')

@section('content')
<div class="bbn-edit-container">
    <div class="edit-header">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <h1>Editar Curso</h1>
        <div></div> <!-- spacer -->
    </div>

    <div class="edit-card">
        <form action="{{ route('cursos.update', $curso->id_curso) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre_curso">Nombre del curso *</label>
                <input type="text" id="nombre_curso" name="nombre_curso" value="{{ old('nombre_curso', $curso->nombre_curso) }}" required>
                @error('nombre_curso')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="creditos">Créditos *</label>
                <input type="number" id="creditos" name="creditos" value="{{ old('creditos', $curso->creditos) }}" min="1" max="10" required>
                @error('creditos')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="5">{{ old('descripcion', $curso->descripcion) }}</textarea>
                @error('descripcion')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Actualizar curso
                </button>
                <a href="{{ route('cursos.index') }}" class="btn-cancel">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

    .bbn-edit-container {
        padding: 2rem;
        background: linear-gradient(145deg, #0a0a0f 0%, #1a1a2e 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .edit-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 700px;
        margin-bottom: 2rem;
    }

    .edit-header h1 {
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

    .edit-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 32px;
        padding: 2rem;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .edit-form {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-group label {
        font-family: 'Space Mono', monospace;
        font-size: 0.8rem;
        font-weight: 600;
        color: #c4b5fd;
        letter-spacing: 0.5px;
    }

    .form-group input,
    .form-group textarea {
        background: rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 14px;
        padding: 12px 16px;
        font-size: 0.9rem;
        color: white;
        transition: all 0.2s;
        outline: none;
        font-family: 'Inter', sans-serif;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #a78bfa;
        box-shadow: 0 0 0 2px rgba(167,139,250,0.2);
        background: rgba(0,0,0,0.6);
    }

    .error-msg {
        font-size: 0.7rem;
        color: #f87171;
        margin-top: 4px;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .btn-submit, .btn-cancel {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 40px;
        font-family: 'Space Mono', monospace;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        cursor: pointer;
        border: none;
    }

    .btn-submit {
        background: #7c3aed;
        color: white;
        box-shadow: 0 2px 8px rgba(124,58,237,0.3);
    }

    .btn-submit:hover {
        background: #6d28d9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124,58,237,0.4);
    }

    .btn-cancel {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.15);
        color: #e2e8f0;
    }

    .btn-cancel:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .bbn-edit-container {
            padding: 1rem;
        }
        .edit-header {
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }
        .edit-card {
            padding: 1.5rem;
        }
        .form-actions {
            flex-direction: column;
        }
    }
</style>
@endsection