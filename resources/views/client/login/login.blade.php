@extends('client.layouts.layouts')
@section('content')
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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

<div class="container py-5" style="max-width:500px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="text-center mb-4">Login </h3>
            <form action="{{ route('client.login.submit') }}" method="POST">
                @csrf
            <div class="mb-3">
                    <label class="form-label">Email </label>
                    <input type="email" class="form-control" name="email" placeholder="example@mail.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password </label>
                    <input type="password" class="form-control" name="password" placeholder="********">
                </div>
                <a href="{{ route("client.register") }}" > Go To Register?</a>
                <button class="btn btn-primary w-100">Login </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
@endsection
