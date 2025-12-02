@extends('layout')

@section('title', 'Add Room - Room Tracker and Availability System')

@section('content')
<div class="mb-4">
    <h1 class="display-5 fw-bold">Add New Room</h1>
    <p class="text-muted">Fill in the form below to add a new room to the system.</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-plus-circle me-2"></i>Room Information
            </div>
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('rooms.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Room Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" 
                               placeholder="e.g., Room 001, MAC Lab, IT Lab 1" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="capacity" class="form-label fw-semibold">Capacity <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                                   id="capacity" name="capacity" value="{{ old('capacity') }}" 
                                   placeholder="Number of students" min="1" required>
                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="floor" class="form-label fw-semibold">Floor <span class="text-danger">*</span></label>
                            <select class="form-select @error('floor') is-invalid @enderror" id="floor" name="floor" required>
                                <option value="">Select Floor</option>
                                <option value="Ground Floor" {{ old('floor') == 'Ground Floor' ? 'selected' : '' }}>Ground Floor</option>
                                <option value="2nd Floor" {{ old('floor') == '2nd Floor' ? 'selected' : '' }}>2nd Floor</option>
                                <option value="3rd Floor" {{ old('floor') == '3rd Floor' ? 'selected' : '' }}>3rd Floor</option>
                                <option value="4th Floor" {{ old('floor') == '4th Floor' ? 'selected' : '' }}>4th Floor</option>
                            </select>
                            @error('floor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="equipment" class="form-label fw-semibold">Equipment <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('equipment') is-invalid @enderror" 
                                  id="equipment" name="equipment" rows="3" 
                                  placeholder="e.g., Whiteboard, Projector, Computers, Chairs, Aircon" required>{{ old('equipment') }}</textarea>
                        @error('equipment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="occupied" {{ old('status') == 'occupied' ? 'selected' : '' }}>Occupied</option>
                            <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>Add Room
                        </button>
                        <a href="{{ route('rooms') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Back to Rooms
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

