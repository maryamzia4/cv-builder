<!DOCTYPE html>
<html>
<head>
    <title>CV List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #333;
        }
        .table thead th {
            background-color: #000;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="my-4">CV List</h1>
    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-custom">Dashboard</a>
        <a href="{{ route('cv.create') }}" class="btn btn-custom">Create New CV</a>
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
