@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 500px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">📖 Detalle del Curso</h2>

        <div style="background: #F5F7FA; padding: 20px; border-radius: 12px;">
            <p><strong>ID:</strong> {{ $curso->id_curso }}</p>
            <p><strong>Nombre:</strong> {{ $curso->nombre_curso }}</p>
            <p><strong>Créditos:</strong> {{ $curso->creditos }}</p>
            <p><strong>Descripción:</strong></p>
            <p style="white-space: pre-wrap;">{{ $curso->descripcion }}</p>
        </div>

        <div style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
            <a href="{{ route('cursos.edit', $curso->id_curso) }}" style="background: #FB8C00; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Editar</a>
            <a href="{{ route('cursos.index') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Volver</a>
        </div>
    </div>
</div>
@endsection