@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 500px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">🏫 Detalle del Aula</h2>

        <div style="background: #F5F7FA; padding: 20px; border-radius: 12px;">
            <p><strong>ID:</strong> {{ $aula->id_aula }}</p>
            <p><strong>Nombre:</strong> {{ $aula->nombre_aula }}</p>
            <p><strong>Capacidad:</strong> {{ $aula->capacidad }} alumnos</p>
            <p><strong>Ubicación:</strong> {{ $aula->ubicacion ?? 'No especificada' }}</p>
        </div>

        <div style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
            <a href="{{ route('aulas.edit', $aula->id_aula) }}" style="background: #FB8C00; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Editar</a>
            <a href="{{ route('aulas.index') }}" style="background: #00ACC1; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Volver</a>
        </div>
    </div>
</div>
@endsection