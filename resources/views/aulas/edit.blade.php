@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">✏️ Editar Aula</h2>

        <form action="{{ route('aulas.update', $aula->id_aula) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label>Nombre del Aula *</label>
                <input type="text" name="nombre_aula" value="{{ old('nombre_aula', $aula->nombre_aula) }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Capacidad *</label>
                <input type="number" name="capacidad" value="{{ old('capacidad', $aula->capacidad) }}" min="1" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" value="{{ old('ubicacion', $aula->ubicacion) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #FB8C00; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Actualizar</button>
                <a href="{{ route('aulas.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection