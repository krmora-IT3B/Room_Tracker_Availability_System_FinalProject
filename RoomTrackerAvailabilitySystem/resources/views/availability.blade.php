@extends('layout')

@section('title', 'Availability - Room Tracker and Availability System')

@section('content')
<div class="mb-4">
    <h1 class="display-5 fw-bold">Rooms and Laboratories Availability</h1>
    <p class="text-muted">Displays the real-time availability status of all rooms and laboratories within the department.</p>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Current Status</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Room Name</th>
                        <th class="text-center">Floor</th>
                        <th class="text-center">Capacity</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                    <tr>
                        <td class="text-center"><strong>{{ $room->name }}</strong></td>
                        <td class="text-center">{{ $room->floor }}</td>
                        <td class="text-center">{{ $room->capacity }} students</td>
                        <td class="text-center">
                            @if($room->status == 'available')
                                <span class="badge badge-available">Available</span>
                            @elseif($room->status == 'occupied')
                                <span class="badge badge-occupied">Occupied</span>
                            @else
                                <span class="badge badge-under-maintenance">Under Maintenance</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $room->updated_at->format('M d, Y h:i A') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No rooms available. <a href="{{ route('rooms.create') }}">Add a room</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                <i class="bi bi-bar-chart-fill me-2" style="color: var(--primary-blue);"></i>
                Summary
                </h5>
                <p class="mb-2"><strong>Total Rooms:</strong> {{ $totalRooms }}</p>
                <p class="mb-2"><strong>Available:</strong> <span class="text-success">{{ $availableCount }}</span></p>
                <p class="mb-2"><strong>Occupied:</strong> <span class="text-danger">{{ $occupiedCount }}</span></p>
                <p class="mb-0"><strong>Under Maintenance:</strong> <span class="text-warning">{{ $maintenanceCount }}</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                <i class="bi bi-info-circle-fill me-2" style="color: var(--primary-blue);"></i>
                Information
                </h5>
                <p class="mb-0">Room availability is updated in real-time when changes are made. Use the <a href="{{ route('rooms') }}">Rooms</a> page to manage room status.</p>
            </div>
        </div>
    </div>
</div>
@endsection
