<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Udemy-like Homepage (Bootstrap)</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* --- Custom styles to make it feel more "Udemy-like" --- */
        :root{
            --brand:#1f6feb;
            --muted:#6c757d;
            --card-radius:0.75rem;
        }

        body { font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:#f7f9fc; }

        .navbar-brand { font-weight:700; color:var(--brand); letter-spacing:0.2px; }
        .search-input { min-width: 420px; max-width:700px; }
        @media (max-width: 992px){ .search-input{ min-width: 200px; max-width: 350px; } }

        .hero {
            background: linear-gradient(90deg, rgba(31,111,235,0.06), rgba(31,111,235,0.02));
            border-radius: 1rem;
            padding: 2.4rem;
        }

        .course-card { border:0; border-radius: var(--card-radius); overflow:hidden; box-shadow: 0 6px 20px rgba(20,30,60,0.06); }
        .course-thumb { height:150px; object-fit:cover; width:100%; }
        .price-badge { background: #0d6efd; color:#fff; font-weight:600; padding: 0.25rem 0.5rem; border-radius: 0.5rem; font-size:0.9rem; }

        .instructor-card { border-radius: .75rem; background:#fff; padding:1rem; box-shadow: 0 6px 18px rgba(20,30,60,0.04); }
        .testimonial { background: #fff; border-radius: 1rem; padding:1.2rem; box-shadow: 0 10px 24px rgba(16,24,40,0.06); }

        footer { background:#0b1726; color:#c9d7f2; }
        footer a { color: #c9d7f2; text-decoration: none; }
        .badge-category { background:#eef6ff; color:var(--brand); font-weight:600; padding:0.25rem .5rem; border-radius: .5rem; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            كورساتـity
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
                <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                @auth
                <li class="nav-item"><a class="nav-link" href="{{ route('create.courses') }}">Publish Course</a></li>
                @endauth
                <li class="nav-item"><a class="nav-link" href="#">Business</a></li>
            </ul>

            <!-- Search -->
            <form class="d-flex me-3" role="search">
                <div class="input-group search-input">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                    <input class="form-control border-start-0" type="search" placeholder="Search for anything" aria-label="Search">
                </div>
            </form>

            <div class="d-flex align-items-center gap-2">
                @auth
                    <a href="{{ route('profile') }}" class="fw-bold text-primary">
                        {{ Auth::user()->name }}
                    </a>

                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>

                @endauth
                    @guest
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('client.login') }}">Log in</a>
                <a class="btn btn-primary btn-sm" href="{{ route('client.register') }}">Sign up</a>
                    @endguest
            </div>
        </div>
    </div>
</nav>

@yield('content')


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('yr').textContent = new Date().getFullYear();
</script>
</body>
</html>


