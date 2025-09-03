<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Education Portal - Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.classes.index') }}">Class Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.subscriptions.index') }}">Subscription Management</a>
                    </li>
                    <li class="nav-item">
{{--                        <a class="nav-link" href="{{ route('admin.students.index') }}">Student Management</a>--}}
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
{{--                            <button type="submit" class="nav-item">--}}
{{--                                <i class="bi bi-box-arrow-right"></i> Logout--}}
{{--                            </button>--}}
                            <button type="submit" class="nav-link">Logout</button>

                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Admin Dashboard</h2>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text display-4">{{ $students->count() }}</p>
                    </div>
                    <div class="card-footer">
{{--                        <a href="{{ route('admin.students.index') }}" class="text-white">View Details</a>--}}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Classes</h5>
                        <p class="card-text display-4">{{ $classes->count() }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.classes.index') }}" class="text-white">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Subscriptions</h5>
                        <p class="card-text display-4">{{ $subscriptions ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Recent Students</h5>
                    </div>
                    <div class="card-body">
                        @if($students->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Subscriptions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students->take(5) as $student)
                                            <tr>
                                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                                <td>{{ $student->username }}</td>
                                                <td>{{ $student->subscriptions_count ?? '-'}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
{{--                            <a href="{{ route('admin.students.index') }}" class="btn btn-sm btn-primary">View All Students</a>--}}
                        @else
                            <p>No students registered yet.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Recent Classes</h5>
                    </div>
                    <div class="card-body">
                        @if($classes->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Grade</th>
                                            <th>Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($classes->take(5) as $class)
                                            <tr>
                                                <td>{{ $class->subject }}</td>
                                                <td>{{ $class->grade }}</td>
                                                <td>{{ $class->students_count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('admin.classes.index') }}" class="btn btn-sm btn-primary">View All Classes</a>
                        @else
                            <p>No classes created yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
