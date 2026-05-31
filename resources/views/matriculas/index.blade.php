@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="color: #0B2B5B;">✏️ Lista de Matrículas</h2>
            <a href="{{ route('matriculas.create') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">+ Nueva Matrícula</a>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #F5F7FA;">
                        <th style="padding: 12px;">ID</th>
                        <th style="padding: 12px;">Alumno</th>
                        <th style="padding: 12px;">Curso</th>
                        <th style="padding: 12px;">Fecha Matrícula</th>
                        <th style="padding: 12px;">Estado</th>
                        <th style="padding: 12px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($matriculas as $matricula)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $matricula->id_matricula }}</td>
                        <td style="padding: 12px;">{{ $matricula->alumno->nombre ?? 'N/A' }} {{ $matricula->alumno->apellido ?? '' }}</td>
                        <td style="padding: 12px;">{{ $matricula->curso->nombre_curso ?? 'N/A' }}</td>
                        <td style="padding: 12px;">{{ \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y') }}</td>
                        <td style="padding: 12px;">
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
                        </td>
                        <td style="padding: 12px;">
                            <a href="{{ route('matriculas.show', $matricula->id_matricula) }}">👁️</a>
                            <a href="{{ route('matriculas.edit', $matricula->id_matricula) }}">✏️</a>
                            <form action="{{ route('matriculas.destroy', $matricula->id_matricula) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:red; cursor:pointer;" onclick="return confirm('¿Eliminar matrícula?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding:40px;">No hay matrículas registradas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div style="margin-top:20px;">
            {{ $matriculas->links() }}
        </div>
        
    </div>
</div>
@endsection