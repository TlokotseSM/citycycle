@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bicycles Due for Maintenance</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Bicycle ID</th>
                <th>Hub</th>
                <th>Status</th>
                <th>Next Inspection</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dueForInspection as $bicycle)
            <tr>
                <td>{{ $bicycle->identifier }}</td>
                <td>{{ $bicycle->hub->name }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $bicycle->status)) }}</td>
                <td>{{ $bicycle->next_inspection_date->format('Y-m-d') }}</td>
                <td>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#maintenanceModal{{ $bicycle->id }}">
                        Update Status
                    </button>
                </td>
            </tr>

            <!-- Maintenance Modal -->
            <div class="modal fade" id="maintenanceModal{{ $bicycle->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('bicycles.maintenance.update', $bicycle) }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Update Bicycle Status</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="available" {{ $bicycle->status === 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="in_maintenance" {{ $bicycle->status === 'in_maintenance' ? 'selected' : '' }}>In Maintenance</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Maintenance Notes</label>
                                    <textarea name="maintenance_notes" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Next Inspection Date</label>
                                    <input type="date" name="next_inspection_date" class="form-control"
                                        value="{{ old('next_inspection_date', $bicycle->next_inspection_date->format('Y-m-d')) }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
