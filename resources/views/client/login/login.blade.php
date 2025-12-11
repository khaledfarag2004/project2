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

    <div class="container py-5" style="max-width:500px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-center mb-4">Login</h3>

                <form action="{{ route('client.login.submit') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="example@mail.com" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="********">
                    </div>

                    <a href="{{ route('client.register') }}">Go To Register?</a>

                    <button class="btn btn-primary w-100 mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>

@endsection
