<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoBite | Surplus Food Rescue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">🌱 EcoBite</a>
            <div class="d-flex">
                <a href="{{ route('student.dashboard') }}" class="btn btn-outline-light me-2">Student View</a>
                <a href="{{ route('vendor.dashboard') }}" class="btn btn-warning">Vendor View</a>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

</body>
</html>