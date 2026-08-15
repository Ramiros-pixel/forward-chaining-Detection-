<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — KidsCare</title>

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
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--green-50);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER BAR */
        .auth-header {
            background-color: var(--green-800);
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--white);
            font-size: 1.2rem;
            font-weight: 800;
            text-decoration: none;
        }
        .auth-brand-icon {
            width: 34px;
            height: 34px;
            background-color: var(--green-500);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-brand-icon svg { width: 18px; height: 18px; fill: var(--white); }
        .auth-brand-sub {
            font-size: 0.65rem;
            color: var(--green-300);
            display: block;
            font-weight: 400;
        }

        /* MAIN CONTAINER */
        .auth-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }
        .auth-card {
            background-color: var(--white);
            border: 1px solid var(--green-200);
            border-radius: 20px;
            padding: 36px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 8px 32px rgba(46,125,50,0.1);
        }
        .auth-card-icon {
            width: 56px;
            height: 56px;
            background-color: var(--green-100);
            border: 2px solid var(--green-300);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        .auth-card-icon svg { width: 28px; height: 28px; fill: var(--green-800); }

        .auth-title {
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--green-900);
            margin-bottom: 4px;
        }
        .auth-subtitle {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin-bottom: 28px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 18px;
        }
        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--gray-700);
            margin-bottom: 6px;
        }
        .form-input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid var(--gray-300);
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            color: var(--gray-800);
            background-color: var(--gray-100);
            transition: all 0.2s ease;
            outline: none;
        }
        .form-input:focus {
            border-color: var(--green-500);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(102,187,106,0.15);
        }
        .form-input.is-invalid {
            border-color: var(--red-500);
        }
        .invalid-feedback {
            font-size: 0.78rem;
            color: var(--red-700);
            margin-top: 4px;
            display: block;
        }

        /* CHECKBOX */
        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
        }
        .form-check input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--green-700);
            cursor: pointer;
        }
        .form-check label {
            font-size: 0.85rem;
            color: var(--gray-600);
            cursor: pointer;
        }

        /* BUTTON */
        .btn-auth {
            width: 100%;
            padding: 13px;
            background-color: var(--green-700);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-auth:hover {
            background-color: var(--green-800);
            box-shadow: 0 4px 14px rgba(46,125,50,0.3);
            transform: translateY(-1px);
        }
        .btn-auth svg { width: 18px; height: 18px; fill: var(--white); }

        /* DIVIDER */
        .auth-divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }
        .auth-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: var(--gray-200);
        }
        .auth-divider span {
            background-color: var(--white);
            padding: 0 12px;
            font-size: 0.8rem;
            color: var(--gray-400);
            position: relative;
        }

        /* LINK */
        .auth-link {
            color: var(--green-700);
            font-weight: 700;
            text-decoration: none;
            font-size: 0.875rem;
        }
        .auth-link:hover { color: var(--green-900); text-decoration: underline; }

        .auth-footer-text {
            text-align: center;
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-top: 20px;
        }

        /* ALERT */
        .alert-status {
            background-color: #E8F5E9;
            color: var(--green-900);
            border: 1px solid var(--green-200);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.85rem;
            margin-bottom: 16px;
        }
        .forgot-link-wrapper {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 18px;
        }

        /* FOOTER */
        .auth-page-footer {
            background-color: var(--green-900);
            color: var(--green-400);
            text-align: center;
            padding: 12px;
            font-size: 0.75rem;
        }
    </style>
    @yield('extra-styles')
</head>
<body>

    <header class="auth-header">
        <a href="/" class="auth-brand">
            <div class="auth-brand-icon">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>
            </div>
            <div>
                KidsCare
                <span class="auth-brand-sub">Sistem Pakar MTBS Balita</span>
            </div>
        </a>
    </header>

    <main class="auth-container">
        @yield('content')
    </main>

    <footer class="auth-page-footer">
        &copy; {{ date('Y') }} KidsCare — Sistem Pakar Deteksi Penyakit Balita (MTBS)
    </footer>

</body>
</html>
