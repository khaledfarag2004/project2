@extends('admin.layouts.layouts')
@section('content')

    <div class="content">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">لوحة التحكم</h3>
            <a href="{{ route('course.create') }}" class="btn btn-primary btn-sm">إضافة كورس</a>
        </div>

        <!-- STAT CARDS -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">الكورسات المسجّل فيها</h6>
                            <h3 class="fw-bold">5</h3>
                        </div>
                        <div class="card-icon text-primary">📚</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">عدد الـ Enrollments</h6>
                            <h3 class="fw-bold"></h3>
                        </div>
                        <div class="card-icon text-success">📝</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">آخر تسجيل دخول</h6>
                            <h6 class="fw-bold">2025 / 12 / 5</h6>
                        </div>
                        <div class="card-icon text-warning">⏳</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- COURSES SECTION -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">📚 كورساتك</div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>الكورس</th>
                            <th>الإنستركتور</th>
                            <th>السعر</th>
                            <th>التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->name_instractor }}</td>
                            <td>{{ $course->price }}</td>
                            <form action="{{ route('course.delete', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td><button class="btn btn-primary btn-sm">حذف</button></td></form>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- HISTORY SECTION -->




@endsection
