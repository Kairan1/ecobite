<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBite | Surplus Food Rescue</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body{
        background:#f5fff7;
    }

    .hero-section{
        background:linear-gradient(135deg,#198754,#43c97c);
        padding:100px 30px;
        border-radius:25px;
        box-shadow:0 10px 30px rgba(0,0,0,.15);
        animation: floatIn 0.8s ease;
    }

    @keyframes floatIn{
        from { transform: translateY(20px); opacity:0; }
        to { transform: translateY(0); opacity:1; }
    }

    .eco-navbar{
        background:linear-gradient(90deg,#198754,#2dbd73);
        box-shadow:0 5px 20px rgba(0,0,0,.1);
    }

    .food-card{
        border-radius:20px;
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(10px);
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
        transition:0.3s;
    }

    .food-card:hover{
        transform:translateY(-10px);
        box-shadow:0 15px 35px rgba(0,0,0,.15);
    }

    .food-image{
        height:220px;
        object-fit:cover;
    }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark eco-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            🌱 EcoBite
        </a>

        <div class="d-flex gap-2">
            @auth
                <span class="text-light me-2 align-self-center">
                    Welcome, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})
                </span>
                @if(Auth::user()->role === 'student')
                    <a href="{{ route('student.profile') }}" class="btn btn-warning me-2 fw-bold">
                        👤 My Profile
                    </a>
                @else
                    <a href="{{ route('vendor.dashboard') }}" class="btn btn-warning me-2 fw-bold">
                        📊 My Listings
                    </a>
                @endif
                <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @else
                <a href="{{ route('auth.showLogin') }}" class="btn btn-outline-light me-2">
                    Login
                </a>
                <a href="{{ route('auth.showRegister') }}" class="btn btn-warning">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>

<main class="container py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</main>

<footer class="text-center py-4 mt-5">
    <hr>
    <p class="text-muted">
        🌱 EcoBite • Fighting Food Waste One Meal at a Time
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>