@extends('admin.layout')

@section('title', 'Manage Rooms - Admin Panel')
@section('page-title', 'Manage Rooms')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-muted mb-0">Add, edit, or remove rooms from the system.</p>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Add New Room
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th class="text-center">Floor</th>
                        <th class="text-center">Capacity</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Last Updated</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                    <tr>
                        <td><strong>{{ $room->name }}</strong></td>
                        <td class="text-center">{{ $room->floor }}</td>
                        <td class="text-center">{{ $room->capacity }}</td>
                        <td class="text-center">
                            @if($room->status == 'available')
                                <span class="badge badge-available">Available</span>
                            @elseif($room->status == 'occupied')
                                <span class="badge badge-occupied">Occupied</span>
                            @else
                                <span class="badge badge-maintenance">Maintenance</span>
                            @endif
                        </td>
                        <td class="text-center">{{ $room->updated_at->format('M d, Y h:i A') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.rooms.delete', $room->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this room?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            <i class="bi bi-inbox display-4 d-block mb-3"></i>
                            No rooms have been added yet.<br>
                            <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mt-3">Add Your First Room</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

