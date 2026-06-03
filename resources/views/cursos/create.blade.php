@extends('layouts.app')

@section('content')
<div class="bbn-create-container">
    <div class="create-header">
        <h1>Registrar Curso</h1>
    </div>

    <div class="create-card">
        <form action="{{ route('cursos.store') }}" method="POST" class="create-form">
            @csrf

            <div class="form-group">
                <label for="nombre_curso">Nombre del curso *</label>
                <input type="text" id="nombre_curso" name="nombre_curso" value="{{ old('nombre_curso') }}" required>
                @error('nombre_curso')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="creditos">Créditos *</label>
                <input type="number" id="creditos" name="creditos" value="{{ old('creditos') }}" min="1" max="10" required>
                @error('creditos')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="id_docente">Docente *</label>
                <select id="id_docente" name="id_docente" required>
                    <option value="">Seleccione un docente</option>
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id_docente }}" {{ old('id_docente') == $docente->id_docente ? 'selected' : '' }}>
                            {{ $docente->nombre }} {{ $docente->apellido }}
                        </option>
                    @endforeach
                </select>
                @error('id_docente')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                @error('descripcion')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Guardar curso
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

    .bbn-create-container {
        padding: 2rem;
        background: #ffffff;
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .create-header {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 700px;
        margin-bottom: 2rem;
    }

    .create-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #1e293b, #7c3aed);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
    }

    .create-card {
        background: #ffffff;
        border: 1px solid #e9e9ef;
        border-radius: 24px;
        padding: 2rem;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.03);
    }

    .create-form {
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
        color: #4c1d95;
        letter-spacing: 0.5px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 12px 16px;
        font-size: 0.9rem;
        color: #1e293b;
        transition: all 0.2s;
        outline: none;
        font-family: 'Inter', sans-serif;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 0 2px rgba(124,58,237,0.1);
        background: #ffffff;
    }

    .form-group select option {
        background: #ffffff;
        color: #1e293b;
    }

    .error-msg {
        font-size: 0.7rem;
        color: #dc2626;
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
        box-shadow: 0 2px 8px rgba(124,58,237,0.2);
    }

    .btn-submit:hover {
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
        .bbn-create-container {
            padding: 1rem;
        }
        .create-header {
            margin-bottom: 1.5rem;
        }
        .create-card {
            padding: 1.5rem;
        }
        .form-actions {
            flex-direction: column;
        }
    }
</style>
@endsection