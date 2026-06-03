<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Matrículas</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; margin: 20px; }
        h1 { color: #4c1d95; text-align: center; }
        .date { text-align: right; font-size: 12px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f3e8ff; }
        .footer { margin-top: 30px; text-align: center; font-size: 10px; }
    </style>
</head>
<body>
    <h1>Reporte de Matrículas</h1>
    <div class="date">Generado: {{ $fecha }}</div>
    <p>Total de matrículas: {{ count($matriculas) }}</p>
    <table>
        <thead><tr><th>ID</th><th>Alumno</th><th>Curso</th><th>Fecha</th><th>Estado</th></tr></thead>
        <tbody>
            @foreach($matriculas as $matricula)
            <tr><td>{{ $matricula->id_matricula }}</td><td>{{ $matricula->alumno->nombre ?? '' }} {{ $matricula->alumno->apellido ?? '' }}</td><td>{{ $matricula->curso->nombre_curso ?? 'N/A' }}</td><td>{{ \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y') }}</td><td>{{ $matricula->estado ?? 'Activo' }}</td></tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Blue Butterfly - Sistema de Gestión Académica</div>
</body>
</html>