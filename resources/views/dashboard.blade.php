@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card" style="background: white; flex-direction: column; padding: 40px; text-align: center; border-radius: 24px;">
        
        <div class="auth-form-header">
            <h2 style="font-family: 'Fraunces', serif; font-size: 36px; color: #111;">¡Bienvenido!</h2>
        </div>

        <div style="margin-top: 20px; color: #555;">
            <p>Has iniciado sesión correctamente, <strong>{{ Auth::user()->name }}</strong>.</p>
        </div>

        </div>
</div>
@endsection