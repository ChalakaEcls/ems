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
                    {{--                        <a class="nav-link" href="{{ route('admin.students.index') }}">Student Management</a>--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Admin Class</h2>

    <div class="card shadow p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <h5 class="mb-0 fw-bold text-secondary">Class List</h5>
            <a href="{{route('admin.classes.create')}}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Add Class
            </a>
        </div>
        <table id="classTable" class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Teacher</th>
                <th width="10%">Grade</th>
                <th width="10%">Subject</th>
                <th width="10%">Start Date</th>
                <th width="10%">Time</th>
                <th width="15%">Update At</th>
                <th width="30%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->teacher }}</td>
                    <td>{{ $class->grade }}</td>
                    <td>{{ $class->subject }}</td>
                    <td>{{ $class->start_date }}</td>
                    <td>{{ $class->time }}</td>
                    <td>{{ $class->updated_at }}</td>

                    <td class="text-center">
                        <a href="{{ route('admin.classes.show', $class->id) }}">
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i>
                            </button></a>
                        <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" style="display:inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this class?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script>
    $(document).ready(function () {
        var table = $('#classTable').DataTable({
            responsive: true,
            paging: true,
            info: true,
            searching: true,
            ordering: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search ..."
            },
            order: [[0, 'asc']]
        });

    });


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
