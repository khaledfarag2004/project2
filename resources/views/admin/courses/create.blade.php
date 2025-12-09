@extends('admin.layouts.layouts')
@section('content')
<body class="bg-light">
@csrf
@if ($errors->any())
    <div class="alert alert-danger p-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <span class="navbar-brand">🎓 إضافة كورس جديد</span>
    </div>
</nav>

<div class="container">

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0">إضافة كورس</h4>
        </div>

        <div class="card-body">

            <form action=" {{ route('course.store') }} " method="POST">
                @csrf
                <!-- Course Title -->
                <div class="mb-3">
                    <label class="form-label">Title </label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">  name_instractor </label>
                    <input type="text" name="name_instractor" class="form-control">
                </div>

                <!-- Course Description -->
                <div class="mb-3">
                    <label class="form-label">Desc</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="اكتب وصف الكورس"></textarea>
                </div>

                <!-- Course Price -->
                <div class="mb-3">
                    <label class="form-label">السعر</label>
                    <input type="number" class="form-control" name="price" placeholder="السعر بالجنيه">
                </div>


                <!-- Upload Image -->
                <div class="mb-3">
                    <label class="form-label">صورة الكورس</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <!-- Submit Button -->
                <button class="btn btn-success w-100 py-2">✔ إضافة الكورس</button>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

