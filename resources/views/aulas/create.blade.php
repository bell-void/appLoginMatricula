@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">🏫 Registrar Aula</h2>

        <form action="{{ route('aulas.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Nombre del Aula *</label>
                <input type="text" name="nombre_aula" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" placeholder="Ej: A-101, Lab-301">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Capacidad *</label>
                <input type="number" name="capacidad" min="1" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" placeholder="Ej: 30">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" placeholder="Ej: Pabellón A, 2do piso">
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #00ACC1; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Guardar</button>
                <a href="{{ route('aulas.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection