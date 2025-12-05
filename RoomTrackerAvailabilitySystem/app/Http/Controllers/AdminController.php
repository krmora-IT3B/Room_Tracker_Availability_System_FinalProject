<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * Uses secure password hashing and SQL injection prevention via Eloquent ORM.
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        // Get request info for logging
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();

        // Query the database for the user by username
        // Eloquent ORM automatically prevents SQL injection through parameter binding
        $user = User::where('username', $request->username)->first();

        // Check if user exists, password matches (using secure hash comparison), and has admin role
        if ($user && Hash::check($request->password, $user->password) && $user->isAdmin()) {
            // Log successful login to database
            LoginHistory::logSuccess($user, $ipAddress, $userAgent);
            
            // Regenerate session ID to prevent session fixation attacks
            $request->session()->regenerate();
            
            // Store admin session data
            session([
                'admin_logged_in' => true,
                'admin_user_id' => $user->id,
                'admin_username' => $user->username,
                'admin_name' => $user->name,
            ]);
            
            return redirect()->route('admin.dashboard')
                ->with('success', 'Welcome back, ' . $user->name . '!');
        }

        // Determine failure reason for logging
        $failureReason = 'Invalid credentials';
        if ($user && !$user->isAdmin()) {
            $failureReason = 'User is not an admin';
        } elseif ($user && !Hash::check($request->password, $user->password)) {
            $failureReason = 'Incorrect password';
        } elseif (!$user) {
            $failureReason = 'User not found';
        }

        // Log failed login attempt to database
        LoginHistory::logFailure($request->username, $ipAddress, $userAgent, $failureReason);

        // Invalid credentials - use generic message to prevent username enumeration
        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Invalid username or password.');
    }

    /**
     * Handle admin logout.
     */
    public function logout(Request $request)
    {
        // Clear admin session data
        session()->forget([
            'admin_logged_in',
            'admin_user_id',
            'admin_username',
            'admin_name',
        ]);
        
        // Invalidate and regenerate session for security
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
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

