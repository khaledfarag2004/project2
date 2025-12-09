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
        <span class="navbar-brand">📚 لوحة تحكم الكورسات</span>
    </div>
</nav>

<div class="container">

    <!-- Header + Add Course -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>إدارة الكورسات</h3>

        <a href="{{ route('course.create') }}" class="btn btn-primary">➕ إضافة كورس</a>
    </div>

    <!-- Search -->
    <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="ابحث عن كورس...">
        <button class="btn btn-outline-secondary">بحث</button>
    </div>

    <!-- Courses Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>desc</th>
                    <th>name_instractor</th>
                    <th>price</th>
                    <th>action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->name_instractor }}</td>
                    <td>{{ $course->price }}</td>
                    <td style="width: 150px;">
                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                                تعديل
                            </button>

                            <form method="POST" action="{{ route('course.delete', $course->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </div>
                    </td>

                </tr>

                @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>

<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">➕ إضافة كورس جديد</h5>
            </div>

            <div class="modal-body">
                <label class="form-label">عنوان الكورس</label>
                <input type="text" class="form-control mb-3" name="title">

                <label class="form-label">الوصف</label>
                <textarea class="form-control" name="desc" rows="3"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Course Modal -->
<div class="modal fade" id="editCourseModal">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">✏ تعديل الكورس</h5>
            </div>

            <div class="modal-body">
                <label class="form-label">عنوان الكورس</label>
                <input type="text" class="form-control mb-3" value="Laravel Course">

                <label class="form-label">الوصف</label>
                <textarea class="form-control" rows="3">تعلم أساسيات لارفيل</textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button class="btn btn-success">تحديث</button>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

