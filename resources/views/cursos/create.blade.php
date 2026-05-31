@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 30px; border-radius: 20px; max-width: 600px; margin: 0 auto;">
        
        <h2 style="color: #0B2B5B; text-align: center;">📝 Registrar Curso</h2>

        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Nombre del Curso *</label>
                <input type="text" name="nombre_curso" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Créditos *</label>
                <input type="number" name="creditos" min="1" max="10" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

            <!-- ✅ CAMPO DOCENTE AGREGADO -->
            <div style="margin-bottom: 15px;">
                <label>Docente *</label>
                <select name="id_docente" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                    <option value="">Seleccione un docente</option>
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id_docente }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label>Descripción</label>
                <textarea name="descripcion" rows="4" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></textarea>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="background: #1E88E5; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; flex:1;">Guardar</button>
                <a href="{{ route('cursos.index') }}" style="background: #ccc; color: #333; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; flex:1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection