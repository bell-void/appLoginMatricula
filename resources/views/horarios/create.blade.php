@extends('layouts.app')

@section('content')
<div class="bbn-create-container">
    <div class="create-header">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <h1>Registrar Horario</h1>
        <div></div>
    </div>

    <div class="create-card">
        <form action="{{ route('horarios.store') }}" method="POST" class="create-form">
            @csrf

            <div class="form-group">
                <label for="id_curso">Curso *</label>
                <select id="id_curso" name="id_curso" required>
                    <option value="">Seleccione un curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" {{ old('id_curso') == $curso->id_curso ? 'selected' : '' }}>
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
                @error('id_curso')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="dia_semana">Día de la semana *</label>
                <select id="dia_semana" name="dia_semana" required>
                    <option value="">Seleccione un día</option>
                    <option value="Lunes" {{ old('dia_semana') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                    <option value="Martes" {{ old('dia_semana') == 'Martes' ? 'selected' : '' }}>Martes</option>
                    <option value="Miércoles" {{ old('dia_semana') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                    <option value="Jueves" {{ old('dia_semana') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                    <option value="Viernes" {{ old('dia_semana') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                    <option value="Sábado" {{ old('dia_semana') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                </select>
                @error('dia_semana')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="hora_inicio">Hora inicio *</label>
                    <input type="time" id="hora_inicio" name="hora_inicio" value="{{ old('hora_inicio') }}" required>
                    @error('hora_inicio')<span class="error-msg">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="hora_fin">Hora fin *</label>
                    <input type="time" id="hora_fin" name="hora_fin" value="{{ old('hora_fin') }}" required>
                    @error('hora_fin')<span class="error-msg">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-group">
                <label for="id_aula">Aula *</label>
                <select id="id_aula" name="id_aula" required>
                    <option value="">Seleccione un aula</option>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id_aula }}" {{ old('id_aula') == $aula->id_aula ? 'selected' : '' }}>
                            {{ $aula->nombre_aula }} (Cap. {{ $aula->capacidad }})
                        </option>
                    @endforeach
                </select>
                @error('id_aula')<span class="error-msg">{{ $message }}</span>@enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Guardar horario
                </button>
                <a href="{{ route('horarios.index') }}" class="btn-cancel">
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
        background: linear-gradient(145deg, #0a0a0f 0%, #1a1a2e 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .create-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 700px;
        margin-bottom: 2rem;
    }

    .create-header h1 {
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

    .create-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 32px;
        padding: 2rem;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .create-form {
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
        color: #c4b5fd;
        letter-spacing: 0.5px;
    }

    .form-group select,
    .form-group input {
        background: rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 14px;
        padding: 12px 16px;
        font-size: 0.9rem;
        color: white;
        transition: all 0.2s;
        outline: none;
    }

    .form-group select:focus,
    .form-group input:focus {
        border-color: #a78bfa;
        box-shadow: 0 0 0 2px rgba(167,139,250,0.2);
        background: rgba(0,0,0,0.6);
    }

    .form-group select option {
        background: #1a1a2e;
        color: white;
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
        .bbn-create-container {
            padding: 1rem;
        }
        .create-header {
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }
        .form-row {
            grid-template-columns: 1fr;
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