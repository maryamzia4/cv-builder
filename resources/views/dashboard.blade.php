<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
            margin-bottom: 20px;
        }
        .card-title {
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        <h1 class="my-4 text-center">Dashboard</h1>

        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('cv.create') }}" class="btn btn-custom">Create New CV</a>
            <a href="{{ route('cv.list') }}" class="btn btn-custom">Manage Lists</a>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total CVs</h5>
                        <p class="display-4">{{ $totalCvs }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CV Categories</h5>
                        <div class="chart-container">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Search CVs</h5>
                <form method="GET" action="{{ route('dashboard') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-custom">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if(count($cvs) > 0)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Search Results</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cvs as $cv)
                            <tr>
                                <td>{{ $cv['id'] }}</td>
                                <td>{{ $cv['name'] }}</td>
                                <td>{{ $cv['title'] }}</td>
                                <td>{{ $cv['email'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script>
        var ctx = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($categoriesLabels), 
                datasets: [{
                    label: 'CV Categories',
                    data: @json($categoriesValues), 
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'], 
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                let label = tooltipItem.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += tooltipItem.raw.toFixed(0) + ' CVs';
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
