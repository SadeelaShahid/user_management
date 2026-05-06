<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">Edit User</h2>
        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
            </div>
            <div class="mb-3">
                <label>Father Name</label>
                <input type="text" name="father_name" class="form-control" value="{{ $profile->father_name }}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $profile->email }}">
            </div>
            <div class="mb-3">
                <label>Comment</label>
                <textarea name="comment" class="form-control" rows="3">{{ $profile->comment }}</textarea>
            </div>
            <div class="mb-3">
                <label>Picture</label><br>
                @if($profile->picture)
                    <img src="{{ asset('storage/'.$profile->picture) }}" width="80" class="mb-2"><br>
                @endif
                <input type="file" name="picture" class="form-control">
            </div>
            <a href="{{ route('profiles.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</body>
</html>