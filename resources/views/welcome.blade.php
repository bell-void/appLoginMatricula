<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRONOS University</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Cinzel:wght@400;500;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --gold: #C9A84C;
            --gold-light: #E2C97E;
            --gold-dim: rgba(201, 168, 76, 0.35);
            --dark: #080C14;
            --dark-2: #0D1220;
            --dark-3: #111827;
        }

        html, body {
            width: 100%; height: 100%;
            background: var(--dark);
            overflow: hidden;
            cursor: pointer;
        }

        /* ── CANVAS DE PARTÍCULAS ── */
        #particles-canvas {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        /* ── GRID SUTIL ── */
        .grid-overlay {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(201,168,76,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201,168,76,0.04) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* ── VIGNETTE ── */
        .vignette {
            position: fixed;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            background: radial-gradient(ellipse at center,
                transparent 30%,
                rgba(8,12,20,0.5) 70%,
                rgba(8,12,20,0.9) 100%);
        }

        /* ── ESQUINAS DECORATIVAS ── */
        .corner {
            position: fixed;
            z-index: 10;
            font-family: 'Cinzel', serif;
            font-size: 10px;
            letter-spacing: 3px;
            color: rgba(201,168,76,0.35);
        }
        .corner-tl { top: 28px; left: 36px; }
        .corner-tr { top: 28px; right: 36px; text-align: right; }

        /* ── CONTENIDO PRINCIPAL ── */
        #splash-content {
            position: fixed;
            inset: 0;
            z-index: 20;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0;
        }

        /* ESCUDO */
        .crest-wrapper {
            margin-bottom: 32px;
            opacity: 0;
            transform: translateY(-20px) scale(0.9);
            animation: fadeDown 1s cubic-bezier(0.22, 1, 0.36, 1) 0.3s forwards;
        }

        .crest-svg {
            width: 80px;
            height: 92px;
            filter: drop-shadow(0 0 20px rgba(201,168,76,0.4));
        }

        /* NOMBRE - letras individuales */
        .kronos-word {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .kronos-letter {
            font-family: 'Cinzel', serif;
            font-size: clamp(52px, 8vw, 88px);
            font-weight: 500;
            color: var(--gold);
            letter-spacing: 0.05em;
            opacity: 0;
            transform: translateY(30px);
            text-shadow: 0 0 40px rgba(201,168,76,0.3);
        }

        /* Animación escalonada para cada letra */
        .kronos-letter:nth-child(1) { animation: riseUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 0.7s forwards; }
        .kronos-letter:nth-child(2) { animation: riseUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 0.82s forwards; }
        .kronos-letter:nth-child(3) { animation: riseUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 0.94s forwards; }
        .kronos-letter:nth-child(4) { animation: riseUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 1.06s forwards; }
        .kronos-letter:nth-child(5) { animation: riseUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 1.18s forwards; }
        .kronos-letter:nth-child(6) { animation: riseUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) 1.30s forwards; }

        .university-sub {
            font-family: 'Cinzel', serif;
            font-size: clamp(11px, 1.5vw, 14px);
            letter-spacing: 0.55em;
            color: rgba(201,168,76,0.6);
            text-transform: uppercase;
            opacity: 0;
            animation: fadeIn 1s ease 1.7s forwards;
            margin-bottom: 36px;
        }

        /* LÍNEA DIVISORA */
        .divider-line {
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-dim), transparent);
            margin-bottom: 36px;
            animation: expandLine 1s ease 1.9s forwards;
        }

        /* SALUDO */
        .greeting-block {
            text-align: center;
            opacity: 0;
            animation: fadeIn 0.8s ease 2.3s forwards;
        }

        .greeting-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(22px, 3.5vw, 34px);
            font-weight: 400;
            color: #fff;
            letter-spacing: 0.04em;
            margin-bottom: 8px;
        }

        .greeting-sub {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 300;
            color: rgba(255,255,255,0.35);
            letter-spacing: 0.05em;
        }

        /* RELOJ */
        .clock-block {
            margin-top: 28px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 0.8s ease 2.6s forwards;
        }

        .clock-time {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 300;
            color: var(--gold);
            letter-spacing: 0.08em;
            line-height: 1;
        }

        .clock-date {
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 300;
            color: rgba(201,168,76,0.5);
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-top: 8px;
        }

        /* TOQUE PARA CONTINUAR */
        .tap-cta {
            margin-top: 52px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease 3.2s forwards;
        }

        .tap-bar {
            width: 1px;
            height: 32px;
            background: linear-gradient(to bottom, transparent, var(--gold-dim));
            margin: 0 auto 16px;
            animation: pulseBar 2s ease-in-out 3.5s infinite;
        }

        .tap-label {
            font-family: 'Cinzel', serif;
            font-size: 10px;
            letter-spacing: 0.45em;
            color: rgba(201,168,76,0.55);
            text-transform: uppercase;
            animation: pulseFade 2s ease-in-out 3.5s infinite;
        }

        /* LEMA */
        .motto {
            position: fixed;
            bottom: 32px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            font-family: 'Cormorant Garamond', serif;
            font-size: 11px;
            font-style: italic;
            letter-spacing: 0.25em;
            color: rgba(201,168,76,0.28);
            white-space: nowrap;
            opacity: 0;
            animation: fadeIn 1s ease 3.5s forwards;
        }

        /* ── TRANSICIÓN DE SALIDA ── */
        #splash-content.exiting {
            animation: exitSplash 0.7s cubic-bezier(0.4, 0, 1, 1) forwards;
        }

        .grid-overlay.exiting,
        .vignette.exiting,
        .corner.exiting,
        .motto.exiting {
            animation: exitFade 0.5s ease forwards;
        }

        /* ── KEYFRAMES ── */
        @keyframes fadeDown {
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes riseUp {
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        @keyframes expandLine {
            to { width: 220px; }
        }
        @keyframes pulseBar {
            0%, 100% { opacity: 0.4; transform: scaleY(1); }
            50% { opacity: 1; transform: scaleY(1.2); }
        }
        @keyframes pulseFade {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.9; }
        }
        @keyframes exitSplash {
            0% { opacity: 1; filter: blur(0px); transform: scale(1); }
            100% { opacity: 0; filter: blur(12px); transform: scale(1.04); }
        }
        @keyframes exitFade {
            to { opacity: 0; }
        }
    </style>
</head>
<body>

<canvas id="particles-canvas"></canvas>
<div class="grid-overlay" id="grid"></div>
<div class="vignette" id="vignette"></div>

<!-- Esquinas -->
<div class="corner corner-tl" id="corner-tl">EST. MMXXV</div>
<div class="corner corner-tr" id="corner-tr">K · U</div>

<!-- Contenido Principal -->
<div id="splash-content">

    <!-- Escudo SVG -->
    <div class="crest-wrapper">
        <svg class="crest-svg" viewBox="0 0 80 92" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40 2L76 16V52C76 68.569 59.882 82.14 40 90C20.118 82.14 4 68.569 4 52V16L40 2Z"
                  fill="rgba(13,18,32,0.95)" stroke="rgba(201,168,76,0.7)" stroke-width="1.2"/>
            <path d="M40 8L70 20V52C70 65.5 56.4 77.5 40 84.5C23.6 77.5 10 65.5 10 52V20L40 8Z"
                  fill="none" stroke="rgba(201,168,76,0.25)" stroke-width="0.8"/>
            <!-- K institucional -->
            <text x="40" y="56" font-family="Cinzel, serif" font-size="28" font-weight="500"
                  fill="rgba(201,168,76,0.9)" text-anchor="middle" letter-spacing="1">K</text>
        </svg>
    </div>

    <!-- KRONOS letra por letra -->
    <div class="kronos-word">
        <span class="kronos-letter">K</span>
        <span class="kronos-letter">R</span>
        <span class="kronos-letter">O</span>
        <span class="kronos-letter">N</span>
        <span class="kronos-letter">O</span>
        <span class="kronos-letter">S</span>
    </div>

    <div class="university-sub">University</div>

    <div class="divider-line"></div>

    <!-- Saludo dinámico -->
    <div class="greeting-block">
        <div class="greeting-text" id="greeting-text">Bienvenido</div>
        <div class="greeting-sub" id="greeting-sub">Continúa forjando tu camino académico.</div>
    </div>

    <!-- Reloj -->
    <div class="clock-block">
        <div class="clock-time" id="clock-time">00:00</div>
        <div class="clock-date" id="clock-date">—</div>
    </div>

    <!-- Tap to continue -->
    <div class="tap-cta">
        <div class="tap-bar"></div>
        <div class="tap-label">Toque para continuar</div>
    </div>

</div>

<!-- Lema -->
<div class="motto" id="motto">Scientia · Integritas · Progressus</div>

<script>
    /* ── PARTÍCULAS DORADAS ── */
    const canvas = document.getElementById('particles-canvas');
    const ctx = canvas.getContext('2d');
    let particles = [];

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    function createParticle() {
        return {
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * 1.4 + 0.3,
            speedX: (Math.random() - 0.5) * 0.25,
            speedY: -Math.random() * 0.35 - 0.1,
            alpha: Math.random() * 0.5 + 0.1,
            alphaDir: (Math.random() - 0.5) * 0.005,
        };
    }

    for (let i = 0; i < 120; i++) particles.push(createParticle());

    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach((p, i) => {
            p.x += p.speedX;
            p.y += p.speedY;
            p.alpha += p.alphaDir;
            if (p.alpha > 0.6) p.alphaDir = -Math.abs(p.alphaDir);
            if (p.alpha < 0.05) p.alphaDir = Math.abs(p.alphaDir);
            if (p.y < -10) particles[i] = { ...createParticle(), y: canvas.height + 10 };

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(201, 168, 76, ${p.alpha})`;
            ctx.fill();
        });
        requestAnimationFrame(animateParticles);
    }
    animateParticles();

    /* ── RELOJ Y SALUDO ── */
    const DAYS    = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
    const MONTHS  = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

    function updateClock() {
        const now  = new Date();
        const h    = now.getHours();
        const m    = String(now.getMinutes()).padStart(2, '0');
        const ampm = h >= 12 ? 'p.m.' : 'a.m.';
        const h12  = h % 12 || 12;

        document.getElementById('clock-time').textContent =
            `${String(h12).padStart(2,'0')}:${m} ${ampm}`;

        document.getElementById('clock-date').textContent =
            `${DAYS[now.getDay()]}, ${now.getDate()} De ${MONTHS[now.getMonth()]} De ${now.getFullYear()}`;

        const greetEl = document.getElementById('greeting-text');
        if      (h >= 5  && h < 12) greetEl.textContent = 'Buenos días';
        else if (h >= 12 && h < 19) greetEl.textContent = 'Buenas tardes';
        else                         greetEl.textContent = 'Buenas noches';
    }

    updateClock();
    setInterval(updateClock, 1000);

    /* ── NAVEGACIÓN AL HACER CLIC ── */
    let clicked = false;
    document.body.addEventListener('click', () => {
        if (clicked) return;
        clicked = true;

        document.getElementById('splash-content').classList.add('exiting');
        document.getElementById('grid').classList.add('exiting');
        document.getElementById('vignette').classList.add('exiting');
        document.getElementById('corner-tl').classList.add('exiting');
        document.getElementById('corner-tr').classList.add('exiting');
        document.getElementById('motto').classList.add('exiting');

        setTimeout(() => {
            window.location.href = '{{ route("login") }}';
        }, 650);
    });
</script>
</body>
</html>
