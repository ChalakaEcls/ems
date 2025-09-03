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
    <div class="card shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-bold text-secondary">
                {{ isset($class) ? 'Edit Class' : 'Add Class' }}
            </h4>
            <a href="{{ route('admin.classes.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card-body">
            <form action="{{ isset($class) ? route('admin.classes.update',$class->id) : route('admin.classes.store') }}"
                  method="POST">
                @csrf
                @if(isset($class))
                    @method('PUT')
                @endif

                <div class="row g-3">
                    <!-- Name -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Teacher <span class="text-danger">*</span></label>
                        <input type="text" name="teacher" class="form-control"
                               value="{{ old('teacher',$class->teacher ?? '') }}" required>
                        @error('teacher')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Name -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Grade <span class="text-danger">*</span></label>
                        <input type="text" name="grade" class="form-control"
                               value="{{ old('grade',$class->grade ?? '') }}" required>
                        @error('grade')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Subject <span class="text-danger">*</span></label>
                        <input type="text" name="subject" class="form-control"
                               value="{{ old('subject',$class->subject ?? '') }}" required>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" class="form-control"
                               value="{{ old('start_date',$class->start_date ?? '') }}" required>
                        @error('start_date')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">End Date <span class="text-danger">*</span></label>
                        <input type="date" name="end_date" class="form-control"
                               value="{{ old('end_date',$class->end_date ?? '') }}" required>
                        @error('end_date')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Time <span class="text-danger">*</span></label>
                        <input type="time" name="time" class="form-control"
                               value="{{ old('time',$class->time ?? '') }}" required>
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>

                <!-- Submit -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> {{ isset($class) ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    </div>




</div>

</body>
</html>
