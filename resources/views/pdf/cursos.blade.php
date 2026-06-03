<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Cursos</title>
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
    <h1>Reporte de Cursos</h1>
    <div class="date">Generado: {{ $fecha }}</div>
    <p>Total de cursos: {{ count($cursos) }} | Créditos totales: {{ $totalCreditos }}</p>
    <table>
        <thead><tr><th>ID</th><th>Nombre del curso</th><th>Créditos</th><th>Descripción</th></tr></thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr><td>{{ $curso->id_curso }}</td><td>{{ $curso->nombre_curso }}</td><td>{{ $curso->creditos }}</td><td>{{ $curso->descripcion ?? '—' }}</td></tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Blue Butterfly - Sistema de Gestión Académica</div>
</body>
</html>