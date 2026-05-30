@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">📝 Registrar Matrícula</h2>

        <form action="{{ route('matriculas.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Alumno *</label>
                <select name="id_alumno" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="">Seleccione un alumno</option>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id_alumno }}">{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
                    @endforeach
                </select>
            </div>

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
                <label>Fecha Matrícula *</label>
                <input type="date" name="fecha_matricula" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Estado *</label>
                <select name="estado" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="Activo">Activo</option>
                    <option value="Retirado">Retirado</option>
                    <option value="Pendiente">Pendiente</option>
                </select>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #1E88E5; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Guardar</button>
                <a href="{{ route('matriculas.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection