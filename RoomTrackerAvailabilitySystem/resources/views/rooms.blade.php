@extends('layout')

@section('title', 'Rooms - Room Tracker and Availability System')

@section('content')
<div class="mb-4">
    <h1 class="display-5 fw-bold">Our Rooms</h1>
    <p class="text-muted">View all available rooms and laboratories within the College of Computer Studies.</p>
</div>

<!-- Search Bar -->
<div class="row mb-4">
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('rooms.search') }}" method="GET" class="d-flex">
            <div class="input-group">
                <input type="text" class="form-control" name="query" 
                       placeholder="Search room by name..." 
                       value="{{ $query ?? '' }}">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search me-1"></i>Search
                </button>
                @if(isset($query) && $query)
                    <a href="{{ route('rooms') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i>Clear
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Search Results Info -->
@if(isset($query) && $query)
    <div class="alert alert-info mb-4">
        <i class="bi bi-info-circle me-2"></i>
        Showing results for: <strong>"{{ $query }}"</strong> 
        ({{ $rooms->count() }} {{ $rooms->count() == 1 ? 'room' : 'rooms' }} found)
    </div>
@endif

<div class="row g-4">
    @forelse($rooms as $room)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ $room->name }}</span>
                    @if($room->status == 'available')
                        <span class="badge badge-available">Available</span>
                    @elseif($room->status == 'occupied')
                        <span class="badge badge-occupied">Occupied</span>
                    @else
                        <span class="badge badge-under-maintenance">Maintenance</span>
                    @endif
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Capacity:</strong> {{ $room->capacity }} students</p>
                    <p class="card-text"><strong>Equipment:</strong> {{ $room->equipment }}</p>
                    <p class="card-text"><strong>Floor:</strong> {{ $room->floor }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-triangle me-2"></i>
                @if(isset($query) && $query)
                    No rooms found matching "{{ $query }}". <a href="{{ route('rooms') }}">View all rooms</a>
                @else
                    No rooms available at the moment.
                @endif
            </div>
        </div>
    @endforelse
</div>
@endsection
