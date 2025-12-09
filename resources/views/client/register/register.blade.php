@extends('client.layouts.layouts')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Register New User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.register.submit') }}" method="post">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" >
                        </div>
                        <!-- password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </div>

                        <!-- Country -->
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="EG">Egypt</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="KW">Kuwait</option>
                                <option value="QA">Qatar</option>
                                <option value="BH">Bahrain</option>
                                <option value="OM">Oman</option>
                                <option value="JO">Jordan</option>
                                <option value="LB">Lebanon</option>
                                <option value="MA">Morocco</option>
                                <option value="DZ">Algeria</option>
                                <option value="TN">Tunisia</option>
                                <option value="SD">Sudan</option>
                                <option value="IQ">Iraq</option>
                                <option value="YE">Yemen</option>
                            </select>
                        </div>
                        <a href="{{ route('client.login') }}" >Go To Login?</a>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
@endsection
