@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="color: #0B2B5B;">📚 Lista de Cursos</h2>
            <a href="{{ route('cursos.create') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">+ Nuevo Curso</a>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #F5F7FA;">
                        <th style="padding: 12px;">ID</th>
                        <th style="padding: 12px;">Curso</th>
                        <th style="padding: 12px;">Créditos</th>
                        <th style="padding: 12px;">Descripción</th>
                        <th style="padding: 12px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cursos as $curso)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $curso->id_curso }}</td>
                        <td style="padding: 12px; font-weight: 500;">{{ $curso->nombre_curso }}</td>
                        <td style="padding: 12px;">{{ $curso->creditos }}</td>
                        <td style="padding: 12px;">{{ \Illuminate\Support\Str::limit($curso->descripcion, 50) }}</td>
                        <td style="padding: 12px;">
                            <a href="{{ route('cursos.show', $curso->id_curso) }}">👁️</a>
                            <a href="{{ route('cursos.edit', $curso->id_curso) }}">✏️</a>
                            <form action="{{ route('cursos.destroy', $curso->id_curso) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:red; cursor:pointer;" onclick="return confirm('¿Eliminar curso?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:40px;">No hay cursos registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div style="margin-top:20px;">
            {{ $cursos->links() }}
        </div>
        
    </div>
</div>
@endsection