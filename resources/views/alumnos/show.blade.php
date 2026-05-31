@extends('layouts.app')

@section('content')
<div class="bbn-show-container">
    <div class="show-header">
        <a href="{{ route('dashboard') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <h1>Detalle del Alumno</h1>
        <div></div> <!-- spacer para centrar -->
    </div>

    <div class="show-card">
        <div class="detail-info">
            <div class="detail-row">
                <span class="detail-label">ID</span>
                <span class="detail-value">{{ $alumno->id_alumno }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Nombre completo</span>
                <span class="detail-value">{{ $alumno->nombre }} {{ $alumno->apellido }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Fecha de nacimiento</span>
                <span class="detail-value">{{ \Carbon\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Correo electrónico</span>
                <span class="detail-value">{{ $alumno->email }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Teléfono</span>
                <span class="detail-value">{{ $alumno->telefono ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Dirección</span>
                <span class="detail-value">{{ $alumno->direccion ?? '—' }}</span>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('alumnos.edit', $alumno->id_alumno) }}" class="btn-edit">
                <i class="fas fa-edit"></i> Editar alumno
            </a>
            <a href="{{ route('alumnos.index') }}" class="btn-back-list">
                <i class="fas fa-list"></i> Volver al listado
            </a>
        </div>

        @if($alumno->matriculas && $alumno->matriculas->count() > 0)
        <div class="matriculas-section">
            <h3>Cursos matriculados</h3>
            <div class="table-responsive">
                <table class="matriculas-table">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Semestre</th>
                            <th>Nota</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumno->matriculas as $matricula)
                        <tr>
                            <td>{{ $matricula->curso->nombre_curso ?? 'N/A' }}</td>
                            <td>{{ $matricula->semestre ?? '—' }}</td>
                            <td>{{ $matricula->nota_final ?? '—' }}</td>
                            <td>
                                @php
                                    $estadoClass = match($matricula->estado) {
                                        'aprobado' => 'estado-aprobado',
                                        'reprobado' => 'estado-reprobado',
                                        default => 'estado-cursando'
                                    };
                                @endphp
                                <span class="estado-badge {{ $estadoClass }}">
                                    {{ strtoupper($matricula->estado ?? 'CURSANDO') }}
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

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

    .bbn-show-container {
        padding: 2rem;
        background: linear-gradient(145deg, #0a0a0f 0%, #1a1a2e 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .show-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 800px;
        margin-bottom: 2rem;
    }

    .show-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 1.8rem;
        font-weight: 700;
        background: linear-gradient(135deg, #fff, #a78bfa);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        border-radius: 40px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(168,85,247,0.3);
        color: #a78bfa;
        text-decoration: none;
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        transition: all 0.2s;
    }

    .btn-back:hover {
        background: rgba(168,85,247,0.15);
        color: white;
        transform: translateY(-2px);
    }

    .show-card {
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 32px;
        padding: 2rem;
        width: 100%;
        max-width: 800px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .detail-info {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .detail-row {
        display: flex;
        align-items: baseline;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .detail-label {
        width: 160px;
        font-family: 'Space Mono', monospace;
        font-size: 0.8rem;
        font-weight: 600;
        color: #c4b5fd;
        letter-spacing: 0.5px;
    }

    .detail-value {
        flex: 1;
        font-size: 0.9rem;
        color: #e2e8f0;
        word-break: break-word;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 1rem;
    }

    .btn-edit, .btn-back-list {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        border-radius: 40px;
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-edit {
        background: #7c3aed;
        color: white;
        box-shadow: 0 2px 8px rgba(124,58,237,0.3);
    }

    .btn-edit:hover {
        background: #6d28d9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124,58,237,0.4);
    }

    .btn-back-list {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.15);
        color: #e2e8f0;
    }

    .btn-back-list:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-2px);
    }

    .matriculas-section {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .matriculas-section h3 {
        font-family: 'Space Mono', monospace;
        font-size: 1.2rem;
        font-weight: 600;
        color: #a78bfa;
        margin-bottom: 1rem;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .matriculas-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.85rem;
        color: #e2e8f0;
    }

    .matriculas-table th {
        text-align: left;
        padding: 12px 12px;
        background: rgba(0,0,0,0.3);
        font-family: 'Space Mono', monospace;
        font-weight: 600;
        color: #c4b5fd;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .matriculas-table td {
        padding: 10px 12px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        vertical-align: middle;
    }

    .estado-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .estado-aprobado {
        background: rgba(34,197,94,0.15);
        color: #4ade80;
    }

    .estado-reprobado {
        background: rgba(239,68,68,0.15);
        color: #f87171;
    }

    .estado-cursando {
        background: rgba(245,158,11,0.15);
        color: #fbbf24;
    }

    @media (max-width: 600px) {
        .bbn-show-container {
            padding: 1rem;
        }
        .show-header {
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }
        .detail-row {
            flex-direction: column;
            gap: 0.3rem;
        }
        .detail-label {
            width: auto;
        }
        .action-buttons {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-edit, .btn-back-list {
            justify-content: center;
        }
    }
</style>
@endsection