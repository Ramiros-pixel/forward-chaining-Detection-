<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KidsCare - Sistem Pakar Deteksi Penyakit Balita MTBS berbasis Forward Chaining">
    <title>KidsCare —Penyakit Balita</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --green-50:  #F1F8E9;
            --green-100: #DCEDC8;
            --green-200: #C8E6C9;
            --green-300: #A5D6A7;
            --green-400: #81C784;
            --green-500: #66BB6A;
            --green-600: #4CAF50;
            --green-700: #43A047;
            --green-800: #2E7D32;
            --green-900: #1B5E20;
            --white:     #FFFFFF;
            --gray-100:  #F5F5F5;
            --gray-500:  #9E9E9E;
            --gray-700:  #616161;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--green-50);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER */
        .header {
            background-color: var(--green-800);
            padding: 0 32px;
        }
        .header-inner {
            max-width: 1100px;
            margin: 0 auto;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--white);
            font-size: 1.3rem;
            font-weight: 800;
            text-decoration: none;
        }
        .brand-icon {
            width: 36px;
            height: 36px;
            background-color: var(--green-500);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .brand-icon svg { width: 20px; height: 20px; fill: var(--white); }
        .brand-sub {
            font-size: 0.65rem;
            color: var(--green-300);
            display: block;
            line-height: 1;
            font-weight: 400;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-nav {
            padding: 8px 20px;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.875rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
        }
        .btn-nav-outline {
            background: none;
            color: var(--green-200);
            border: 1px solid var(--green-600);
        }
        .btn-nav-outline:hover {
            background-color: var(--green-700);
            color: var(--white);
        }
        .btn-nav-solid {
            background-color: var(--green-500);
            color: var(--white);
        }
        .btn-nav-solid:hover {
            background-color: var(--green-400);
        }

        /* HERO */
        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 32px;
            background-image: linear-gradient(rgba(27, 94, 32, 0.85), rgba(19, 45, 21, 0.5)), url('/images/image.png');
            background-size: cover;
            background-position: center;
        }
        .hero-inner {
            max-width: 900px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            align-items: center;
        }
        .hero-content {}
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            color: var(--white);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .hero-badge svg { width: 14px; height: 14px; fill: var(--white); }
        .hero-title {
            font-size: 2.6rem;
            font-weight: 900;
            color: var(--white);
            line-height: 1.15;
            margin-bottom: 16px;
        }
        .hero-title span { color: var(--green-300); }
        .hero-desc {
            font-size: 1rem;
            color: var(--green-50);
            line-height: 1.7;
            margin-bottom: 32px;
        }
        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background-color: var(--green-700);
            color: var(--white);
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(46,125,50,0.3);
        }
        .btn-hero-primary:hover {
            background-color: var(--green-800);
            box-shadow: 0 6px 18px rgba(46,125,50,0.4);
            transform: translateY(-2px);
        }
        .btn-hero-primary svg { width: 20px; height: 20px; fill: var(--white); }
        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background-color: var(--white);
            color: var(--green-800);
            border: 2px solid var(--green-300);
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .btn-hero-secondary:hover {
            background-color: var(--green-50);
            border-color: var(--green-500);
        }
        .btn-hero-secondary svg { width: 20px; height: 20px; fill: var(--green-700); }

        /* ILLUSTRATION / FEATURE CARD */
        .hero-visual {
            background-color: var(--white);
            border: 2px solid var(--green-200);
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 10px 40px rgba(46,125,50,0.1);
        }
        .visual-title {
            font-size: 1rem;
            font-weight: 800;
            color: var(--green-900);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .visual-title svg { width: 20px; height: 20px; fill: var(--green-700); }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px;
            background-color: var(--green-50);
            border: 1px solid var(--green-200);
            border-radius: 10px;
            transition: all 0.2s ease;
        }
        .feature-item:hover {
            border-color: var(--green-400);
            background-color: var(--green-100);
        }
        .feature-icon {
            width: 38px;
            height: 38px;
            background-color: var(--green-800);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .feature-icon svg { width: 18px; height: 18px; fill: var(--white); }
        .feature-text h4 {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--green-900);
            margin-bottom: 2px;
        }
        .feature-text p {
            font-size: 0.78rem;
            color: var(--gray-500);
        }

        /* FOOTER */
        .footer {
            background-color: var(--green-900);
            color: var(--green-400);
            text-align: center;
            padding: 16px;
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            .hero-inner {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .hero-title { font-size: 2rem; }
            .hero { padding: 40px 20px; }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="header-inner">
            <a href="/" class="brand">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>
                </div>
                <div>
                    KidsCare
                    <span class="brand-sub">Forward Chaining</span>
                </div>
            </a>

            @if (Route::has('login'))
                <nav class="header-nav">
                    @auth
                        <a href="{{ url('/diagnosa') }}" class="btn-nav btn-nav-solid">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-nav btn-nav-outline">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-nav btn-nav-solid">Daftar Gratis</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <section class="hero">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>
                    Berbasis Forward Chaining AI
                </div>
                <h1 class="hero-title">
                    Deteksi Dini<br>
                    Penyakit <span>Balita</span><br>
                    Lebih Cepat
                </h1>
                <p class="hero-desc">
                    Sistem pakar berbasis kecerdasan buatan untuk membantu deteksi awal penyakit balita menggunakan metode MTBS (Manajemen Terpadu Balita Sakit). Pilih gejala, dan dapatkan klasifikasi penyakit secara instan.
                </p>
                <div class="hero-actions">
                    @auth
                        <a href="{{ route('diagnosa.index') }}" class="btn-hero-primary">
                            <svg viewBox="0 0 24 24"><path d="M9.5 6.5v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2zM11 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-8-4z"/></svg>
                            Mulai Diagnosa
                        </a>
                        <a href="{{ route('riwayat.index') }}" class="btn-hero-secondary">
                            <svg viewBox="0 0 24 24"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>
                            Riwayat Diagnosa
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-hero-primary">
                            <svg viewBox="0 0 24 24"><path d="M9.5 6.5v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2zM11 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-8-4z"/></svg>
                            Coba Sekarang
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-hero-secondary">
                                <svg viewBox="0 0 24 24"><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                Daftar Gratis
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hero-visual">
                <div class="visual-title">
                    <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    Fitur Sistem
                </div>
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>
                        </div>
                        <div class="feature-text">
                            <h4>Forward Chaining Engine</h4>
                            <p>Mesin inferensi berbasis aturan MTBS yang tervalidasi</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>
                        </div>
                        <div class="feature-text">
                            <h4>Akun Pribadi</h4>
                            <p>Login dan pantau riwayat diagnosa Anda sendiri</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>
                        </div>
                        <div class="feature-text">
                            <h4>Riwayat Diagnosa</h4>
                            <p>Simpan dan lihat hasil diagnosa sebelumnya kapan saja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        &copy; {{ date('Y') }} KidsCare — Sistem Pakar Deteksi Penyakit Balita (MTBS) &bull; Forward Chaining Engine
    </footer>

</body>
</html>
