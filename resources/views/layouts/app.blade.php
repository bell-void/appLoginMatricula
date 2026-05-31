<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KRONOS University — {{ config('app.name', 'KRONOS') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Cinzel:wght@400;500;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --gold:        #C9A84C;
            --gold-light:  #E2C97E;
            --gold-dim:    rgba(201, 168, 76, 0.35);
            --gold-faint:  rgba(201, 168, 76, 0.12);
            --dark:        #080C14;
            --dark-2:      #0D1220;
            --dark-card:   rgba(13, 18, 32, 0.88);
            --dark-input:  rgba(255,255,255,0.05);
            --dark-border: rgba(255,255,255,0.09);
            --text-white:  #F5F0E8;
            --text-muted:  rgba(245,240,232,0.45);
        }

        html, body {
            min-height: 100vh;
            background: var(--dark);
            font-family: 'Inter', sans-serif;
            color: var(--text-white);
        }

        /* ── FONDO ANIMADO ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse 80% 60% at 20% 20%, rgba(201,168,76,0.06) 0%, transparent 60%),
                radial-gradient(ellipse 60% 80% at 80% 80%, rgba(15,25,55,0.7) 0%, transparent 60%),
                linear-gradient(160deg, #080C14 0%, #0D1220 50%, #080C14 100%);
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(201,168,76,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201,168,76,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        /* ── LAYOUT AUTH ── */
        .auth-page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        /* MARCA SUPERIOR */
        .auth-brand-top {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 32px;
            opacity: 0;
            transform: translateY(-16px);
            animation: authFadeDown 0.7s cubic-bezier(0.22,1,0.36,1) 0.1s forwards;
        }

        .brand-crest {
            width: 52px;
            height: 60px;
            margin-bottom: 12px;
            filter: drop-shadow(0 0 14px rgba(201,168,76,0.35));
        }

        .brand-name {
            font-family: 'Cinzel', serif;
            font-size: 22px;
            font-weight: 500;
            letter-spacing: 0.35em;
            color: var(--gold);
        }

        .brand-sub {
            font-family: 'Cinzel', serif;
            font-size: 9px;
            letter-spacing: 0.5em;
            color: rgba(201,168,76,0.5);
            margin-top: 3px;
        }

        /* ── CARD ── */
        .auth-card {
            width: 100%;
            max-width: 460px;
            background: var(--dark-card);
            border: 1px solid rgba(201,168,76,0.18);
            border-radius: 18px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow:
                0 0 0 1px rgba(255,255,255,0.04) inset,
                0 30px 80px rgba(0,0,0,0.6),
                0 0 60px rgba(201,168,76,0.05);
            overflow: hidden;
            opacity: 0;
            transform: translateY(24px);
            animation: authFadeUp 0.7s cubic-bezier(0.22,1,0.36,1) 0.25s forwards;
        }

        /* TABS */
        .auth-tabs {
            display: flex;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .auth-tab {
            flex: 1;
            padding: 18px 20px;
            font-family: 'Cinzel', serif;
            font-size: 10px;
            letter-spacing: 0.3em;
            color: var(--text-muted);
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
            background: none;
            transition: color 0.3s, background 0.3s;
            position: relative;
        }

        .auth-tab.active {
            color: var(--gold);
            background: rgba(201,168,76,0.05);
        }

        .auth-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 20%;
            right: 20%;
            height: 2px;
            background: var(--gold);
            border-radius: 1px 1px 0 0;
        }

        /* CUERPO DEL CARD */
        .auth-body {
            padding: 36px 40px 40px;
        }

        .auth-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 400;
            color: var(--text-white);
            margin-bottom: 6px;
            letter-spacing: 0.01em;
        }

        .auth-desc {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 28px;
            font-weight: 300;
            line-height: 1.6;
        }

        /* BOTONES SOCIALES */
        .social-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 24px;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 14px;
            background: var(--dark-input);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            color: var(--text-white);
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 400;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.25s, border-color 0.25s, transform 0.15s;
        }

        .btn-social:hover {
            background: rgba(255,255,255,0.09);
            border-color: rgba(255,255,255,0.16);
            transform: translateY(-1px);
            color: #fff;
        }

        .btn-social:active { transform: translateY(0); }

        .btn-social svg { flex-shrink: 0; }

        /* SEPARADOR */
        .auth-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
            font-family: 'Cinzel', serif;
            font-size: 9px;
            letter-spacing: 0.3em;
            color: var(--text-muted);
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--dark-border);
        }

        /* INPUTS */
        .field-group {
            margin-bottom: 16px;
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(201,168,76,0.5);
            pointer-events: none;
            display: flex;
            align-items: center;
        }

        .field-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            padding: 4px;
            transition: color 0.2s;
        }

        .field-toggle:hover { color: rgba(255,255,255,0.7); }

        .field-input {
            width: 100%;
            padding: 13px 16px 13px 44px;
            background: var(--dark-input);
            border: 1px solid var(--dark-border);
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: var(--text-white);
            outline: none;
            transition: border-color 0.25s, box-shadow 0.25s, background 0.25s;
        }

        .field-input::placeholder { color: rgba(255,255,255,0.22); }

        .field-input:focus {
            border-color: rgba(201,168,76,0.5);
            background: rgba(255,255,255,0.07);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.08);
        }

        .field-input.has-toggle { padding-right: 44px; }

        .field-input.is-error {
            border-color: rgba(239,68,68,0.6) !important;
            box-shadow: 0 0 0 3px rgba(239,68,68,0.08) !important;
        }

        .error-msg {
            display: block;
            font-size: 11.5px;
            color: #f87171;
            margin-top: 5px;
            padding-left: 4px;
        }

        /* FILA OPCIONES */
        .field-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .check-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: var(--text-muted);
            cursor: pointer;
            user-select: none;
        }

        .check-label input[type="checkbox"] {
            width: 15px; height: 15px;
            accent-color: var(--gold);
            cursor: pointer;
        }

        .link-forgot {
            font-size: 12px;
            color: var(--gold);
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .link-forgot:hover { opacity: 0.75; }

        /* BOTÓN PRINCIPAL */
        .btn-submit {
            width: 100%;
            padding: 14px 20px;
            background: linear-gradient(135deg, #C9A84C 0%, #E2C97E 50%, #C9A84C 100%);
            background-size: 200% 100%;
            background-position: 0% 0%;
            border: none;
            border-radius: 10px;
            color: #0D1220;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background-position 0.4s ease, transform 0.15s, box-shadow 0.3s;
            box-shadow: 0 4px 20px rgba(201,168,76,0.3);
        }

        .btn-submit:hover {
            background-position: 100% 0%;
            transform: translateY(-1px);
            box-shadow: 0 6px 28px rgba(201,168,76,0.45);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: 0 2px 12px rgba(201,168,76,0.25);
        }

        .btn-arrow {
            font-size: 14px;
            transition: transform 0.2s;
        }
        .btn-submit:hover .btn-arrow { transform: translateX(3px); }

        /* FOOTER DEL CARD */
        .auth-card-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .auth-card-footer a {
            color: var(--gold);
            font-weight: 600;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .auth-card-footer a:hover { opacity: 0.75; }

        /* CHECKBOX TERMS */
        .terms-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 22px;
        }

        .terms-row input[type="checkbox"] {
            width: 15px; height: 15px;
            margin-top: 2px;
            accent-color: var(--gold);
            cursor: pointer;
            flex-shrink: 0;
        }

        .terms-text {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .terms-text a {
            color: var(--gold);
            text-decoration: underline;
            text-decoration-color: rgba(201,168,76,0.4);
            transition: opacity 0.2s;
        }
        .terms-text a:hover { opacity: 0.75; }

        /* COPYRIGHT */
        .auth-footer {
            margin-top: 28px;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            color: rgba(201,168,76,0.22);
            letter-spacing: 0.1em;
            opacity: 0;
            animation: authFadeUp 0.5s ease 0.6s forwards;
        }

        /* ALERTAS */
        .alert {
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 16px;
        }
        .alert-danger  { background: rgba(239,68,68,0.12); border: 1px solid rgba(239,68,68,0.3); color: #fca5a5; }
        .alert-success { background: rgba(34,197,94,0.10); border: 1px solid rgba(34,197,94,0.3); color: #86efac; }
        .alert ul { padding-left: 18px; }

        /* ── KEYFRAMES ── */
        @keyframes authFadeDown {
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes authFadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 520px) {
            .auth-body { padding: 28px 24px 32px; }
            .social-grid { grid-template-columns: 1fr; }
            .auth-card { border-radius: 16px; }
        }
    </style>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
