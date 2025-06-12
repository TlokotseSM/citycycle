@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reserve Bicycle: {{ $bicycle->identifier }}</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="bicycle_id" value="{{ $bicycle->id }}">

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>

        <button type="submit" class="btn btn-primary">Reserve</button>
    </form>
</div>
@endsection
