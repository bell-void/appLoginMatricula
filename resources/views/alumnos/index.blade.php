@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px;">
        
        <!-- Header con botón Nuevo Alumno -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <h2 style="color: #0B2B5B; font-size: 24px; margin: 0;">
                📋 Lista de Alumnos
            </h2>
            <a href="{{ route('alumnos.create') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                ➕ Nuevo Alumno
            </a>
        </div>

        <!-- Tabla de Alumnos -->
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #F5F7FA; border-bottom: 2px solid #E0E0E0;">
                        <th style="padding: 12px; text-align: left;">ID</th>
                        <th style="padding: 12px; text-align: left;">Nombre</th>
                        <th style="padding: 12px; text-align: left;">Apellido</th>  <!-- ← CAMBIADO -->
                        <th style="padding: 12px; text-align: left;">Email</th>
                        <th style="padding: 12px; text-align: left;">Teléfono</th>
                        <!-- ❌ ELIMINAR DNI -->
                        <!-- ❌ ELIMINAR ESTADO -->
                        <th style="padding: 12px; text-align: center;">Acciones</th>
                    </table>
                </thead>
                <tbody>
                    @forelse($alumnos as $alumno)
                    <tr style="border-bottom: 1px solid #F0F0F0;">
                        <td style="padding: 12px;">{{ $alumno->id_alumno }}</td>
                        <td style="padding: 12px; font-weight: 500;">{{ $alumno->nombre }}</td>
                        <td style="padding: 12px;">{{ $alumno->apellido }}</td>  <!-- ← CAMBIADO -->
                        <td style="padding: 12px;">{{ $alumno->email }}</td>
                        <td style="padding: 12px;">{{ $alumno->telefono }}</td>
                        <!-- ❌ ELIMINAR DNI -->
                        <!-- ❌ ELIMINAR ESTADO -->
                        <td style="padding: 12px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('alumnos.show', $alumno->id_alumno) }}" style="color: #1E88E5; text-decoration: none;" title="Ver">👁️ Ver</a>
                                <a href="{{ route('alumnos.edit', $alumno->id_alumno) }}" style="color: #FB8C00; text-decoration: none;" title="Editar">✏️ Editar</a>
                                <form action="{{ route('alumnos.destroy', $alumno->id_alumno) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Eliminar este alumno?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color: #E53935; cursor: pointer;" title="Eliminar">🗑️ Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </table>
                    @empty
                    <tr>
                        <td colspan="6" style="padding: 40px; text-align: center; color: #999;">  <!-- ← Ajustar colspan -->
                            No hay alumnos registrados. ¡Crea tu primer alumno!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div style="margin-top: 20px;">
            {{ $alumnos->links() }}
        </div>

    </div>
</div>

<!-- Paginación con estilos -->
<div style="margin-top: 20px; display: flex; justify-content: center;">
    {{ $alumnos->links('pagination::bootstrap-5') }}
</div>

@endsection