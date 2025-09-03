@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>My Subscriptions</h2>
        @if($subscriptions->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Grade</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Start Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->class->grade }}</td>
                                <td>{{ $subscription->class->subject }}</td>
                                <td>{{ $subscription->class->teacher }}</td>
                                <td>{{ $subscription->class->start_date }}</td>
                                <td>{{ $subscription->class->time }}</td>
                                <td>
                                    <form action="{{ route('student.unsubscribe', $subscription->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Unsubscribe</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>You are not subscribed to any classes yet.</p>
        @endif
    </div>

    <div class="col-md-4">
        <h2>Available Classes</h2>
        @if($classes->count() > 0)
            @foreach($classes as $class)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $class->subject }} (Grade {{ $class->grade }})</h5>
                        <p class="card-text">
                            <strong>Teacher:</strong> {{ $class->teacher }}<br>
                            <strong>Start Date:</strong> {{ $class->start_date }}<br>
                            <strong>Time:</strong> {{ $class->time }}
                        </p>
                        <form action="{{ route('student.subscribe', $class->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>No available classes at the moment.</p>
        @endif
    </div>
</div>
@endsection