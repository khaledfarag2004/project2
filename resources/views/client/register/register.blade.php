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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Register New User</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('client.register.submit') }}" method="POST">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input
                                    type="tel"
                                    class="form-control"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}">
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    required>
                            </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                </select>
                            </div>

                            <!-- Country -->
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" name="country">
                                    <option value="">Select Country</option>

                                    @php
                                        $countries = [
                                            'EG' => 'Egypt', 'SA' => 'Saudi Arabia', 'AE' => 'United Arab Emirates',
                                            'KW' => 'Kuwait', 'QA' => 'Qatar', 'BH' => 'Bahrain', 'OM' => 'Oman',
                                            'JO' => 'Jordan', 'LB' => 'Lebanon', 'MA' => 'Morocco', 'DZ' => 'Algeria',
                                            'TN' => 'Tunisia', 'SD' => 'Sudan', 'IQ' => 'Iraq', 'YE' => 'Yemen'
                                        ];
                                    @endphp

                                    @foreach($countries as $code => $name)
                                        <option value="{{ $code }}" {{ old('country') == $code ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <a href="{{ route('client.login') }}">Already have an account?</a>

                            <!-- Submit -->
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
