<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of all rooms.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    /**
     * Show the form for creating a new room.
     */
    public function create()
    {
        return view('add_room');
    }

    /**
     * Store a newly created room in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'equipment' => 'required|string',
            'floor' => 'required|string|max:255',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        $room = Room::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'equipment' => $request->equipment,
            'floor' => $request->floor,
            'status' => $request->status,
        ]);

        return redirect()->route('rooms')
            ->with('success', 'Room added successfully!')
            ->with('notification', [
                'room' => $room->name,
                'message' => 'has been added to the system',
                'status' => $room->status
            ]);
    }

    /**
     * Show the form for editing the specified room.
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('edit_room', compact('room'));
    }

    /**
     * Update the specified room in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'equipment' => 'required|string',
            'floor' => 'required|string|max:255',
            'status' => 'required|in:available,occupied,maintenance',
        ]);

        $room = Room::findOrFail($id);
        $oldStatus = $room->status;
        
        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'equipment' => $request->equipment,
            'floor' => $request->floor,
            'status' => $request->status,
        ]);

        // Create appropriate notification message
        $statusMessages = [
            'available' => 'is now available for use',
            'occupied' => 'is now occupied',
            'maintenance' => 'is under maintenance'
        ];
        
        $message = $oldStatus !== $request->status 
            ? $statusMessages[$request->status] 
            : 'has been updated';

        return redirect()->route('rooms')
            ->with('success', 'Room updated successfully!')
            ->with('notification', [
                'room' => $room->name,
                'message' => $message,
                'status' => $room->status
            ]);
    }

    /**
     * Remove the specified room from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $roomName = $room->name;
        $room->delete();

        return redirect()->route('rooms')
            ->with('success', 'Room deleted successfully!')
            ->with('notification', [
                'room' => $roomName,
                'message' => 'has been removed from the system',
                'status' => 'maintenance'
            ]);
    }

    /**
     * Search for rooms by name.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            $rooms = Room::where('name', 'LIKE', '%' . $query . '%')->get();
        } else {
            $rooms = Room::all();
        }

        return view('rooms', compact('rooms', 'query'));
    }

    /**
     * Display room availability status.
     */
    public function availability()
    {
        $rooms = Room::all();
        
        // Calculate summary statistics
        $totalRooms = $rooms->count();
        $availableCount = $rooms->where('status', 'available')->count();
        $occupiedCount = $rooms->where('status', 'occupied')->count();
        $maintenanceCount = $rooms->where('status', 'maintenance')->count();
        
        return view('availability', compact('rooms', 'totalRooms', 'availableCount', 'occupiedCount', 'maintenanceCount'));
    }
}

