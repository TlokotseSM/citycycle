@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $hub->name }} - Available Bicycles</h1>

    @if($availableBicycles->isEmpty())
        <div class="alert alert-info">No bicycles currently available at this hub.</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Bicycle ID</th>
                    <th>Last Inspection</th>
                    <th>Next Inspection</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($availableBicycles as $bicycle)
                <tr>
                    <td>{{ $bicycle->identifier }}</td>
                    <td>{{ $bicycle->last_inspection_date->format('Y-m-d') }}</td>
                    <td>{{ $bicycle->next_inspection_date->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('bicycles.reserve', $bicycle) }}" class="btn btn-sm btn-success">Reserve</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
