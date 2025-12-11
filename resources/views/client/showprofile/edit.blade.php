@extends('client.layouts.layouts')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">تعديل الحساب</h4>
            </div>

            <div class="card-body">

                {{-- ✅ عرض الأخطاء --}}
                @if ($errors->any())
                    <div class="alert alert-danger p-2">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ✅ الفورم الأساسي --}}
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
                            @php
                                $countries = [
                                    'EG' => 'مصر', 'SA' => 'السعودية', 'AE' => 'الإمارات', 'KW' => 'الكويت',
                                    'QA' => 'قطر', 'BH' => 'البحرين', 'OM' => 'عُمان', 'JO' => 'الأردن',
                                    'LB' => 'لبنان', 'MA' => 'المغرب', 'DZ' => 'الجزائر', 'TN' => 'تونس',
                                    'SD' => 'السودان', 'IQ' => 'العراق', 'YE' => 'اليمن'
                                ];
                            @endphp

                            @foreach($countries as $code => $name)
                                <option value="{{ $code }}" {{ $user->country == $code ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الهاتف</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">حفظ التعديلات</button>

                    {{-- ✅ زر الرجوع --}}
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">رجوع</a>

                </form>

            </div>
        </div>
    </div>
@endsection
