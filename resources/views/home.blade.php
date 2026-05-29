@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; flex-direction: column; padding: 40px; text-align: center; border-radius: 24px;">
        
        <div class="auth-form-header">
            <h2 style="font-family: 'Fraunces', serif; font-size: 30px; color: #111;">Dashboard</h2>
        </div>

        <div style="margin-top: 20px; color: #555;">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p>¡Bienvenido, {{ Auth::user()->name }}! Has iniciado sesión correctamente.</p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('dashboard') }}" class="btn-submit" style="width: 200px; display: inline-block; text-decoration: none;">
                Ir al Panel
            </a>
        </div>
    </div>
</div>
@endsection