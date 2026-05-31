@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px;">
        
        <!-- Header con botón Nuevo Docente -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="color: #0B2B5B;">👨‍🏫 Lista de Docentes</h2>
            <a href="{{ route('docentes.create') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">
                + Nuevo Docente
            </a>
        </div>

        <!-- Tabla de Docentes (ordenada) -->
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #F5F7FA; border-bottom: 2px solid #E0E0E0;">
                        <th style="padding: 12px; text-align: left;">ID</th>
                        <th style="padding: 12px; text-align: left;">Nombre</th>
                        <th style="padding: 12px; text-align: left;">Apellido</th>
                        <th style="padding: 12px; text-align: left;">Especialidad</th>
                        <th style="padding: 12px; text-align: left;">Email</th>
                        <th style="padding: 12px; text-align: left;">Teléfono</th>
                        <th style="padding: 12px; text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($docentes as $docente)
                    <tr style="border-bottom: 1px solid #F0F0F0;">
                        <td style="padding: 12px;">{{ $docente->id_docente }}</td>
                        <td style="padding: 12px; font-weight: 500;">{{ $docente->nombre }}</td>
                        <td style="padding: 12px;">{{ $docente->apellido }}</td>
                        <td style="padding: 12px;">{{ $docente->especialidad ?? '—' }}</td>
                        <td style="padding: 12px;">{{ $docente->email }}</td>
                        <td style="padding: 12px;">{{ $docente->telefono ?? '—' }}</td>
                        <td style="padding: 12px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('docentes.show', $docente->id_docente) }}" style="color: #1E88E5; text-decoration: none;" title="Ver">
                                    👁️ Ver
                                </a>
                                <a href="{{ route('docentes.edit', $docente->id_docente) }}" style="color: #FB8C00; text-decoration: none;" title="Editar">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('docentes.destroy', $docente->id_docente) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Eliminar este docente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color: #E53935; cursor: pointer;" title="Eliminar">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="padding: 40px; text-align: center; color: #999;">
                            No hay docentes registrados. ¡Crea tu primer docente!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div style="margin-top: 20px;">
            {{ $docentes->links() }}
        </div>

    </div>
</div>
@endsection