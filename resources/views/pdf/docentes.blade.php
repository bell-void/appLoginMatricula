<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Docentes</title>
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
    <h1>Reporte de Docentes</h1>
    <div class="date">Generado: {{ $fecha }}</div>
    <p>Total de docentes: {{ count($docentes) }}</p>
    <table>
        <thead><tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Especialidad</th></tr></thead>
        <tbody>
            @foreach($docentes as $docente)
            <tr><td>{{ $docente->id_docente }}</td><td>{{ $docente->nombre }}</td><td>{{ $docente->apellido }}</td><td>{{ $docente->email }}</td><td>{{ $docente->especialidad ?? '—' }}</td></tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Blue Butterfly - Sistema de Gestión Académica</div>
</body>
</html>