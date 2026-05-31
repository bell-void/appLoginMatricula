@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="color: #0B2B5B;">🕐 Lista de Horarios</h2>
            <a href="{{ route('horarios.create') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">+ Nuevo Horario</a>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #F5F7FA;">
                        <th style="padding: 12px;">ID</th>
                        <th style="padding: 12px;">Curso</th>
                        <th style="padding: 12px;">Día</th>
                        <th style="padding: 12px;">Hora Inicio</th>
                        <th style="padding: 12px;">Hora Fin</th>
                        <th style="padding: 12px;">Aula</th>
                        <th style="padding: 12px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($horarios as $horario)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $horario->id_horario }}</td>
                        <td style="padding: 12px;">{{ $horario->curso->nombre_curso ?? 'N/A' }}</td>
                        <td style="padding: 12px;">{{ $horario->dia_semana }}</td>
                        <td style="padding: 12px;">{{ $horario->hora_inicio }}</td>
                        <td style="padding: 12px;">{{ $horario->hora_fin }}</td>
                        <td style="padding: 12px;">{{ $horario->aula->nombre_aula ?? 'N/A' }}</td>
                        <td style="padding: 12px;">
                            <a href="{{ route('horarios.show', $horario->id_horario) }}">👁️</a>
                            <a href="{{ route('horarios.edit', $horario->id_horario) }}">✏️</a>
                            <form action="{{ route('horarios.destroy', $horario->id_horario) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:red; cursor:pointer;" onclick="return confirm('¿Eliminar horario?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding:40px;">No hay horarios registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div style="margin-top:20px;">
            {{ $horarios->links() }}
        </div>
        
    </div>
</div>
@endsection