@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 550px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; margin-bottom: 25px; text-align: center;">
            👨‍🎓 Detalle del Alumno
        </h2>

        <!-- Tarjeta de información -->
        <div style="background: #F5F7FA; padding: 20px; border-radius: 16px;">
            
            <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #E0E0E0;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">ID:</strong>
                <span>{{ $alumno->id_alumno }}</span>
            </div>

            <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #E0E0E0;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">Nombre:</strong>
                <span>{{ $alumno->nombre }} {{ $alumno->apellido }}</span>  <!-- ← CAMBIADO -->
            </div>

            <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #E0E0E0;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">Fecha Nacimiento:</strong>
                <span>{{ \Carbon\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y') }}</span>
            </div>

            <!-- ❌ ELIMINAR BLOQUE DNI -->
            <!--
            <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #E0E0E0;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">DNI:</strong>
                <span>{{ $alumno->dni }}</span>
            </div>
            -->

            <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #E0E0E0;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">Dirección:</strong>
                <span>{{ $alumno->direccion }}</span>
            </div>

            <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #E0E0E0;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">Teléfono:</strong>
                <span>{{ $alumno->telefono }}</span>
            </div>

            <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #E0E0E0;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">Email:</strong>
                <span>{{ $alumno->email }}</span>
            </div>

            <!-- ❌ ELIMINAR BLOQUE ESTADO MATRÍCULA -->
            <!--
            <div style="margin-bottom: 10px;">
                <strong style="color: #1E88E5; display: inline-block; width: 140px;">Estado Matrícula:</strong>
                <span style="background: ...">{{ $alumno->estado_matricula == 'matriculado' ? 'MATRICULADO' : 'INACTIVO' }}</span>
            </div>
            -->

        </div>

        <!-- Botones de acción -->
        <div style="display: flex; gap: 15px; justify-content: center; margin-top: 30px;">
            <a href="{{ route('alumnos.edit', $alumno->id_alumno) }}" style="background: #FB8C00; color: white; padding: 10px 25px; border-radius: 8px; text-decoration: none;">
                ✏️ Editar Alumno
            </a>
            <a href="{{ route('alumnos.index') }}" style="background: #1E88E5; color: white; padding: 10px 25px; border-radius: 8px; text-decoration: none;">
                ← Volver al Listado
            </a>
        </div>

        <!-- Matrículas del alumno (opcional) -->
        @if($alumno->matriculas && $alumno->matriculas->count() > 0)
        <div style="margin-top: 30px;">
            <h3 style="color: #0B2B5B; margin-bottom: 15px;">📚 Cursos Matriculados</h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #F5F7FA;">
                            <th style="padding: 10px;">Curso</th>
                            <th style="padding: 10px;">Semestre</th>
                            <th style="padding: 10px;">Nota</th>
                            <th style="padding: 10px;">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumno->matriculas as $matricula)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px;">{{ $matricula->curso->nombre_curso ?? 'N/A' }}</td>
                            <td style="padding: 10px;">{{ $matricula->semestre ?? '—' }}</td>
                            <td style="padding: 10px;">{{ $matricula->nota_final ?? '—' }}</td>
                            <td style="padding: 10px;">
                                <span style="background: 
                                    @if($matricula->estado == 'aprobado') #E8F5E9 
                                    @elseif($matricula->estado == 'reprobado') #FFEBEE 
                                    @else #FFF3E0 @endif;
                                    color: 
                                    @if($matricula->estado == 'aprobado') #2E7D32 
                                    @elseif($matricula->estado == 'reprobado') #C62828 
                                    @else #E65100 @endif;
                                    padding: 4px 8px; border-radius: 12px; font-size: 11px;">
                                    {{ strtoupper($matricula->estado) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection