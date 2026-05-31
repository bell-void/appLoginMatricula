@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">📝 Registrar Docente</h2>

        <form action="{{ route('docentes.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Nombre *</label>
                <input type="text" name="nombre" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Apellido *</label>
                <input type="text" name="apellido" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Especialidad</label>
                <input type="text" name="especialidad" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Email *</label>
                <input type="email" name="email" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Teléfono</label>
                <input type="text" name="telefono" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #1E88E5; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Guardar</button>
                <a href="{{ route('docentes.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection