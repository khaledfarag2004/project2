@extends('client.layouts.layouts')

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-3 overflow-hidden">

            <!-- Cover -->
            <div class="bg-primary" style="height: 200px; background: linear-gradient(135deg, #007bff, #6610f2);"></div>

            <!-- Profile -->
            <div class="card-body text-center position-relative" style="margin-top: -80px;">
                <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://via.placeholder.com/150' }}"
                     class="rounded-circle border border-4 border-white shadow"
                     alt="User Avatar" width="150" height="150">

                <h3 class="mt-3 mb-1">{{ $user->name }}</h3>
                <p class="text-muted mb-3"><i class="bi bi-envelope me-1"></i> {{ $user->email }}</p>
            </div>

            <!-- Info -->
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

        <!-- Courses -->
        <div class="card mt-4 shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5><i class="bi bi-book me-2"></i> الكورسات المرفوعة</h5>
            </div>
            <div class="card-body">
                @if($user->courses->count() > 0)
                    <ul class="list-group list-group-flush">
                        @foreach($user->courses as $course)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $course->title }}</strong>
                                    <p class="text-muted mb-0">{{ $course->description }}</p>
                                </div>
                                <span class="badge bg-primary">{{ $course->price }} جنيه</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">هذا المستخدم لم يقم برفع أي كورسات بعد.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
