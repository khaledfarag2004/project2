@extends('admin.layouts.layouts')

@section('content')
    <div class="container py-4">
        <h2 class="text-center mb-4">List of user</h2>

        <div class="table-responsive">
            <table class="table table-dark table-bordered table-hover text-center">
                <thead class="table-light text-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>created_at</th>
                    <th>Role</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('admin.show', $user->id ) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.delete', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
