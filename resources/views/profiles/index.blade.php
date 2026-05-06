<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>All Users</h2>
        <a href="{{ route('profiles.create') }}" class="btn btn-success">+ New User</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                <td>{{ $profile->id }}</td>
                <td>
                    @if($profile->picture)
                        <img src="{{ asset('storage/'.$profile->picture) }}" width="60" height="60" style="border-radius:50%">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $profile->name }}</td>
                <td>{{ $profile->father_name }}</td>
                <td>{{ $profile->email }}</td>
                <td>{{ $profile->comment }}</td>
                <td>
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete karna hai?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>