<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show admin login form.
     */
    public function showLogin()
    {
        // If already logged in, redirect to dashboard
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Handle admin login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Simple admin credentials (you can change these)
        $adminUsername = 'admin';
        $adminPassword = 'admin123';

        if ($request->username === $adminUsername && $request->password === $adminPassword) {
            session(['admin_logged_in' => true]);
            session(['admin_username' => $request->username]);
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->with('error', 'Invalid username or password.');
    }

    /**
     * Handle admin logout.
     */
    public function logout()
    {
        session()->forget('admin_logged_in');
        session()->forget('admin_username');
        return redirect()->route('admin.login')->with('success', 'You have been logged out.');
    }

    /**
     * Show admin dashboard.
     */
    public function dashboard()
    {
        $totalRooms = Room::count();
        $availableRooms = Room::where('status', 'available')->count();
        $occupiedRooms = Room::where('status', 'occupied')->count();
        $maintenanceRooms = Room::where('status', 'maintenance')->count();
        $recentRooms = Room::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRooms',
            'availableRooms',
            'occupiedRooms',
            'maintenanceRooms',
            'recentRooms'
        ));
    }

    /**
     * Show all rooms for management.
     */
    public function rooms()
    {
        $rooms = Room::all();
        return view('admin.rooms', compact('rooms'));
    }

    /**
     * Show create room form.
     */
    public function createRoom()
    {
        return view('admin.create_room');
    }

    /**
     * Store a new room.
     */
    public function storeRoom(Request $request)
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

        return redirect()->route('admin.rooms')
            ->with('success', 'Room "' . $room->name . '" added successfully!')
            ->with('notification', [
                'room' => $room->name,
                'message' => 'has been added to the system',
                'status' => $room->status
            ]);
    }

    /**
     * Show edit room form.
     */
    public function editRoom($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.edit_room', compact('room'));
    }

    /**
     * Update a room.
     */
    public function updateRoom(Request $request, $id)
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

        $statusMessages = [
            'available' => 'is now available for use',
            'occupied' => 'is now occupied',
            'maintenance' => 'is under maintenance'
        ];

        $message = $oldStatus !== $request->status
            ? $statusMessages[$request->status]
            : 'has been updated';

        return redirect()->route('admin.rooms')
            ->with('success', 'Room "' . $room->name . '" updated successfully!')
            ->with('notification', [
                'room' => $room->name,
                'message' => $message,
                'status' => $room->status
            ]);
    }

    /**
     * Delete a room.
     */
    public function deleteRoom($id)
    {
        $room = Room::findOrFail($id);
        $roomName = $room->name;
        $room->delete();

        return redirect()->route('admin.rooms')
            ->with('success', 'Room "' . $roomName . '" deleted successfully!')
            ->with('notification', [
                'room' => $roomName,
                'message' => 'has been removed from the system',
                'status' => 'maintenance'
            ]);
    }
}

