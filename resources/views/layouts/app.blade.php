<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KidsCare - Sistem Pakar Deteksi Penyakit Balita berbasis Forward Chaining MTBS">
    <title>@yield('title', 'KidsCare') — Sistem Deteksi Penyakit Balita</title>

    <!-- Google Fonts: Nunito (friendly, child-health theme) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ========== CSS DESIGN TOKENS ========== */
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
            --gray-50:   #FAFAFA;
            --gray-100:  #F5F5F5;
            --gray-200:  #EEEEEE;
            --gray-300:  #E0E0E0;
            --gray-400:  #BDBDBD;
            --gray-500:  #9E9E9E;
            --gray-600:  #757575;
            --gray-700:  #616161;
            --gray-800:  #424242;
            --red-100:   #FFEBEE;
            --red-500:   #F44336;
            --red-700:   #D32F2F;
            --amber-100: #FFF8E1;
            --amber-600: #FFB300;

            --shadow-sm:  0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.05);
            --shadow-md:  0 4px 6px rgba(0,0,0,0.07), 0 2px 4px rgba(0,0,0,0.05);
            --shadow-lg:  0 10px 25px rgba(0,0,0,0.08), 0 4px 10px rgba(0,0,0,0.05);
            --radius-sm:  6px;
            --radius-md:  12px;
            --radius-lg:  20px;
            --transition: 0.2s ease;
        }

        /* ========== RESET & BASE ========== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--green-50);
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        a { text-decoration: none; color: inherit; }
        ul, ol { list-style: none; }
        img { max-width: 100%; display: block; }

        /* ========== NAVBAR ========== */
        .navbar {
            background-color: var(--green-800);
            padding: 0 24px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-md);
        }
        .navbar-inner {
            max-width: 1100px;
            margin: 0 auto;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--white);
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: -0.3px;
        }
        .navbar-brand .brand-icon {
            width: 36px;
            height: 36px;
            background-color: var(--green-500);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .navbar-brand .brand-icon svg {
            width: 20px;
            height: 20px;
            fill: var(--white);
        }
        .navbar-brand .brand-sub {
            font-size: 0.7rem;
            font-weight: 400;
            color: var(--green-300);
            display: block;
            line-height: 1;
        }
        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--green-200);
            font-size: 0.875rem;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            transition: background-color var(--transition), color var(--transition);
        }
        .nav-link:hover {
            background-color: var(--green-700);
            color: var(--white);
        }
        .nav-link.active {
            background-color: var(--green-600);
            color: var(--white);
        }
        .nav-link svg {
            width: 16px;
            height: 16px;
        }
        .nav-divider {
            width: 1px;
            height: 20px;
            background-color: var(--green-700);
        }
        .nav-user {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--green-100);
            font-size: 0.875rem;
            font-weight: 600;
        }
        .nav-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--green-500);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 0.8rem;
            font-weight: 700;
        }
        .btn-logout {
            background: none;
            border: 1px solid var(--green-600);
            color: var(--green-200);
            font-family: 'Nunito', sans-serif;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: all var(--transition);
        }
        .btn-logout:hover {
            background-color: var(--green-700);
            color: var(--white);
            border-color: var(--green-500);
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            flex: 1;
            padding: 32px 24px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        .container-wide {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ========== CARDS ========== */
        .card {
            background-color: var(--white);
            border: 1px solid var(--green-200);
            border-radius: var(--radius-md);
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
            transition: box-shadow var(--transition);
        }
        .card:hover { box-shadow: var(--shadow-md); }
        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 2px solid var(--green-100);
        }
        .card-icon {
            width: 42px;
            height: 42px;
            background-color: var(--green-50);
            border: 2px solid var(--green-200);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .card-icon svg {
            width: 22px;
            height: 22px;
            fill: var(--green-800);
        }
        .card-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--green-900);
        }
        .card-subtitle {
            font-size: 0.8rem;
            color: var(--gray-500);
            font-weight: 400;
            margin-top: 2px;
        }

        /* ========== ALERTS ========== */
        .alert {
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 18px;
        }
        .alert svg { width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px; }
        .alert-error {
            background-color: var(--red-100);
            color: var(--red-700);
            border: 1px solid #FFCDD2;
        }
        .alert-success {
            background-color: #E8F5E9;
            color: var(--green-900);
            border: 1px solid var(--green-200);
        }

        /* ========== CHECKBOX ITEMS ========== */
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-sm);
            margin-bottom: 8px;
            cursor: pointer;
            transition: all var(--transition);
            background-color: var(--gray-50);
        }
        .checkbox-item:hover {
            border-color: var(--green-400);
            background-color: var(--green-50);
        }
        .checkbox-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--green-700);
            cursor: pointer;
            flex-shrink: 0;
        }
        .checkbox-item:has(input:checked) {
            border-color: var(--green-500);
            background-color: #E8F5E9;
        }
        .checkbox-item label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--gray-700);
            cursor: pointer;
            line-height: 1.4;
            flex: 1;
        }
        .checkbox-item:has(input:checked) label {
            color: var(--green-900);
        }

        /* ========== BUTTONS ========== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: var(--radius-sm);
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all var(--transition);
            text-decoration: none;
        }
        .btn svg { width: 18px; height: 18px; }
        .btn-primary {
            background-color: var(--green-700);
            color: var(--white);
        }
        .btn-primary:hover {
            background-color: var(--green-800);
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }
        .btn-primary:active { transform: translateY(0); }
        .btn-secondary {
            background-color: var(--white);
            color: var(--green-800);
            border: 2px solid var(--green-300);
        }
        .btn-secondary:hover {
            background-color: var(--green-50);
            border-color: var(--green-500);
        }
        .btn-sm {
            padding: 8px 16px;
            font-size: 0.8rem;
        }

        /* ========== PAGE HEADER ========== */
        .page-header {
            margin-bottom: 28px;
        }
        .page-header h1 {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--green-900);
            margin-bottom: 6px;
        }
        .page-header p {
            font-size: 0.9rem;
            color: var(--gray-500);
            font-weight: 400;
        }
        .page-header-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: var(--green-100);
            color: var(--green-800);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }
        .page-header-badge svg { width: 14px; height: 14px; }

        /* ========== BADGE ========== */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .badge-green {
            background-color: var(--green-100);
            color: var(--green-800);
        }
        .badge-blue {
            background-color: #E3F2FD;
            color: #1565C0;
        }
        .badge-amber {
            background-color: var(--amber-100);
            color: #E65100;
        }
        .badge-gray {
            background-color: var(--gray-200);
            color: var(--gray-700);
        }

        /* ========== FOOTER ========== */
        .footer {
            background-color: var(--green-900);
            color: var(--green-300);
            text-align: center;
            padding: 16px 24px;
            font-size: 0.8rem;
        }

        /* ========== UTILITY ========== */
        .text-muted { color: var(--gray-500); font-size: 0.85rem; }
        .text-success { color: var(--green-700); }
        .text-danger { color: var(--red-500); }
        .fw-bold { font-weight: 700; }
        .fw-semibold { font-weight: 600; }
        .mt-2 { margin-top: 8px; }
        .mt-4 { margin-top: 16px; }
        .mt-6 { margin-top: 24px; }
        .mb-2 { margin-bottom: 8px; }
        .mb-4 { margin-bottom: 16px; }
        .d-flex { display: flex; }
        .align-center { align-items: center; }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 12px; }
        .gap-4 { gap: 16px; }
        .flex-wrap { flex-wrap: wrap; }
        .justify-between { justify-content: space-between; }
        .divider {
            border: none;
            border-top: 1px solid var(--green-100);
            margin: 18px 0;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 600px) {
            .navbar-inner { height: 56px; }
            .navbar-brand { font-size: 1.1rem; }
            .nav-user-name { display: none; }
            .main-content { padding: 20px 16px; }
            .card { padding: 18px; }
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('diagnosa.index') }}" class="navbar-brand">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/>
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 10h-2v4h2v-4zm0-4h-2v2h2V8z"/>
                    </svg>
                </div>
                <div>
                    KidsCare
                    <span class="brand-sub">Sistem Pakar MTBS</span>
                </div>
            </a>

            <div class="navbar-nav">
                <a href="{{ route('diagnosa.index') }}" class="nav-link @yield('nav_diagnosa')">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/></svg>
                    Diagnosa
                </a>
                <a href="{{ route('riwayat.index') }}" class="nav-link @yield('nav_riwayat')">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>
                    Riwayat
                </a>
                <div class="nav-divider"></div>
                <div class="nav-user">
                    <div class="nav-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <span class="nav-user-name">{{ Auth::user()->name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        &copy; {{ date('Y') }} KidsCare — Sistem Pakar Deteksi Penyakit Balita (MTBS) &bull; Forward Chaining Engine
    </footer>

    @yield('scripts')
</body>
</html>
