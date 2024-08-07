<!DOCTYPE html>
<html>
<head>
    <title>CV List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">CV List</h1>
    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
        <a href="{{ route('cv.create') }}" class="btn btn-primary">Create New CV</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Email</th>
            <th>View Templates</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cvs as $cv)
            <tr>
                <td>{{ $cv->id }}</td>
                <td>{{ $cv->name }}</td>
                <td>{{ $cv->title }}</td>
                <td>{{ $cv->email }}</td>
                <td>
                    <a href="{{ route('cv.show', $cv->id) }}" class="btn btn-info">1</a>
                    <a href="{{ route('cv.show2', $cv->id) }}" class="btn btn-info">2</a>
                    <a href="{{ route('cv.show3', $cv->id) }}" class="btn btn-info">3</a>
                </td>
                <td>
                    <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cv.destroy', $cv->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
