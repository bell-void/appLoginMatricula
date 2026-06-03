<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Horarios</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        h1 {
            color: #4c1d95;
            text-align: center;
            margin-bottom: 10px;
        }
        .date {
            text-align: right;
            font-size: 10px;
            color: #6b7280;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 20px;
            padding: 10px;
            background: #f3f4f6;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background: #ede9fe;
            color: #4c1d95;
            font-weight: 600;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Blue Butterfly - Reporte de Horarios</h1>
    <div class="date">Generado: {{ $fecha }}</div>

    <div class="info">
        <strong>Total de horarios:</strong> {{ count($horarios) }} |
        <strong>Cursos con horario:</strong> {{ $horarios->unique('id_curso')->count() }} |
        <strong>Aulas ocupadas:</strong> {{ $horarios->unique('id_aula')->count() }}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Curso</th>
                <th>Día</th>
                <th>Hora inicio</th>
                <th>Hora fin</th>
                <th>Aula</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->id_horario }}</td>
                <td>{{ $horario->curso->nombre_curso ?? 'N/A' }} ({ $horario->curso->id_curso ?? '' }})</td
                <td>{{ $horario->dia_semana }}</td
                <td>{{ $horario->hora_inicio }}</td
                <td>{{ $horario->hora_fin }}</td
                <td>{{ $horario->aula->nombre_aula ?? 'N/A' }} ({{ $horario->id_aula }})</td
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Blue Butterfly - Sistema de Gestión Académica<br>
        Reporte generado automáticamente
    </div>
</body>
</html>