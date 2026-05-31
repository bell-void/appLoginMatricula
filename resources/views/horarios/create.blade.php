@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">📝 Registrar Horario</h2>

        <form action="{{ route('horarios.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Curso *</label>
                <select name="id_curso" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="">Seleccione un curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}">{{ $curso->nombre_curso }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Día de la Semana *</label>
                <select name="dia_semana" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="">Seleccione un día</option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sábado">Sábado</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Hora Inicio *</label>
                <input type="time" name="hora_inicio" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Hora Fin *</label>
                <input type="time" name="hora_fin" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Aula *</label>
                <select name="id_aula" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="">Seleccione un aula</option>
                    @foreach($aulas as $aula)
                        <option value="{{ $aula->id_aula }}">{{ $aula->nombre_aula }} (Cap: {{ $aula->capacidad }})</option>
                    @endforeach
                </select>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #1E88E5; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Guardar</button>
                <a href="{{ route('horarios.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection