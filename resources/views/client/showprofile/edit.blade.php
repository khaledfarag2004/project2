@extends('client.layouts.layouts')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">تعديل الحساب</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الدور</label>
                        <select name="role" class="form-select" required>
                            <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>طالب</option>
                            <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>مدرس</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الدولة</label>
                        <select name="country" class="form-select" required>
                            <option value="EG" {{ $user->country == 'EG' ? 'selected' : '' }}>مصر</option>
                            <option value="SA" {{ $user->country == 'SA' ? 'selected' : '' }}>السعودية</option>
                            <option value="AE" {{ $user->country == 'AE' ? 'selected' : '' }}>الإمارات</option>
                            <option value="KW" {{ $user->country == 'KW' ? 'selected' : '' }}>الكويت</option>
                            <option value="QA" {{ $user->country == 'QA' ? 'selected' : '' }}>قطر</option>
                            <option value="BH" {{ $user->country == 'BH' ? 'selected' : '' }}>البحرين</option>
                            <option value="OM" {{ $user->country == 'OM' ? 'selected' : '' }}>عُمان</option>
                            <option value="JO" {{ $user->country == 'JO' ? 'selected' : '' }}>الأردن</option>
                            <option value="LB" {{ $user->country == 'LB' ? 'selected' : '' }}>لبنان</option>
                            <option value="MA" {{ $user->country == 'MA' ? 'selected' : '' }}>المغرب</option>
                            <option value="DZ" {{ $user->country == 'DZ' ? 'selected' : '' }}>الجزائر</option>
                            <option value="TN" {{ $user->country == 'TN' ? 'selected' : '' }}>تونس</option>
                            <option value="SD" {{ $user->country == 'SD' ? 'selected' : '' }}>السودان</option>
                            <option value="IQ" {{ $user->country == 'IQ' ? 'selected' : '' }}>العراق</option>
                            <option value="YE" {{ $user->country == 'YE' ? 'selected' : '' }}>اليمن</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الهاتف</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" required>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                    <button type="submit" class="btn btn-success">حفظ التعديلات</button>
                    </form>
                    <a href="" class="btn btn-secondary">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection
