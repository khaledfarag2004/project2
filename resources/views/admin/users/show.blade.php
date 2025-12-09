@extends('admin.layouts.layouts')

@section('content')
    <div class="container py-4">
        <h2 class="text-center mb-4">User Details</h2>

        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">User #</h5>
            </div>
            <div class="card-body">
                <p><strong>Name: {{ $user->id }}</strong> </p>
                <p><strong>Name: {{ $user->name }}</strong> </p>
                <p><strong>Email: {{ $user->email }}</strong> </p>
                <p><strong>Phone: {{ $user->phone }}</strong></p>
                <p><strong>Role: {{ $user->role }}</strong></p>
                <p><strong>Created At: {{ $user->created_at }}</strong></p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('admin.user') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('admin.delete', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this user?')">
                        Delete
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
