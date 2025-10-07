<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Room Tracker and Availability System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-blue: #144077ff;
            --dark-blue: #3B82F6;
            --light-blue: #EFF6FF;
            --lighter-blue: #DBEAFE;
            --card-header-blue: #a2a2a2ff;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #FFFFFF;
        }
        
        .navbar {
            background-color: var(--primary-blue) !important;
            box-shadow: 0 2px 4px rgba(96, 165, 250, 0.2);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.95) !important;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        
        .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }
        
        .content-wrapper {
            min-height: calc(100vh - 120px);
            padding: 40px 0;
            background-color: var(--light-blue);
        }
        
        .card {
            border: 1px solid var(--lighter-blue);
            box-shadow: 0 2px 8px rgba(96, 165, 250, 0.1);
            border-radius: 8px;
            transition: transform 0.2s;
            background-color: white;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(96, 165, 250, 0.2);
        }
        
        .card-header {
            background-color: var(--card-header-blue);
            color: white;
            font-weight: bold;
            border-radius: 8px 8px 0 0 !important;
            border: none;
            font-size: 1.25rem;
        }
        
        .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
            color: white;
            transform: translateY(-1px);
        }
        
        .footer {
            background-color: #144077ff;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        .badge-available {
            background-color: #10B981;
            color: white;
            padding: 0.35rem 0.65rem;
            border-radius: 4px;
        }
        
        .badge-occupied {
            background-color: #EF4444;
            color: white;
            padding: 0.35rem 0.65rem;
            border-radius: 4px;
        }

        .badge-under-maintenance {
            background-color: #efe644ff;
            color: white;
            padding: 0.35rem 0.65rem;
            border-radius: 4px;
        }
        
        .table-hover tbody tr:hover {
            background-color: var(--lighter-blue);
        }
        
        h1, h2, h3, h4, h5 {
            color: var(--white);
        }
        
        a {
            color: var(--primary-blue);
        }
        
        a:hover {
            color: var(--dark-blue);
        }
        
        .table {
            background-color: white;
        }

        .thead th {
            font-size: 1.25rem;  
            font-weight: bold;
            color: var(--dark-blue);
            text-transform: uppercase;
        }   

        .table thead th {
            font-size: 1.25rem;    
            font-weight: 600;
            color: var(--dark-blue);
            padding: 1rem;
            text-transform: uppercase;
        }

        /* Notification Bell Styles */
        .notification-bell {
            position: relative;
            cursor: pointer;
            padding: 8px 12px;
            margin-left: 15px;
            transition: all 0.3s;
        }

        .notification-bell:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        .notification-bell svg {
            width: 24px;
            height: 24px;
            fill: white;
        }

        .notification-badge {
            position: absolute;
            top: 5px;
            right: 8px;
            background-color: #EF4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }

        .notification-dropdown {
            position: absolute;
            top: 60px;
            right: 20px;
            width: 380px;
            max-height: 500px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            display: none;
            flex-direction: column;
            z-index: 1000;
            overflow: hidden;
        }

        .notification-dropdown.active {
            display: flex;
        }

        .notification-header {
            background-color: var(--primary-blue);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header h6 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
        }

        .clear-all-btn {
            background: none;
            border: none;
            color: white;
            font-size: 12px;
            cursor: pointer;
            text-decoration: underline;
        }

        .notification-body {
            flex: 1;
            overflow-y: auto;
            max-height: 400px;
        }

        .notification-item {
            padding: 15px 20px;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s;
            cursor: pointer;
        }

        .notification-item:hover {
            background-color: var(--light-blue);
        }

        .notification-item.unread {
            background-color: #F0F9FF;
        }

        .notification-item-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 5px;
        }

        .notification-room {
            font-weight: 600;
            color: var(--primary-blue);
            font-size: 14px;
        }

        .notification-time {
            font-size: 11px;
            color: #999;
        }

        .notification-message {
            font-size: 13px;
            color: #666;
            line-height: 1.4;
        }

        .notification-status {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 5px;
        }

        .notification-status.available {
            background-color: #D1FAE5;
            color: #059669;
        }

        .notification-status.occupied {
            background-color: #FEE2E2;
            color: #DC2626;
        }

        .notification-status.maintenance {
            background-color: #FEF3C7;
            color: #D97706;
        }

        .no-notifications {
            padding: 40px 20px;
            text-align: center;
            color: #999;
        }

        .no-notifications svg {
            width: 60px;
            height: 60px;
            fill: #ddd;
            margin-bottom: 10px;
        }

        /* Chatbot Styles */
        .chatbot-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(20, 64, 119, 0.4);
            transition: all 0.3s;
            z-index: 1000;
        }

        .chatbot-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(20, 64, 119, 0.5);
        }

        .chatbot-button svg {
            width: 30px;
            height: 30px;
            fill: white;
        }

        .chatbot-container {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 380px;
            height: 550px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            display: none;
            flex-direction: column;
            z-index: 1000;
            overflow: hidden;
        }

        .chatbot-container.active {
            display: flex;
        }

        .chatbot-header {
            background-color: var(--primary-blue);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-header h5 {
            margin: 0;
            color: white;
            font-size: 1.1rem;
        }

        .chatbot-close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chatbot-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f8f9fa;
        }

        .chatbot-message {
            margin-bottom: 15px;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .chatbot-message.bot {
            text-align: left;
        }

        .chatbot-message.user {
            text-align: right;
        }

        .message-bubble {
            display: inline-block;
            padding: 12px 16px;
            border-radius: 12px;
            max-width: 85%;
            word-wrap: break-word;
            line-height: 1.5;
        }

        .chatbot-message.bot .message-bubble {
            background-color: white;
            color: #333;
            border: 1px solid #e0e0e0;
        }

        .chatbot-message.user .message-bubble {
            background-color: var(--primary-blue);
            color: white;
        }

        .faq-options {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 10px;
        }

        .faq-button {
            background-color: white;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            padding: 12px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
            text-align: left;
            font-weight: 500;
        }

        .faq-button:hover {
            background-color: var(--primary-blue);
            color: white;
            transform: translateX(5px);
        }

        .chatbot-footer {
            padding: 15px;
            background-color: white;
            border-top: 1px solid #e0e0e0;
        }

        .reset-button {
            width: 100%;
            padding: 10px;
            background-color: var(--lighter-blue);
            color: var(--primary-blue);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .reset-button:hover {
            background-color: var(--primary-blue);
            color: white;
        }

        @media (max-width: 768px) {
            .chatbot-container {
                width: calc(100% - 40px);
                right: 20px;
                left: 20px;
                bottom: 90px;
            }

            .notification-dropdown {
                width: calc(100% - 40px);
                right: 20px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Room Tracker and Availability System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border-color: rgba(255,255,255,0.3);">
                <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home*') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rooms') ? 'active' : '' }}" href="{{ route('rooms') }}">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('availability') ? 'active' : '' }}" href="{{ route('availability') }}">Availability</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <div class="notification-bell" id="notificationBell">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/>
                            </svg>
                            <span class="notification-badge" id="notificationBadge" style="display: none;">0</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="notification-dropdown" id="notificationDropdown">
        <div class="notification-header">
            <h6>Notifications</h6>
            <button class="clear-all-btn" id="clearAllBtn">Clear All</button>
        </div>
        <div class="notification-body" id="notificationBody">
            <div class="no-notifications">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
                <p>No new notifications</p>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Room Tracker and Availability System. All rights reserved.</p>
        </div>
    </footer>

    <div class="chatbot-button" id="chatbotButton">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12c0 1.54.36 3 .97 4.29L2 22l5.71-.97C9 21.64 10.46 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm0 18c-1.38 0-2.68-.31-3.85-.85l-.27-.13-2.82.48.48-2.82-.13-.27C4.31 14.68 4 13.38 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8zm4-9h-3V8c0-.55-.45-1-1-1s-1 .45-1 1v3H8c-.55 0-1 .45-1 1s.45 1 1 1h3v3c0 .55.45 1 1 1s1-.45 1-1v-3h3c.55 0 1-.45 1-1s-.45-1-1-1z"/>
        </svg>
    </div>

    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header">
            <h5>TrackBot</h5>
            <button class="chatbot-close" id="chatbotClose">&times;</button>
        </div>
        <div class="chatbot-body" id="chatbotBody">
            <div class="chatbot-message bot">
                <div class="message-bubble">
                    Hi! I'm your TrackBot. I can help you navigate the building and find facilities. What would you like to know?
                </div>
            </div>
            <div class="faq-options" id="faqOptions">
                <button class="faq-button" data-faq="fastest-internet">Which lab has the fastest internet?</button>
                <button class="faq-button" data-faq="restroom">Where is the nearest restroom?</button>
                <button class="faq-button" data-faq="wifi-rooms">Which rooms have Wi-Fi?</button>
                <button class="faq-button" data-faq="quiet-study">Where can I study quietly?</button>
                <button class="faq-button" data-faq="room-location">Where is a specific room?</button>
                <button class="faq-button" data-faq="lab-floors">What floor are the labs on?</button>
            </div>
        </div>
        <div class="chatbot-footer">
            <button class="reset-button" id="resetChat">Ask Another Question</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Notification System
        const notificationBell = document.getElementById('notificationBell');
        const notificationDropdown = document.getElementById('notificationDropdown');
        const notificationBadge = document.getElementById('notificationBadge');
        const notificationBody = document.getElementById('notificationBody');
        const clearAllBtn = document.getElementById('clearAllBtn');

        let notifications = [];
        let unreadCount = 0;

        notificationBell.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle('active');
            
            if (notificationDropdown.classList.contains('active')) {
                markAllAsRead();
            }
        });

        document.addEventListener('click', (e) => {
            if (!notificationDropdown.contains(e.target) && !notificationBell.contains(e.target)) {
                notificationDropdown.classList.remove('active');
            }
        });

        clearAllBtn.addEventListener('click', () => {
            notifications = [];
            unreadCount = 0;
            updateNotificationUI();
            saveNotifications();
        });

        function addNotification(room, message, status, time = new Date()) {
            const notification = {
                id: Date.now() + Math.random(),
                room: room,
                message: message,
                status: status,
                time: time,
                unread: true
            };
            
            notifications.unshift(notification);
            unreadCount++;
            
            if (notifications.length > 20) {
                notifications = notifications.slice(0, 20);
            }
            
            updateNotificationUI();
            saveNotifications();
            showBrowserNotification(room, message, status);
        }

        function updateNotificationUI() {
            notificationBadge.textContent = unreadCount;
            notificationBadge.style.display = unreadCount > 0 ? 'flex' : 'none';
            
            if (notifications.length === 0) {
                notificationBody.innerHTML = `
                    <div class="no-notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                        </svg>
                        <p>No new notifications</p>
                    </div>
                `;
            } else {
                notificationBody.innerHTML = notifications.map(notif => `
                    <div class="notification-item ${notif.unread ? 'unread' : ''}" data-id="${notif.id}">
                        <div class="notification-item-header">
                            <span class="notification-room">${notif.room}</span>
                            <span class="notification-time">${formatTime(notif.time)}</span>
                        </div>
                        <div class="notification-message">${notif.message}</div>
                        <span class="notification-status ${notif.status}">${notif.status.toUpperCase()}</span>
                    </div>
                `).join('');
            }
        }

        function markAllAsRead() {
            notifications.forEach(notif => notif.unread = false);
            unreadCount = 0;
            updateNotificationUI();
            saveNotifications();
        }

        function formatTime(time) {
            const now = new Date();
            const notifTime = new Date(time);
            const diff = Math.floor((now - notifTime) / 1000);
            
            if (diff < 60) return 'Just now';
            if (diff < 3600) return `${Math.floor(diff / 60)}m ago`;
            if (diff < 86400) return `${Math.floor(diff / 3600)}h ago`;
            return `${Math.floor(diff / 86400)}d ago`;
        }

        function saveNotifications() {
            localStorage.setItem('roomNotifications', JSON.stringify(notifications));
            localStorage.setItem('unreadCount', unreadCount);
        }

        function loadNotifications() {
            const saved = localStorage.getItem('roomNotifications');
            if (saved) {
                notifications = JSON.parse(saved);
                unreadCount = parseInt(localStorage.getItem('unreadCount') || '0');
                updateNotificationUI();
            }
        }

        function showBrowserNotification(room, message, status) {
            if ('Notification' in window && Notification.permission === 'granted') {
                new Notification(`${room} - ${status.toUpperCase()}`, {
                    body: message,
                    icon: '/favicon.ico',
                    badge: '/favicon.ico'
                });
            }
        }

        function requestNotificationPermission() {
            if ('Notification' in window && Notification.permission === 'default') {
                Notification.requestPermission();
            }
        }

        loadNotifications();
        requestNotificationPermission();

        if (notifications.length === 0) {
            addNotification('IT Lab 1', 'is now available for use', 'available', new Date(Date.now() - 2 * 60000));
            addNotification('MAC Lab', 'is now occupied', 'occupied', new Date(Date.now() - 8 * 60000));
            addNotification('Room 003', 'is under maintenance', 'maintenance', new Date(Date.now() - 15 * 60000));
            addNotification('Open Lab', 'is now available for use', 'available', new Date(Date.now() - 22 * 60000));
            addNotification('CS Lab', 'is now occupied', 'occupied', new Date(Date.now() - 35 * 60000));
            addNotification('Room 005', 'is now available for use', 'available', new Date(Date.now() - 48 * 60000));
            addNotification('ERP Lab', 'is under maintenance', 'maintenance', new Date(Date.now() - 55 * 60000));
        }

        // Chatbot functionality
        const chatbotButton = document.getElementById('chatbotButton');
        const chatbotContainer = document.getElementById('chatbotContainer');
        const chatbotClose = document.getElementById('chatbotClose');
        const chatbotBody = document.getElementById('chatbotBody');
        const resetChat = document.getElementById('resetChat');
        const faqButtons = document.querySelectorAll('.faq-button');

        const faqResponses = {
            'fastest-internet': 'The IT Lab 1 and IT Lab 2 have the fastest and most stable internet connection in the CCS building. These labs are equipped with high-speed fiber connections and are located on the 2nd floor. The Open Lab also has excellent connectivity and is available for general student use.',
            'restroom': 'Restrooms are located on every floor of the CCS building:\n\n• Ground Floor - Near the main entrance\n• 2nd Floor - Next to IT Lab 1\n• 3rd Floor - Beside the Research Room\n\nAll restrooms are clearly marked with signage.',
            'wifi-rooms': 'All rooms and laboratories in the CCS building have Wi-Fi access! The entire building is covered by the campus Wi-Fi network. Simply connect to "CSPC-Student" network. Labs with the strongest signal include:\n\n• MAC Lab\n• Open Lab\n• IT Lab 1 & 2\n• ERP Lab\n• All Lecture Rooms (001-006)',
            'quiet-study': 'For quiet study areas, I recommend:\n\n• Research Room (3rd Floor) - Designed specifically for focused research and study\n• Room 006 (Lecture Room) - Usually quiet when not in use\n• Library corners near the CCS building\n\nYou can also check the Availability page to see which lecture rooms are currently free for studying.',
            'room-location': 'Here\'s where you can find each room:\n\n**Ground Floor:**\n• Room 001-003 (Lecture Rooms)\n• MAC Lab\n• Open Lab\n\n**2nd Floor:**\n• Room 004-006 (Lecture Rooms)\n• IT Lab 1 & 2\n• ERP Lab\n• CS Lab\n\n**3rd Floor:**\n• LIS Lab\n• NAS Lab\n• RISE Lab\n• Research Room\n\nNeed a specific room? Just ask!',
            'lab-floors': 'Here\'s the floor distribution of all labs:\n\n**Ground Floor:**\n• MAC Lab\n• Open Lab\n\n**2nd Floor:**\n• IT Lab 1\n• IT Lab 2\n• ERP Lab\n• CS Lab\n\n**3rd Floor:**\n• LIS Lab\n• NAS Lab\n• RISE Lab\n• Research Room\n\nAll labs are accessible via the main staircase or elevator.'
        };

        chatbotButton.addEventListener('click', () => {
            chatbotContainer.classList.toggle('active');
            notificationDropdown.classList.remove('active');
        });

        chatbotClose.addEventListener('click', () => {
            chatbotContainer.classList.remove('active');
        });

        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                const faqKey = this.getAttribute('data-faq');
                const question = this.textContent;
                const answer = faqResponses[faqKey];

                addMessage(question, 'user');
                setTimeout(() => {
                    addMessage(answer, 'bot');
                }, 600);
            });
        });

        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `chatbot-message ${sender}`;
            
            const bubbleDiv = document.createElement('div');
            bubbleDiv.className = 'message-bubble';
            bubbleDiv.innerHTML = text.replace(/\n/g, '<br>');
            
            messageDiv.appendChild(bubbleDiv);
            
            const faqOptions = document.getElementById('faqOptions');
            chatbotBody.insertBefore(messageDiv, faqOptions);
            
            chatbotBody.scrollTop = chatbotBody.scrollHeight;
        }

        resetChat.addEventListener('click', () => {
            const messages = chatbotBody.querySelectorAll('.chatbot-message');
            messages.forEach((message, index) => {
                if (index > 0) {
                    message.remove();
                }
            });
            chatbotBody.scrollTop = 0;
        });
    </script>
</body>
</html>