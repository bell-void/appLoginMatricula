<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRONOS University</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Cinzel:wght@400;500;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

<canvas id="particles-canvas"></canvas>
<div class="grid-overlay" id="grid"></div>
<div class="vignette" id="vignette"></div>

<div class="corner corner-tl" id="corner-tl">EST. MMXXV</div>
<div class="corner corner-tr" id="corner-tr">K · U</div>

<div id="splash-content">
    <div class="crest-wrapper">
        <svg class="crest-svg" viewBox="0 0 80 92" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40 2L76 16V52C76 68.569 59.882 82.14 40 90C20.118 82.14 4 68.569 4 52V16L40 2Z"
                  fill="rgba(13,18,32,0.95)" stroke="rgba(201,168,76,0.7)" stroke-width="1.2"/>
            <path d="M40 8L70 20V52C70 65.5 56.4 77.5 40 84.5C23.6 77.5 10 65.5 10 52V20L40 8Z"
                  fill="none" stroke="rgba(201,168,76,0.25)" stroke-width="0.8"/>
            <text x="40" y="56" font-family="Cinzel, serif" font-size="28" font-weight="500"
                  fill="rgba(201,168,76,0.9)" text-anchor="middle" letter-spacing="1">K</text>
        </svg>
    </div>

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

    <div class="greeting-block">
        <div class="greeting-text" id="greeting-text">Bienvenido</div>
        <div class="greeting-sub" id="greeting-sub">Continúa forjando tu camino académico.</div>
    </div>

    <div class="clock-block">
        <div class="clock-time" id="clock-time">00:00</div>
        <div class="clock-date" id="clock-date">—</div>
    </div>

    <div class="tap-cta">
        <div class="tap-bar"></div>
        <div class="tap-label">Toque para continuar</div>
    </div>
</div>

<div class="motto" id="motto">Scientia · Integritas · Progressus</div>

<script>
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

    const DAYS   = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
    const MONTHS = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

    function updateClock() {
        const now  = new Date();
        const h    = now.getHours();
        const m    = String(now.getMinutes()).padStart(2, '0');
        const ampm = h >= 12 ? 'p.m.' : 'a.m.';
        const h12  = h % 12 || 12;
        document.getElementById('clock-time').textContent = `${String(h12).padStart(2,'0')}:${m} ${ampm}`;
        document.getElementById('clock-date').textContent = `${DAYS[now.getDay()]}, ${now.getDate()} De ${MONTHS[now.getMonth()]} De ${now.getFullYear()}`;
        const greetEl = document.getElementById('greeting-text');
        if      (h >= 5  && h < 12) greetEl.textContent = 'Buenos días';
        else if (h >= 12 && h < 19) greetEl.textContent = 'Buenas tardes';
        else                         greetEl.textContent = 'Buenas noches';
    }
    updateClock();
    setInterval(updateClock, 1000);

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
        setTimeout(() => { window.location.href = '{{ route("login") }}'; }, 650);
    });
</script>
</body>
</html>
