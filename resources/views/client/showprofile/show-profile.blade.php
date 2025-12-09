@extends('client.layouts.layouts')

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-3 overflow-hidden">

            <!-- Cover Photo -->
            <div class="bg-primary" style="height: 200px; background: linear-gradient(135deg, #007bff, #6610f2);"></div>

            <!-- Profile Section -->
            <div class="card-body text-center position-relative" style="margin-top: -80px;">
                <!-- Avatar -->
                <img src="https://via.placeholder.com/150"
                     class="rounded-circle border border-4 border-white shadow"
                     alt="User Avatar" width="150" height="150">

                <!-- Name -->
                <h3 class="mt-3 mb-1">{{ $user->name }}</h3>
                <p class="text-muted mb-3">
                    <i class="bi bi-envelope me-1"></i> {{ $user->email }}
                </p>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-center gap-3 mt-3">
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary px-4">
                        <i class="bi bi-pencil-square me-1"></i> تعديل الحساب
                    </a>

                    <form action="{{ route('profile.delete') }}" method="POST"
                          onsubmit="return confirm('هل أنت متأكد أنك تريد حذف الحساب؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger px-4">
                            <i class="bi bi-trash-fill me-1"></i> حذف الحساب
                        </button>
                    </form>
                </div>
            </div>

            <!-- User Info -->
            <div class="card-footer bg-light">
                <div class="row text-center">
                    <div class="col-md-4 py-3">
                        <h6 class="text-primary"><i class="bi bi-shield-lock-fill me-1"></i> الدور</h6>
                        <p class="mb-0">{{ $user->role }}</p>
                    </div>
                    <div class="col-md-4 py-3">
                        <h6 class="text-primary"><i class="bi bi-geo-alt-fill me-1"></i> الدولة</h6>
                        <p class="mb-0">{{ $user->country }}</p>
                    </div>
                    <div class="col-md-4 py-3">
                        <h6 class="text-primary"><i class="bi bi-telephone-fill me-1"></i> الهاتف</h6>
                        <p class="mb-0">{{ $user->phone }}</p>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="bi bi-calendar-check me-1"></i>
                        عضو منذ {{ $user->created_at->format('Y-m-d H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><i class="bi bi-book me-2"></i> الكورسات المرفوعة</h5>
        </div>

        <div class="card-body">
            @if($user->courses->count() > 0)
                <div class="list-group">
                    @foreach($user->courses as $course)
                        <div class="list-group-item bg-white shadow-sm rounded mb-3 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $course->title }}</h6>
                                    <p class="text-muted mb-2" style="font-size: 0.9rem;">
                                        {{ $course->description }}
                                    </p>
                                    <span class="badge bg-primary">{{ $course->price }} جنيه</span>
                                </div>

                                <!-- زرار الحذف -->
                                <form action="{{ route('Post.delete', $course->id) }}" method="POST"
                                      onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا الكورس؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light btn-sm text-danger border-0"
                                            title="حذف الكورس">
                                        <i class="bi bi-trash-fill fs-5"></i>
                                    </button>
                                </form>
                            </div>

                            <div class="mt-2 text-muted small">
                                <i class="bi bi-calendar me-1"></i>
                                {{ $course->created_at->format('Y-m-d') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">لم تقم برفع أي كورسات بعد.</p>
            @endif
        </div>
    </div>

@endsection
