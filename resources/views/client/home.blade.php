@extends('client.layouts.layouts')
@section('content')

    <section class="container my-5">
        <div class="row align-items-center hero">
            <div class="col-lg-7">
                <h1 class="display-6 fw-bold">Learn anything. Affordable online courses.</h1>
                <p class="lead text-muted">Join millions of learners and access thousands of top-rated courses in design, development, business, and more.</p>

                <div class="d-flex gap-2 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="#">Get started</a>
                    <a class="btn btn-outline-primary btn-lg" href="#"><i class="bi bi-play-circle"></i> Watch intro</a>
                </div>

                <div class="mt-4 d-flex gap-3">
                    <div class="me-3">
                        <div class="small text-muted">Top categories</div>
                        <div class="badge-category mt-1">Development</div>
                    </div>
                    <div>
                        <div class="small text-muted">Popular</div>
                        <div class="badge-category mt-1">Business</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <img src="https://images.unsplash.com/photo-1588702547923-7093a6c3ba33?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=0"
                     class="img-fluid rounded" alt="hero">
            </div>
        </div>
    </section>

    <!-- TOP CATEGORIES -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="h5 mb-0">Top categories</h3>
            <a href="#" class="small">Browse all</a>
        </div>

        <div class="row g-3">
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded d-flex align-items-center gap-3 shadow-sm">
                    <i class="bi bi-code-slash fs-3 text-primary"></i>
                    <div>
                        <div class="fw-bold">Development</div>
                        <div class="small text-muted">5,200 courses</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded d-flex align-items-center gap-3 shadow-sm">
                    <i class="bi bi-brush fs-3 text-danger"></i>
                    <div>
                        <div class="fw-bold">Design</div>
                        <div class="small text-muted">1,300 courses</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded d-flex align-items-center gap-3 shadow-sm">
                    <i class="bi bi-graph-up fs-3 text-success"></i>
                    <div>
                        <div class="fw-bold">Business</div>
                        <div class="small text-muted">900 courses</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded d-flex align-items-center gap-3 shadow-sm">
                    <i class="bi bi-music-note-list fs-3 text-warning"></i>
                    <div>
                        <div class="fw-bold">Music</div>
                        <div class="small text-muted">430 courses</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COURSES GRID -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="h5 mb-0">Featured courses</h3>
            <a href="#" class="small">See all</a>
        </div>

        <div class="row">
            @foreach($courses as $course)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card course-card h-100">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg"
                             class="course-thumb" alt="PHP Logo">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-1" style="font-size:1rem">{{ $course->title }}</h5>
                                <span class="badge bg-primary">{{ $course->price }} جنيه</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="small text-muted">⭐⭐⭐⭐☆ (4.7)</div>
                                <div class="small text-muted">By: {{ $course->user->name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- INSTRUCTORS -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="h5 mb-0">Top instructors</h3>
            <a href="#" class="small">See more</a>
        </div>

        <div class="row g-4">
            @foreach($users as $user)
                <div class="col-6 col-md-3">
                    <!-- ✅ تعديل الراوت هنا -->
                    <a href="{{ route('profile.show') }}" class="text-decoration-none text-dark">
                        <div class="instructor-card text-center p-3 shadow-sm rounded">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop&ixlib=rb-4.0.3&s=0"
                                 class="rounded-circle mb-2" width="72" height="72" alt="inst">

                            <div class="fw-bold">{{ $user->name }}</div>
                            <div class="small text-muted">{{ $user->country }} · {{ $user->phone }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- FOOTER -->

@endsection
