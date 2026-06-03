<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Alumnos</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; margin: 20px; }
        h1 { color: #4c1d95; text-align: center; }
        .header { text-align: center; margin-bottom: 20px; }
        .date { text-align: right; font-size: 12px; color: gray; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f3e8ff; }
        .footer { margin-top: 30px; text-align: center; font-size: 10px; color: gray; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Blue Butterfly - Reporte de Alumnos</h1>
    </div>
    <div class="date">Generado: {{ $fecha }}</div>
    <p>Total de alumnos: {{ count($alumnos) }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id_alumno }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->apellido }}</td>
                <td>{{ $alumno->email }}</td>
                <td>{{ $alumno->telefono ?? '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Blue Butterfly - Sistema de Gestión Académica</div>
</body>
</html>