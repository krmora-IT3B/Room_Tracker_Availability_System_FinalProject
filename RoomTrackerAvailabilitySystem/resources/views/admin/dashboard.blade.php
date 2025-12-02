@extends('admin.layout')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')

@section('content')
<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $totalRooms }}</div>
                    <div class="stat-label">Total Rooms</div>
                </div>
                <div class="stat-icon blue">
                    <i class="bi bi-building"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $availableRooms }}</div>
                    <div class="stat-label">Available</div>
                </div>
                <div class="stat-icon green">
                    <i class="bi bi-check-circle"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $occupiedRooms }}</div>
                    <div class="stat-label">Occupied</div>
                </div>
                <div class="stat-icon red">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $maintenanceRooms }}</div>
                    <div class="stat-label">Maintenance</div>
                </div>
                <div class="stat-icon yellow">
                    <i class="bi bi-tools"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Rooms -->
<div class="row g-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-lightning-fill me-2"></i>Quick Actions
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Add New Room
                    </a>
                    <a href="{{ route('admin.rooms') }}" class="btn btn-outline-primary">
                        <i class="bi bi-list-ul me-2"></i>View All Rooms
                    </a>
                    <a href="{{ route('availability') }}" target="_blank" class="btn btn-outline-secondary">
                        <i class="bi bi-calendar-check me-2"></i>View Public Availability
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-clock-history me-2"></i>Recently Updated Rooms</span>
                <a href="{{ route('admin.rooms') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Room Name</th>
                                <th>Floor</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentRooms as $room)
                            <tr>
                                <td><strong>{{ $room->name }}</strong></td>
                                <td>{{ $room->floor }}</td>
                                <td>
                                    @if($room->status == 'available')
                                        <span class="badge badge-available">Available</span>
                                    @elseif($room->status == 'occupied')
                                        <span class="badge badge-occupied">Occupied</span>
                                    @else
                                        <span class="badge badge-maintenance">Maintenance</span>
                                    @endif
                                </td>
                                <td>{{ $room->updated_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No rooms yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

