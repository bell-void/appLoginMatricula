@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">✏️ Editar Horario</h2>

        <form action="{{ route('horarios.update', $horario->id_horario) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label>Curso *</label>
                <select name="id_curso" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" {{ $horario->id_curso == $curso->id_curso ? 'selected' : '' }}>
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Día de la Semana *</label>
                <select name="dia_semana" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="Lunes" {{ $horario->dia_semana == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                    <option value="Martes" {{ $horario->dia_semana == 'Martes' ? 'selected' : '' }}>Martes</option>
                    <option value="Miércoles" {{ $horario->dia_semana == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                    <option value="Jueves" {{ $horario->dia_semana == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                    <option value="Viernes" {{ $horario->dia_semana == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                    <option value="Sábado" {{ $horario->dia_semana == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Hora Inicio *</label>
                <input type="time" name="hora_inicio" value="{{ $horario->hora_inicio }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Hora Fin *</label>
                <input type="time" name="hora_fin" value="{{ $horario->hora_fin }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Aula *</label>
                <select name="id_aula" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id_aula }}" {{ $horario->id_aula == $aula->id_aula ? 'selected' : '' }}>
                            {{ $aula->nombre_aula }} (Cap: {{ $aula->capacidad }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #FB8C00; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Actualizar</button>
                <a href="{{ route('horarios.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection