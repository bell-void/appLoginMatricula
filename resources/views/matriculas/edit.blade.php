@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">✏️ Editar Matrícula</h2>

        <form action="{{ route('matriculas.update', $matricula->id_matricula) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label>Alumno *</label>
                <select name="id_alumno" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id_alumno }}" {{ $matricula->id_alumno == $alumno->id_alumno ? 'selected' : '' }}>
                            {{ $alumno->nombre }} {{ $alumno->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Curso *</label>
                <select name="id_curso" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" {{ $matricula->id_curso == $curso->id_curso ? 'selected' : '' }}>
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Fecha Matrícula *</label>
                <input type="date" name="fecha_matricula" value="{{ $matricula->fecha_matricula }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Estado *</label>
                <select name="estado" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="Activo" {{ $matricula->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Retirado" {{ $matricula->estado == 'Retirado' ? 'selected' : '' }}>Retirado</option>
                    <option value="Pendiente" {{ $matricula->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #FB8C00; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Actualizar</button>
                <a href="{{ route('matriculas.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection