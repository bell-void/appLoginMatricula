@extends('layouts.app')

@section('content')
<div class="bbn-edit-container">
    <div class="edit-header">
        <h1>Editar Alumno</h1>
    </div>

    <div class="edit-card">
        <form action="{{ route('alumnos.update', $alumno->id_alumno) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required>
                    @error('nombre')<span class="error-msg">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido *</label>
                    <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $alumno->apellido) }}" required>
                    @error('apellido')<span class="error-msg">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento *</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" required>
                @error('fecha_nacimiento')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico *</label>
                <input type="email" id="email" name="email" value="{{ old('email', $alumno->email) }}" required>
                @error('email')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $alumno->telefono) }}">
                    @error('telefono')<span class="error-msg">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $alumno->direccion) }}">
                    @error('direccion')<span class="error-msg">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Actualizar alumno
                </button>
                <a href="{{ route('alumnos.index') }}" class="btn-cancel">
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
        background: #ffffff;
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .edit-header {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 700px;
        margin-bottom: 2rem;
    }

    .edit-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #1e293b, #7c3aed);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
    }

    .edit-card {
        background: #ffffff;
        border: 1px solid #e9e9ef;
        border-radius: 24px;
        padding: 2rem;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.03);
    }

    .edit-form {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
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

    .form-group input {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 12px 16px;
        font-size: 0.9rem;
        color: #1e293b;
        transition: all 0.2s;
        outline: none;
    }

    .form-group input:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 0 2px rgba(124,58,237,0.1);
        background: #ffffff;
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
        .bbn-edit-container {
            padding: 1rem;
        }
        .edit-header {
            margin-bottom: 1.5rem;
        }
        .form-row {
            grid-template-columns: 1fr;
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