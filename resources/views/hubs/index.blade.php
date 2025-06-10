@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CityCycle Hubs</h1>

    <div class="row">
        @foreach($hubs as $hub)
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $hub->name }}</h5>
                    <p class="card-text">
                        <strong>Location:</strong> {{ $hub->location }}<br>
                        <strong>Available Bikes:</strong> {{ $hub->available_bikes_count }} / {{ $hub->capacity }}
                    </p>
                    <a href="{{ route('hubs.show', $hub) }}" class="btn btn-primary">View Bikes</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
