@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; padding: 40px; border-radius: 24px; max-width: 1200px; margin: 0 auto;">
        
        <!-- Mensaje de bienvenida -->
        <div style="text-align: center; margin-bottom: 40px;">
            <div style="font-size: 48px; margin-bottom: 10px;">🦋</div>
            <h2 style="font-family: 'Fraunces', serif; font-size: 32px; color: #0B2B5B; margin: 0;">¡Bienvenido!</h2>
            <p style="color: #666; margin-top: 10px;">
                Has iniciado sesión correctamente, <strong style="color: #1E88E5;">{{ Auth::user()->name }}</strong>
            </p>
        </div>

        <!-- 6 CARDS ORDENADAS EN GRID -->
        <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 20px; margin-bottom: 35px;">
            
            <!-- CARD 1: ALUMNOS -->
            <div style="background: linear-gradient(135deg, #1E88E5, #0B2B5B); padding: 20px 15px; border-radius: 20px; color: white; text-align: center; transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 40px; margin-bottom: 10px;">👨‍🎓</div>
                <div style="font-size: 32px; font-weight: bold;">{{ \App\Models\Alumno::count() }}</div>
                <div style="font-size: 12px; margin-top: 8px; opacity: 0.9;">ALUMNOS REGISTRADOS</div>
                <div style="margin-top: 12px;">
                    <a href="{{ route('alumnos.index') }}" style="color: white; font-size: 12px; text-decoration: none; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 8px; display: inline-block;">Ver detalles →</a>
                </div>
            </div>
            
            <!-- CARD 2: CURSOS -->
            <div style="background: linear-gradient(135deg, #43A047, #1B5E20); padding: 20px 15px; border-radius: 20px; color: white; text-align: center; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 40px; margin-bottom: 10px;">📚</div>
                <div style="font-size: 32px; font-weight: bold;">{{ \App\Models\Curso::count() }}</div>
                <div style="font-size: 12px; margin-top: 8px; opacity: 0.9;">CURSOS DISPONIBLES</div>
                <div style="margin-top: 12px;">
                    <a href="{{ route('cursos.index') }}" style="color: white; font-size: 12px; text-decoration: none; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 8px; display: inline-block;">Ver detalles →</a>
                </div>
            </div>
            
            <!-- CARD 3: DOCENTES -->
            <div style="background: linear-gradient(135deg, #FB8C00, #E65100); padding: 20px 15px; border-radius: 20px; color: white; text-align: center; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 40px; margin-bottom: 10px;">👨‍🏫</div>
                <div style="font-size: 32px; font-weight: bold;">{{ \App\Models\Docente::count() }}</div>
                <div style="font-size: 12px; margin-top: 8px; opacity: 0.9;">DOCENTES ACTIVOS</div>
                <div style="margin-top: 12px;">
                    <a href="{{ route('docentes.index') }}" style="color: white; font-size: 12px; text-decoration: none; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 8px; display: inline-block;">Ver detalles →</a>
                </div>
            </div>
            
            <!-- CARD 4: HORARIOS -->
            <div style="background: linear-gradient(135deg, #8E24AA, #4A148C); padding: 20px 15px; border-radius: 20px; color: white; text-align: center; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 40px; margin-bottom: 10px;">🕐</div>
                <div style="font-size: 32px; font-weight: bold;">{{ \App\Models\Horario::count() }}</div>
                <div style="font-size: 12px; margin-top: 8px; opacity: 0.9;">HORARIOS CONFIGURADOS</div>
                <div style="margin-top: 12px;">
                    <a href="{{ route('horarios.index') }}" style="color: white; font-size: 12px; text-decoration: none; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 8px; display: inline-block;">Ver detalles →</a>
                </div>
            </div>
            
            <!-- CARD 5: MATRÍCULAS -->
            <div style="background: linear-gradient(135deg, #E53935, #B71C1C); padding: 20px 15px; border-radius: 20px; color: white; text-align: center; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 40px; margin-bottom: 10px;">✏️</div>
                <div style="font-size: 32px; font-weight: bold;">{{ \App\Models\Matricula::count() }}</div>
                <div style="font-size: 12px; margin-top: 8px; opacity: 0.9;">MATRÍCULAS TOTALES</div>
                <div style="margin-top: 12px;">
                    <a href="{{ route('matriculas.index') }}" style="color: white; font-size: 12px; text-decoration: none; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 8px; display: inline-block;">Ver detalles →</a>
                </div>
            </div>
            
            <!-- CARD 6: AULAS -->
            <div style="background: linear-gradient(135deg, #00ACC1, #006064); padding: 20px 15px; border-radius: 20px; color: white; text-align: center; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 40px; margin-bottom: 10px;">🏫</div>
                <div style="font-size: 32px; font-weight: bold;">{{ \App\Models\Aula::count() }}</div>
                <div style="font-size: 12px; margin-top: 8px; opacity: 0.9;">AULAS REGISTRADAS</div>
                <div style="margin-top: 12px;">
                    <a href="{{ route('aulas.index') }}" style="color: white; font-size: 12px; text-decoration: none; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 8px; display: inline-block;">Ver detalles →</a>
                </div>
            </div>
            
        </div>
        
        <!-- ACCESOS RÁPIDOS -->
        <div style="margin-bottom: 35px;">
            <h3 style="color: #0B2B5B; font-size: 16px; margin-bottom: 15px;">⚡ ACCESOS RÁPIDOS</h3>
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                <a href="{{ route('alumnos.create') }}" style="background: #1E88E5; color: white; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
                    <span>+</span> Nuevo Alumno
                </a>
                <a href="{{ route('cursos.create') }}" style="background: #43A047; color: white; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
                    <span>+</span> Nuevo Curso
                </a>
                <a href="{{ route('docentes.create') }}" style="background: #FB8C00; color: white; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
                    <span>+</span> Nuevo Docente
                </a>
                <a href="{{ route('horarios.create') }}" style="background: #8E24AA; color: white; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
                    <span>+</span> Nuevo Horario
                </a>
                <a href="{{ route('matriculas.create') }}" style="background: #E53935; color: white; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
                    <span>+</span> Nueva Matrícula
                </a>
                <a href="{{ route('aulas.create') }}" style="background: #00ACC1; color: white; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
                    <span>+</span> Nueva Aula
                </a>
            </div>
        </div>
        
        <!-- TABLA DE ÚLTIMOS ALUMNOS -->
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h3 style="color: #0B2B5B; font-size: 16px;">📋 ÚLTIMOS ALUMNOS REGISTRADOS</h3>
                <a href="{{ route('alumnos.index') }}" style="color: #1E88E5; font-size: 12px; text-decoration: none;">Ver todos →</a>
            </div>
            
            <div style="overflow-x: auto; background: #F8F9FA; border-radius: 16px; padding: 5px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #E0E0E0;">
                            <th style="padding: 14px 12px; text-align: left; font-size: 12px; color: #666; font-weight: 600;">ID</th>
                            <th style="padding: 14px 12px; text-align: left; font-size: 12px; color: #666; font-weight: 600;">NOMBRE</th>
                            <th style="padding: 14px 12px; text-align: left; font-size: 12px; color: #666; font-weight: 600;">APELLIDO</th>
                            <th style="padding: 14px 12px; text-align: left; font-size: 12px; color: #666; font-weight: 600;">EMAIL</th>
                            <th style="padding: 14px 12px; text-align: left; font-size: 12px; color: #666; font-weight: 600;">TELÉFONO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Alumno::latest()->take(5)->get() as $alumno)
                        <tr style="border-bottom: 1px solid #E8E8E8;">
                            <td style="padding: 12px; font-size: 13px; color: #333;">{{ $alumno->id_alumno }}</td>
                            <td style="padding: 12px; font-size: 13px; font-weight: 500; color: #0B2B5B;">{{ $alumno->nombre }}</td>
                            <td style="padding: 12px; font-size: 13px; color: #555;">{{ $alumno->apellido ?? '—' }}</td>
                            <td style="padding: 12px; font-size: 13px; color: #555;">{{ $alumno->email ?? '—' }}</td>
                            <td style="padding: 12px; font-size: 13px; color: #555;">{{ $alumno->telefono ?? '—' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 40px; text-align: center; color: #999;">
                                No hay alumnos registrados. ¡Crea tu primer alumno!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- PIE DE PÁGINA -->
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #E0E0E0; text-align: center;">
            <p style="color: #999; font-size: 11px;">
                Blue Butterfly Network - Sistema de Gestión de Matrículas © {{ date('Y') }}
            </p>
        </div>
        
    </div>
</div>
@endsection