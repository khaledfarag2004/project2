<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>لوحة التحكم - كورساتـity</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Tajawal", sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: white;
            border-left: 1px solid #ddd;
        }
        .sidebar a {
            padding: 12px 20px;
            display: block;
            font-weight: 500;
            color: #444;
            text-decoration: none;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #f0f2ff;
            color: #3b5bdb;
        }
        .content {
            margin-right: 250px; /* يسيب مساحة للسايدبار */
            padding: 30px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar position-fixed top-0 end-0">
    <div class="p-3 border-bottom text-center">
        <h5 class="fw-bold">كورساتـity</h5>
    </div>

    <a href="{{ route('admin.home') }}" class="active">🏠 Home</a>
    <a href="{{ route('admin.user') }}">👤Profile</a>
    <a href="{{ route('course.index') }}">📚 Courses</a>
    <a href="#">📝 Enrollments</a>
    <a href="#">📜 History</a>
    <a href="#">⚙️ Setting</a>
    <a href="#" class="text-danger">🚪Logout</a>
</aside>

<!-- CONTENT -->
<main class="content">
    @yield('content')
</main>

</body>
</html>
