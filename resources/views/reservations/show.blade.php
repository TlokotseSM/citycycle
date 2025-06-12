@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservation Confirmation</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reservation #{{ $reservation->id }}</h5>
            <p class="card-text">
                <strong>Bicycle:</strong> {{ $reservation->bicycle->identifier }}<br>
                <strong>Hub:</strong> {{ $reservation->bicycle->hub->name }}<br>
                <strong>Period:</strong> {{ $reservation->start_time->format('Y-m-d H:i') }} to {{ $reservation->end_time->format('Y-m-d H:i') }}<br>
                <strong>Status:</strong> {{ ucfirst($reservation->status) }}
            </p>
        </div>
    </div>

    <a href="{{ route('hubs.index') }}" class="btn btn-secondary mt-3">Back to Hubs</a>
</div>
@endsection
