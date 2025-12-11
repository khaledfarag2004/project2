@extends('admin.layouts.layouts')
@section('content')
<!-- CONTENT -->
<div class="content">

    <h3 class="fw-bold mb-4">👤 Profile </h3>
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

    <!-- PROFILE SECTION -->
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex align-items-center gap-4">

            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="profile-img" id="previewImg">

            <div>
                <h5 class="fw-bold">{{ $user->name }}</h5>
                <p class="text-muted mb-1">{{ $user->email }}</p>
                <span class="badge-role">{{ $user->role }}</span>
            </div>

            <div class="ms-auto">
                <label class="btn btn-outline-primary btn-sm">
                    تغيير الصورة
                    <input type="file" hidden onchange="loadFile(event)">
                </label>
            </div>

        </div>
    </div>

    <!-- EDIT FORM -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold">✏️ Save</div>
        <div class="card-body">

            <form class="row g-3" method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" value="{{ old('country', $user->country) }}">
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

    <!-- LOGIN HISTORY -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold">📜Logout</div>
        <div class="card-body">

            <ul class="list-group">

                <li class="list-group-item d-flex justify-content-between">
                    تسجيل دخول ناجح — Chrome
                    <small class="text-muted">اليوم 10:15 مساءً</small>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    تسجيل دخول ناجح — Windows
                    <small class="text-muted">أمس 9:40 مساءً</small>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    كلمة مرور تم تغييرها
                    <small class="text-muted">منذ 3 أيام</small>
                </li>

            </ul>

        </div>
    </div>

    <!-- SETTINGS -->
    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">⚙️ الإعدادات</div>
        <div class="card-body">

            <form action="{{ route('admin.users.delete', $user) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">Delete</button>
            </form>

        </div>
    </div>

</div>

<script>
    function loadFile(event) {
        document.getElementById('previewImg').src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection
