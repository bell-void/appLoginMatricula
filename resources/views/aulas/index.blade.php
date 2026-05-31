@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="color: #0B2B5B;">🏫 Lista de Aulas</h2>
            <a href="{{ route('aulas.create') }}" style="background: #00ACC1; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none;">+ Nueva Aula</a>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #F5F7FA;">
                        <th style="padding: 12px;">ID</th>
                        <th style="padding: 12px;">Nombre</th>
                        <th style="padding: 12px;">Capacidad</th>
                        <th style="padding: 12px;">Ubicación</th>
                        <th style="padding: 12px;">Acciones</th>
                    <tr>
                </thead>
                <tbody>
                    @forelse($aulas as $aula)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $aula->id_aula }}</td>
                        <td style="padding: 12px; font-weight: 500;">{{ $aula->nombre_aula }}</td>
                        <td style="padding: 12px;">{{ $aula->capacidad }}</td>
                        <td style="padding: 12px;">{{ $aula->ubicacion ?? '—' }}</td>
                        <td style="padding: 12px;">
                            <a href="{{ route('aulas.show', $aula->id_aula) }}">👁️</a>
                            <a href="{{ route('aulas.edit', $aula->id_aula) }}">✏️</a>
                            <form action="{{ route('aulas.destroy', $aula->id_aula) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:red; cursor:pointer;" onclick="return confirm('¿Eliminar aula?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:40px;">No hay aulas registradas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div style="margin-top:20px;">
            {{ $aulas->links() }}
        </div>
        
    </div>
</div>
@endsection