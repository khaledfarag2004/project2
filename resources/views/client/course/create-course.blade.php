@extends('client.layouts.layouts')

@section('content')

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

    <br><br><br>

    <div class="container">

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">إضافة كورس</h4>
            </div>

            <div class="card-body">

                {{-- ✅ تعديل الراوت --}}
                <form action="{{ route('client.courses.store') }}" method="POST">
                    @csrf

                    <!-- Course Title -->
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
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

                    <!-- Submit Button -->
                    <button class="btn btn-success w-100 py-2">✔ إضافة الكورس</button>

                </form>

            </div>
        </div>

    </div>

@endsection
