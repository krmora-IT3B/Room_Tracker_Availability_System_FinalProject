<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Room Tracker')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary-dark: #1e293b;
            --primary-blue: #3b82f6;
            --sidebar-width: 260px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            padding: 0;
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-header {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-header h4 {
            color: white;
            margin: 0;
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        .sidebar-header small {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.75rem;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        
        .sidebar-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--primary-blue);
        }
        
        .sidebar-menu a.active {
            background-color: rgba(59, 130, 246, 0.2);
            color: white;
            border-left-color: var(--primary-blue);
        }
        
        .sidebar-menu a i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }
        
        .sidebar-divider {
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 15px 20px;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }
        
        .top-navbar {
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .top-navbar h5 {
            margin: 0;
            color: #1e293b;
            font-weight: 600;
        }
        
        .admin-badge {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .content-wrapper {
            padding: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: none;
            transition: transform 0.2s;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
        }
        
        .stat-card .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .stat-card .stat-icon.blue { background-color: #dbeafe; color: #2563eb; }
        .stat-card .stat-icon.green { background-color: #dcfce7; color: #16a34a; }
        .stat-card .stat-icon.red { background-color: #fee2e2; color: #dc2626; }
        .stat-card .stat-icon.yellow { background-color: #fef3c7; color: #d97706; }
        
        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
        }
        
        .stat-card .stat-label {
            color: #64748b;
            font-size: 0.9rem;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 20px;
            font-weight: 600;
            color: #1e293b;
        }
        
        .table th {
            font-weight: 600;
            color: #475569;
            border-bottom-width: 1px;
            padding: 12px 16px;
        }
        
        .table td {
            padding: 12px 16px;
            vertical-align: middle;
        }
        
        .badge-available { background-color: #dcfce7; color: #16a34a; }
        .badge-occupied { background-color: #fee2e2; color: #dc2626; }
        .badge-maintenance { background-color: #fef3c7; color: #d97706; }
        
        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
            border-color: #2563eb;
        }
        
        .logout-link {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            padding: 0 20px;
        }
        
        .logout-link a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #f87171;
            text-decoration: none;
            transition: all 0.3s;
            border-radius: 8px;
        }
        
        .logout-link a:hover {
            background-color: rgba(248, 113, 113, 0.1);
        }
        
        .logout-link a i {
            margin-right: 12px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4><i class="bi bi-building me-2"></i>Room Tracker</h4>
            <small>Admin Panel</small>
        </div>
        
        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="{{ route('admin.rooms') }}" class="{{ request()->routeIs('admin.rooms*') ? 'active' : '' }}">
                <i class="bi bi-door-open-fill"></i> Manage Rooms
            </a>
            
            <div class="sidebar-divider"></div>
            
            <a href="{{ route('home') }}" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> View Public Site
            </a>
            <a href="{{ route('availability') }}" target="_blank">
                <i class="bi bi-calendar-check"></i> View Availability
            </a>
        </div>
        
        <div class="logout-link">
            <a href="{{ route('admin.logout') }}">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="top-navbar">
            <h5>@yield('page-title', 'Dashboard')</h5>
            <div class="d-flex align-items-center gap-3">
                <span class="admin-badge">
                    <i class="bi bi-person-circle me-1"></i> {{ session('admin_username', 'Admin') }}
                </span>
            </div>
        </div>
        
        <div class="content-wrapper">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Handle notifications from server
        @if(session('notification'))
            // Save notification to localStorage for the public site
            const notifications = JSON.parse(localStorage.getItem('roomNotifications') || '[]');
            const newNotification = {
                id: Date.now() + Math.random(),
                room: '{{ session('notification.room') }}',
                message: '{{ session('notification.message') }}',
                status: '{{ session('notification.status') }}',
                time: new Date(),
                unread: true
            };
            notifications.unshift(newNotification);
            localStorage.setItem('roomNotifications', JSON.stringify(notifications.slice(0, 20)));
            localStorage.setItem('unreadCount', (parseInt(localStorage.getItem('unreadCount') || '0') + 1).toString());
        @endif
    </script>
</body>
</html>

