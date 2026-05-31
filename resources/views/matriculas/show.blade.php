@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 500px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">✏️ Detalle de Matrícula</h2>

        <div style="background: #F5F7FA; padding: 20px; border-radius: 12px;">
            <p><strong>ID Matrícula:</strong> {{ $matricula->id_matricula }}</p>
            <p><strong>Alumno:</strong> {{ $matricula->alumno->nombre ?? 'N/A' }} {{ $matricula->alumno->apellido ?? '' }}</p>
            <p><strong>Curso:</strong> {{ $matricula->curso->nombre_curso ?? 'N/A' }}</p>
            <p><strong>Fecha Matrícula:</strong> {{ \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y') }}</p>
            <p><strong>Estado:</strong> 
                <span style="background: 
                    @if($matricula->estado == 'Activo') #E8F5E9 
                    @elseif($matricula->estado == 'Retirado') #FFEBEE 
                    @else #FFF3E0 @endif;
                    color: 
                    @if($matricula->estado == 'Activo') #2E7D32 
                    @elseif($matricula->estado == 'Retirado') #C62828 
                    @else #E65100 @endif;
                    padding: 4px 12px; border-radius: 20px; font-size: 12px;">
                    {{ $matricula->estado }}
                </span>
            </p>
        </div>

        <div style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
            <a href="{{ route('matriculas.edit', $matricula->id_matricula) }}" style="background: #FB8C00; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Editar</a>
            <a href="{{ route('matriculas.index') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">Volver</a>
        </div>
    </div>
</div>
@endsection