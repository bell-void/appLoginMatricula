@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        <h2 style="color: #0B2B5B; text-align: center;">✏️ Editar Alumno</h2>

        <form action="{{ route('alumnos.update', $alumno->id_alumno) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label>Nombre *</label>
                <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Apellido *</label>  <!-- ← CAMBIADO: Apellido (singular) -->
                <input type="text" name="apellido" value="{{ old('apellido', $alumno->apellido) }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Fecha Nacimiento *</label>
                <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <!-- ❌ ELIMINAR CAMPO DNI -->
            <!-- 
            <div style="margin-bottom: 15px;">
                <label>DNI *</label>
                <input type="text" name="dni" value="{{ old('dni', $alumno->dni) }}" required>
            </div>
            -->

            <div style="margin-bottom: 15px;">
                <label>Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $alumno->direccion) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $alumno->telefono) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Email *</label>
                <input type="email" name="email" value="{{ old('email', $alumno->email) }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <!-- ❌ ELIMINAR CAMPO ESTADO_MATRICULA -->
            <!-- 
            <div style="margin-bottom: 20px;">
                <label>Estado *</label>
                <select name="estado_matricula">...</select>
            </div>
            -->

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #FB8C00; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Actualizar</button>
                <a href="{{ route('alumnos.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection