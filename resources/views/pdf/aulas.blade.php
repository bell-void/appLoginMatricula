<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Aulas</title>
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
    <h1>Blue Butterfly - Reporte de Aulas</h1>
    <div class="date">Generado: {{ $fecha }}</div>

    <div class="info">
        <strong>Total de aulas:</strong> {{ count($aulas) }}
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del aula</th>
                <th>Capacidad</th>
                <th>Ubicación</th>
                <th>Equipamiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aulas as $aula)
            <tr>
                <td>{{ $aula->id_aula }}</td>
                <td>{{ $aula->nombre_aula ?? $aula->nombre ?? 'N/A' }}</td
                <td>{{ $aula->capacidad }}学
                <td>{{ $aula->ubicacion ?? '—' }}学
                <td>{{ $aula->equipamiento ?? '—' }}学
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