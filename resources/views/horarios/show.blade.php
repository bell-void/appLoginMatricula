@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 500px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">🕐 Detalle del Horario</h2>

        <div style="background: #F5F7FA; padding: 20px; border-radius: 12px;">
            <p><strong>ID:</strong> {{ $horario->id_horario }}</p>
            <p><strong>Curso:</strong> {{ $horario->curso->nombre_curso ?? 'N/A' }}</p>
            <p><strong>Día:</strong> {{ $horario->dia_semana }}</p>
            <p><strong>Hora Inicio:</strong> {{ $horario->hora_inicio }}</p>
            <p><strong>Hora Fin:</strong> {{ $horario->hora_fin }}</p>
            <p><strong>Aula:</strong> {{ $horario->aula->nombre_aula ?? 'N/A' }}</p>
        </div>

        <div style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
            <a href="{{ route('horarios.edit', $horario->id_horario) }}" style="background: #FB8C00; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Editar</a>
            <a href="{{ route('horarios.index') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Volver</a>
        </div>
    </div>
</div>
@endsection