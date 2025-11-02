<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Apotek Laravel')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(90deg, #2ecc71, #27ae60);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 600;
        }
        .nav-link:hover {
            color: #dfffe0 !important;
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }

        /* BUTTONS */
        .btn-custom {
            border-radius: 10px;
            font-weight: 500;
            transition: background 0.2s ease;
        }
        .btn-custom:hover {
            opacity: 0.9;
        }

        /* FOOTER */
        footer {
            background: #2ecc71;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
            box-shadow: 0 -3px 10px rgba(0,0,0,0.1);
        }

        /* FORM SPACING */
        .form-label {
            font-weight: 500;
        }

        /* ALERT */
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">💊 Apotek Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ route('welcome.index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('pelanggan.index') }}" class="nav-link">Pelanggan</a></li>
                    <li class="nav-item"><a href="{{ route('obat.index') }}" class="nav-link">Obat</a></li>
                    <li class="nav-item"><a href="{{ route('staff.index') }}" class="nav-link">Staf</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        © {{ date('Y') }} Apotek Laravel
    </footer>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
