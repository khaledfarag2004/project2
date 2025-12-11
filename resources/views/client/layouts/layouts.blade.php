<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>كورساتـity</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f7f9fc;
            font-family: "Tajawal", sans-serif;
        }

        .search-input { min-width: 420px; max-width:700px; }
        @media (max-width: 992px){
            .search-input{ min-width: 200px; max-width: 350px; }
        }

        .hero {
            background: linear-gradient(90deg, rgba(31,111,235,0.06), rgba(31,111,235,0.02));
            border-radius: 1rem;
            padding: 2.4rem;
        }

        .course-card {
            border:0;
            border-radius: .75rem;
            overflow:hidden;
            box-shadow: 0 6px 20px rgba(20,30,60,0.06);
        }

        .course-thumb {
            height:150px;
            object-fit:cover;
            width:100%;
        }

        .badge-category {
            background:#eef6ff;
            color:#1f6feb;
            font-weight:600;
            padding:0.25rem .5rem;
            border-radius: .5rem;
        }

        footer {
            background: #fff;
            border-top: 1px solid #dee2e6;
            padding: 2rem 0;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">كورساتـity</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">التصنيفات</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.courses.create') }}">نشر كورس</a>
                    </li>
                @endauth

            </ul>

            <!-- Search -->
            <form class="d-flex me-3" role="search">
                <div class="input-group search-input">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search"></i>
                        </span>
                    <input class="form-control border-start-0" type="search" placeholder="ابحث عن أي شيء" aria-label="Search">
                </div>
            </form>

            <div class="d-flex align-items-center gap-2">
                @auth
                    <a href="{{ route('profile.show') }}" class="fw-bold text-primary">{{ Auth::user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">تسجيل الخروج</button>
                    </form>
                @endauth
                @guest
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('client.login') }}">تسجيل الدخول</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('client.register') }}">إنشاء حساب</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<!-- Page Content -->
<main class="container my-5">
    @yield('content')
</main>

<!-- Footer -->
<footer>
    <div class="container text-center text-muted">
        <p>جميع الحقوق محفوظة &copy; <span id="yr"></span> كورساتـity</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#"><i class="bi bi-facebook fs-5"></i></a>
            <a href="#"><i class="bi bi-twitter fs-5"></i></a>
            <a href="#"><i class="bi bi-instagram fs-5"></i></a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const yr = document.getElementById('yr');
    if (yr) yr.textContent = new Date().getFullYear();
</script>
</body>
</html>
